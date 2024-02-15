#include <ESP8266WiFi.h>
#include <ESP8266WebServer.h>
#include <SPI.h>
#include <MFRC522.h>

#define SS_PIN D2
#define RST_PIN D1
#define ON_BOARD_LED 2

const char* ssid = "MAHDI 3310";
const char* password = "mahdi1234";
const char* serverEndpoint = "http://localhost/getUID.php";

WiFiServer server(80);
MFRC522 mfrc522(SS_PIN, RST_PIN);

void setup() {
  Serial.begin(115200);
  pinMode(ON_BOARD_LED, OUTPUT);
  digitalWrite(ON_BOARD_LED, HIGH);
  delay(1000);

  connectToWiFi();

  server.begin();
  Serial.println("Please tag a card or keychain to see the UID !");
}

void loop() {
  if (WiFi.status() == WL_CONNECTED) {
    WiFiClient client = server.available();
    if (client) {
      handleClient(client);
    }
    if (mfrc522.PICC_IsNewCardPresent() && mfrc522.PICC_ReadCardSerial()) {
      String uid = getUID();
      sendUID(uid);
      mfrc522.PICC_HaltA();
    }
  } else {
    connectToWiFi();
  }
}

void connectToWiFi() {
  Serial.print("Connecting to WiFi");
  digitalWrite(ON_BOARD_LED, LOW);
  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    Serial.print(".");
    delay(500);
  }
  Serial.println("\nConnected to WiFi");
  digitalWrite(ON_BOARD_LED, HIGH);
}

String getUID() {
  byte buffer[4];
  String uid = "";
  for (byte i = 0; i < mfrc522.uid.size; i++) {
    buffer[i] = mfrc522.uid.uidByte[i];
    uid += String(buffer[i] < 0x10 ? "0" : "");
    uid += String(buffer[i], HEX);
  }
  return uid;
}

void sendUID(String uid) {
  WiFiClient client;
  if (client.connect(serverEndpoint, 80)) {
    client.print("POST " + String(serverEndpoint) + " HTTP/1.1\r\n");
    client.print("Host: " + String(WiFi.localIP()) + "\r\n");
    client.print("Content-Type: application/x-www-form-urlencoded\r\n");
    client.print("Content-Length: " + String(uid.length()) + "\r\n");
    client.print("\r\n");
    client.print("UIDresult=" + uid);
    delay(10);
    client.stop();
  }
}

void handleClient(WiFiClient client) {
  String currentLine = "";
  while (client.connected()) {
    if (client.available()) {
      char c = client.read();
      if (c == '\n') {
        if (currentLine.length() == 0) {
          client.println("HTTP/1.1 200 OK");
          client.println("Content-type:text/html");
          client.println("Connection: close");
          client.println();
          break;
        } else {
          currentLine = "";
        }
      } else if (c != '\r') {
        currentLine += c;
      }
    }
  }
}

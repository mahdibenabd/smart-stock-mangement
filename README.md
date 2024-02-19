# 💼 Smart Stock Management System

Smart Stock Management System is a project for managing stock in a warehouse using RFID tags.

## 🛠️ Installation

To install or set up the project, follow these steps:

1. **Upload the `rfid.sql` file to your MySQL database.
2. Change the database credentials in the `database.php` file.

## 🚀 Usage

To use the Smart Stock Management System, follow these steps:

1. **Set Up Arduino IDE and Notepad++:**
   - Install Arduino IDE version 1.8.9.
   - Install Notepad++ version 7.7.1.

2. **Install XAMPP:**
   - Download and install XAMPP version 3.2.2 from [the official website](https://www.apachefriends.org/index.html).
   - Start the Apache and MySQL services in XAMPP.

3. **Prepare Hardware:**
   - Ensure you have the following hardware components:
     - RFID RC522 module.
     - LoLin NodeMCU V3 ESP8266/ESP12E development board.
   - Connect the RFID RC522 module and LoLin NodeMCU as per the wiring instructions.

4. **Upload Arduino Sketch:**
   - Open the `sketch_fe15a` directory in Arduino IDE.
   - Open the `sketch_fe15a.ino` file.
   - Update the Wi-Fi credentials in the sketch:
     ```cpp
     const char* ssid = "YOUR_WIFI_SSID";
     const char* password = "YOUR_WIFI_PASSWORD";
     ```
   - Upload the sketch to your Arduino board.

5. **Access the System:**
   - Access the Smart Stock Management System through a web browser by navigating to the URL where your XAMPP server is running.

Note: Ensure that your Arduino is connected to the same Wi-Fi network as your computer running the XAMPP server for proper communication between the hardware and the web application.

## 🤝 Contributing

Contributions to the Smart Stock Management System project are welcome. Here are some guidelines:

- Fork the repository.
- Create a new branch for your feature or improvement.
- Make your changes and ensure they pass any existing tests.
- Push your changes to your fork.
- Submit a pull request for review.

## 📄 License

The Smart Stock Management System project is licensed under the [MIT License](LICENSE).

## 👨‍💻 Creator

Hi, I'm Mahdi! 👋 Follow me on social media for more updates and projects:

- [LinkedIn](https://linkedin.com/in/mahdi-benabdallah)
- [Facebook](https://facebook.com/mahdi.benabdalllah)

Feel free to reach out to me if you have any questions or feedback 😊

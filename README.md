# **Sianema Ticketing System**

The Sianema Ticketing System is a web-based online movie ticketing platform designed to facilitate the booking and management of movie tickets. It consists of an admin panel and a customer interface, offering functionalities for both administrators and customers to streamline the process of scheduling movies, managing theater halls, and booking tickets. Additionally, the system integrates with a payment web service to securely process transactions and a maintenance web service to handle theater maintenance scheduling and management.

## **Project Setup Instructions**

Follow these steps to set up the Sianema Ticketing System project on your local machine.

### **Software Requirements**

Before setting up the project, ensure that you have the following software installed:

* XAMPP (Apache and MySQL)  
* [Composer](https://getcomposer.org/)  
* [Visual Studio Code](https://code.visualstudio.com/)  
* [Node.js](https://nodejs.org/)

  ### 

### **Steps to Set Up the Project**

1. #### **Install Required Software**

* Install Composer and XAMPP as per the links provided above.

2. #### **Move the Project**

* Move the Sianema-Ticketing-System project folder to C:\\xampp\\htdocs.

3. #### **Open Project in Visual Studio Code**

* Open Visual Studio Code.

* In VS Code, open the SianemaTicketingSystem project folder.

4. #### **Configure the .env File**

* Open the .env file inside the project folder and update the database connection details as follows:

| DB\_CONNECTION\=mysql DB\_HOST\=127.0.0.1 DB\_PORT\=3306 DB\_DATABASE\=sianematicketingsystem DB\_USERNAME\=root DB\_PASSWORD\= |
| :---- |

  #### 

5. **Open XAMPP and start the Apache and MySQL**

6. **Edit the maximum packet size allowed for MySQL** 	  
* Access the my.ini via the XAMPP console, MySQL \> config or access the folder xampp\\mysql\\bin to edit the **my.ini file,** change the **max\_allowed\_packet variable** to a 100M so that the next step could be run successfully. 

  #### 

7. #### **Database setup**

* Open phpMyAdmin in your browser by navigating to http://localhost/phpmyadmin.

* Create a new database named sianematicketingsystem, which matches the name specified in the .env file.

* Import the sianematicketingsystem.sql file (in the git repository) into this database.

8. #### **Install Composer Dependencies**

* In the Visual Studio Code terminal or your command line, navigate to the project folder.

* Run the following command to install PHP dependencies:  
  composer install

9. #### **Install NPM Dependencies**

* Run the following command to install the required Node.js dependencies:  
  npm install

10. #### **Build Frontend Assets**

* Open a new terminal window and run the following command to build the frontend assets:  
  npm run dev

11. #### **Run the Local Development Server**

* In a new terminal window, run the following command to start the Laravel development server:  
  php artisan serve

12. #### **Setup and run the web services**

* Run the Payment Web Service ([Github](https://github.com/johnson1125/payment-web-service.git)) and Maintenance Web Service ([Github](https://github.com/johnson1125/maintenance-web-service.git))


**Now you can access the project by visiting http://localhost:8000 in your browser.**

### **Common Issues** 

1. **Database Connection Error:** 

   1. Ensure that the '.env' file has the correct database credentials and that MySQL is running.

   2. Make sure that xampp, mysql server is turn on

2. **Composer Install Issues:** 

   1. Run 'composer update if 'composer install' fails. 

3. **npm Install Errors:** 

   1. Ensure you have the correct Node.js version.

Customer Accounts

Customer  
\- username: user1@gmail.com, user2@gmail.com, [user3@gmail.com](mailto:user3@gmail.com), user4@gmail.com  
\- password: Tarumt1234\!

Admin Accounts

Root admin  
\- username: root@admin.com  
\- password: Tarumt1234\!

Admin  
\- username: [admin1@gmail.com](mailto:admin1@gmail.com), [admin2@gmail.com](mailto:admin1@gmail.com), admin3@gmail.com  
\- password: Tarumt1234\!


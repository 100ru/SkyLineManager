
# SkyLineManager..

## Description
The Flight Management System is a web-based application that allows users to book, view, and manage flights. It is developed using PHP for server-side scripting, MySQL for the database, and HTML/CSS for front-end design. This system provides user-friendly functionalities for both passengers and administrators.



## Features
- Search for available flights.
- Book flights with user details.
- Manage flight bookings (view, update, cancel).
- Admin dashboard to manage flights (add, edit, delete).
- Admin dashboard has manage(Home,Create_table,Insert,Query_solution,Contact us).

 
## Installation
### Prerequisites:
- PHP 7.0 or higher
- MySQL
- Local server (XAMPP, WAMP, etc.)
- Git

### Steps:
1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/flight-management-system.git

1. Move the project to your server's root directory.
mv flight-management-system /path-to-server-root

2.Start your local server (XAMPP, WAMP, etc.).

3.Create a Mysql database:
CREATE DATABASE dbms;

4.Import the SQL file into your database.

5.Update db.php with your database credentials.



    
## Usage 
1.Users can search for flights and book tickets via the homepage.

 2. Users get the information about Passenger in Query solution.
## Screenshots
## Home Page.
![Screenshot (10)](https://github.com/user-attachments/assets/6c5cd2d9-0512-439a-8234-57a23825bbce)
## Passenger Registration Form.
![Screenshot (34)](https://github.com/user-attachments/assets/80736144-484c-430c-baa9-1459077b52d3)
## Query Solution.
![Screenshot (32)](https://github.com/user-attachments/assets/fe10c1b2-24ec-4108-9137-82e857f5e367)
## Database of Query Solution.
![Screenshot (36)](https://github.com/user-attachments/assets/041c7646-0085-4107-b4bd-19fcaa0f9a91)


## Project Structure

- **flight-management-system/**
  - **admin/**          # Admin-specific files
  - **assets/**         # CSS, JS, and image assets
  - **includes/**       # Common PHP files for header, footer, etc.
  - **db.php**          # Database connection file
  - **index.php**       # Main entry point for the app 
  - **booking.php**     # Flight booking page
  - **README.md**       # Project documentation

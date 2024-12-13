# RavaisiPDA Backend

## Description

The RavaisiPDA Backend is built using PHP and serves as the interface between the Android application and the MySQL database. It allows the Android application to send and delete products and categories, as well as send orders to the database.

## Features

* **Product Management**: 
  * Add, update, and delete products from the database.
  
* **Category Management**: 
  * Add and delete categories as necessary.
  
* **Order Handling**: 
  * Receive and store orders sent from the Android application to the database.

* **CSV Database Import**: 
  * The repository includes a CSV file containing the database structure, allowing users to import it during setup.

## Setup Instructions

1. **XAMPP Installation**: 
   * Make sure you have XAMPP installed and running with MySQL.

2. **Place PHP Files**: 
   * Copy the PHP files into the `htdocs` folder of your XAMPP installation.

3. **Database Setup**: 
   * Import the provided CSV file into your MySQL database to set up the initial structure.

4. **Configure Database Connection**: 
   * Ensure that the database credentials in your PHP files match those of your MySQL database.

## Usage

* The Android application will make API calls to the PHP scripts to manage products, categories, and orders.
* Users can upload the CSV file to create the necessary database structure during initial setup.

## Contributing

Contributions are welcome! Here’s how you can help improve the project:

1. **Fork the repository**: Create your own copy of the project on your GitHub account.
2. **Make Changes**: Implement improvements or fixes in a new branch.
3. **Test Your Changes**: Ensure that everything works as expected.
4. **Submit a Pull Request**: Submit changes back to the main repository with a description of the changes made.

### Guidelines

* Follow the project’s coding style.
* Write clear and descriptive commit messages.

## Contact

If you have any questions or need assistance, please reach out to [your contact information].

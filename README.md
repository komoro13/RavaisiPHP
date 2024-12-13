# Restaurant PDA System - PHP API

## Overview
This repository contains PHP scripts used by the Android app in the Restaurant PDA System. The scripts handle CRUD operations for categories, products, and toppings, as well as order management. These files should be placed in the htdocs directory of an XAMPP server.

## Scripts

* **AddCategory.php:** Adds a new category to the database.
* **AddProduct.php:** Adds a new product to the database.
* **AddTopping.php:** Adds a new topping to the database.
* **DataBase.php:** Contains database interaction functions.
* **DataBaseConfig.php:** Configures database connection settings.
* **DeleteCategory.php:** Deletes a category from the database.
* **DeleteProduct.php:** Deletes a product from the database.
* **DeleteTopping.php:** Deletes a topping from the database.
* **GetCategories.php:** Retrieves all categories from the database.
* **GetItems.php:** Retrieves details of items in the database.
* **GetOrder.php:** Retrieves details of a specific order.
* **GetOrderStrings.php:** Retrieves strings related to orders.
* **GetOrders.php:** Retrieves all orders from the database.
* **GetProductToppings.php:** Retrieves toppings for a specific product.
* **GetProducts.php:** Retrieves all products from the database.
* **GetToppings.php:** Retrieves all toppings from the database.
* **SendOrder.php:** Sends a new order to the database.
* **SubmitReport.php:** Submits a report to the database.

## Setup

### Database Configuration:

Update DataBaseConfig.php with your XAMPP MySQL database credentials.

### Server Deployment:

Place these PHP files in the htdocs directory of your XAMPP server.

### Usage
The Android app communicates with these PHP scripts to perform actions like adding or deleting products and categories, retrieving information, and managing orders.

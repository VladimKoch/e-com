<?php 

//Buffering
ob_start();

// //Session
// session_start();

//Directory separator constants
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

//Paths constants
defined("RESOURCE") ? null : define("RESOURCE", __DIR__ . DS );



// DB constants
defined("DB_HOST") ? null : define("DB_HOST", "localhost");
defined("DB_USER") ? null : define("DB_USER", "Vlada89");
defined("DB_PASS") ? null : define("DB_PASS", "Tyr2017");
defined("DB_NAME") ? null : define("DB_NAME", "ecom_db");

// Create DB connection
$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);


    if($conn->connect_error){
        die("chyba úřoúpkení k databázi: " . $connection->connect_error);
    } 
    
    else {echo "Spjení s databází bylo uspěšné";}

// Create DB table categories
$categories = "CREATE TABLE IF NOT EXISTS  categories(
            cat_id INT(11) AUTO_INCREMENT PRIMARY KEY,
            cat_title VARCHAR (255) NOT NULL)";

$conn_categories = $conn -> query($categories);

// Create DB table categories
$products = "CREATE TABLE IF NOT EXISTS products(
    product_id INT(11) AUTO_INCREMENT PRIMARY KEY,
    product_title VARCHAR(255) NOT NULL,
    product_category_id INT(11) NOT NULL,
    product_price FLOAT(11) NOT NULL,
    product_description TEXT NOT NULL,
    short_desc TEXT NOT NULL,
    product_image VARCHAR(255) NOT NULL)";

    $conn_products = $conn -> query($products);

// Check if tables was created
if($conn_categories == TRUE && $conn_products == TRUE){
    echo "Tabulka vytvořena";
} else {echo "Tabulky nevytvořeny";}

// $conn-> close();

require_once("functions.php");

?>

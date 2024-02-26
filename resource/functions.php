<?php 

//Session start

session_start();

//helper function




function set_message(string $msg){
    if(!empty($msg)){
        $_SESSION['message'] = $msg;
    } else {
        $msg = "";
    }
}


//Display message

function display_message(){
    if(isset($_SESSION['message'])){

        echo $_SESSION['message'];

       
    }
}

// redirect to other location function
function redirect($location){
    header("Location: $location ");
}

//send query to db
function query($sql){
    global $conn;
    return mysqli_query($conn,$sql);
}

//confirmation of connection function
function confirm($result){
    global $conn;
    if(!$result) {
        die( "QUERY FAILED " . mysqli_error($conn));
    }
}


//Escape injection string function
function escape_string($string){
    global $conn;
    return mysqli_real_escape_string($conn,$string);
}

//Fetch array from db function
function fetch_array($result){
  return mysqli_fetch_array($result);
};

//Get products
function get_products(){

    $query = query("SELECT * FROM products");
    confirm($query);

    while($row = fetch_array($query)){
        $product = <<<DELIMETER
        <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="{$row['product_image']}" alt="">
            <div class="caption">
                <h4 class="pull-right">{$row['product_price']}</h4>
                <h4><a href="{$row['product_id']}">{$row['product_title']}</a>
                </h4>
                <p>{$row['product_description']}</p>
            </div>
            <a class="btn btn-primary" target="_blank" href="item.php?id={$row['product_id']}">Add to cart</a>
        </div>
    </div>
    DELIMETER;

    echo $product;
    }
}

function get_categories(){
    
                // Select kategories from db
                $query = query("SELECT * FROM categories");
                confirm($query);

                while($row = fetch_array($query)){

                    $categories_links = <<<DELIMETER
                    
                    <a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>
                    
                    
                    DELIMETER;

                    echo $categories_links;
                }
}


function get_products_in_cat_page(){
if(isset($_GET['id'])){

    $query = query("SELECT * FROM products WHERE product_category_id =" . escape_string($_GET['id']) . "");
    confirm($query);

    while($row = fetch_array($query)){
        $product = <<<DELIMETER
        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="{$row['product_image']}" alt="">
                <div class="caption">
                    <h3>{$row['product_title']}</h3>
                    <p>Lorem ipsum dolor sit amet,consectetu</p>
                    <p>{$row['product_description']}</p>
                <p>
                <a href="*" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                </p>
            </div>
        </div>
    </div>
    DELIMETER;

    echo $product;
    }
} else {
   
}
}



function get_products_in_shot_page(){

    $query = query("SELECT * FROM products");
    confirm($query);

    while($row = fetch_array($query)){
        $product = <<<DELIMETER
        <div class="col-md-3 col-sm-6 hero-feature">
            <div class="thumbnail">
                <img src="{$row['product_image']}" alt="">
                <div class="caption">
                    <h3>{$row['product_title']}</h3>
                    <p>Lorem ipsum dolor sit amet,consectetu</p>
                    <p>{$row['product_description']}</p>
                <p>
                <a href="*" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                </p>
            </div>
        </div>
    </div>
    DELIMETER;

    echo $product;
    }
}

function login_user(){
    if(isset($_POST['submit'])){

        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);

        $query = query("SELECT * from users WHERE username = '{$username}' AND password = '{$password}'");
        confirm($query);

        if(mysqli_num_rows($query) == 0){
            set_message("Your password or username are wrong");
            redirect("login.php");
        } else {
            set_message("Welcome to Admin " . $username);
            redirect("admin.php");
        }
        
    } 
}


?>

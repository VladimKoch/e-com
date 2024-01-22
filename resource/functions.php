<?php 

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
        $product = <<< DELIMETER


        DELIMETER;
    }
}





?>
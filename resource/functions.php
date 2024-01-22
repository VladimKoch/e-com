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

        <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="thumbnail">
            <img src="" alt="">
            <div class="caption">
                <h4 class="pull-right"></h4>
                <h4><a href="#">Product name?></a>
                </h4>
                <p>Hellop it is the product descrtiption</p>
            </div>
            <a class="btn btn-primary" target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">View Tutorial</a>
            <div class="ratings">
                <p class="pull-right">18 reviews</p>
                <p>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                </p>
            </div>
        </div>
    </div>

        DELIMETER;
    }
}





?>
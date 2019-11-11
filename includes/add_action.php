<?php
    //Get values from POST request
    $sku=$_POST['sku'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $type=$_POST['type'];
    $size=$_POST['size'];
    $height=$_POST['height'];
    $width=$_POST['width'];
    $length=$_POST['length'];
    $weight=$_POST['weight'];

    //Connect Database
    $conn=mysqli_connect('10.0.10.30','web_php','php_p4ssw0rd') or die(mysqli_error());

    //Select Database
    $select_db=mysqli_select_db($conn,'types')or die(mysqli_error());
    
    //SQL Query to insert data, coditions depends on the type of item
    if($type=='Office Supplier'){
        $sql="INSERT INTO inventory SET sku='$sku', name='$name', price='$price', type='$type', size='$size'";
    } elseif($type=='Office Furniture'){
        $sql="INSERT INTO inventory SET sku='$sku', name='$name', price='$price', type='$type', height='$height', width='$width', length='$length'";
    } elseif($type=='Others'){
        $sql="INSERT INTO inventory SET sku='$sku', name='$name', price='$price', type='$type', weight='$weight'";
    }
    //Execute Query
    $result=mysqli_query($conn,$sql) or die(mysqli_error());
    if ($result==true){
        // Return back to the parent page
        header('location:../product_add.php');
    }else{
        echo "Failed";
    }

?>
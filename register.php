<?php 
include("connect.php");

$name = $_POST['name'];
$mobile = $_POST['mobile']; 
$passowrd = $_POST['passowrd']; 
$cpassword = $_POST['cpassword']; 
$address = $_POST['address']; 
$image = $_FILES['photo'] ['name'];
$tmp_name = $_FILES['photo'] ['tmp_name'];
$role = $_POST['role'];

if($passowrd==$cpassword){

    move_uploaded_file($tmp_name, "../uploads/ $image");
    $insert = mysqli_query($connct,"INSERT INTO user (name,mobile,password,address,photo,role,status,votes) VALUES ('$name','$mobile','$passowrd','$address','$image','$role',0,0)" );
    if($insert){
        echo 
        '<script>
        alert("Registration Successfully");
        window.location = "../"; 
        </script>';
    }  
    else{
        echo 
        '<script>
        alert("Some Error Occured");
        window.location = "../routes/register.html"; 
        </script>';

    } 
}
else{
    
    echo 
    '<script>
    alert("Password and Confirm Password Does not Match!");
    window.location = "../routes/register.html"; 
    </script>';
}
?>
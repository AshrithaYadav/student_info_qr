<?php 
require 'db.php';
$conn = mysqli_connect($server,$username,$password,$database);
if($conn == false){
  die('cannot connect'.mysqli_connect_error($conn));


}


$student_hallticket_no = $_POST['student_hallticket_no'];

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $query = "SELECT * FROM student_info WHERE ht_no = '$student_hallticket_no'";
    $result = mysqli_query($conn,$query);
    if ($result->num_rows > 0) {
        // Fetch the user data
        $row = $result->fetch_assoc();
      
       $first_name = $row['first_name'];
       $last_name = $row['last_name'];
       $ht_no = $row['ht_no'];
       $email = $row['email'];
       $phone_no = $row['phone_no'];
       $birthdate = $row['birthdate'];
       $gender = $row['gender'];
       $house_no = $row['house_no'];
       $street = $row['street'];
       $city = $row['city'];
       $states = $row['states'];
       $pincode = $row['pincode'];
       $father_name = $row['father_name'];
       $mother_name = $row['mother_name'];
       $parents_mobile = $row['parents_mobile'];
       $alternate_parents_mobile = $row['alternate_parents_mobile'];
      
        echo   "<h3 style='text-align: center; font-size:20px; color:black'> Student Name: ".$first_name." ".$last_name."<br></h3>";
        echo   "<h3 style='text-align: center; font-size:20px; color:black'>HT NO: ".$ht_no."<br></h3>";
        echo   "<h3 style='text-align: center; font-size:20px; color:black'> Email: ".$email."<br></h3>";
        echo   "<h3 style='text-align: center; font-size:20px; color:black'> Phone No: ".$phone_no."<br></h3>";
        echo   "<h3 style='text-align: center; font-size:20px; color:black'> Gender: ".$gender."<br></h3>";
        echo   "<h3 style='text-align: center; font-size:20px; color:black'>Birthdate: ".$birthdate."<br></h3>";
        echo   "<h3 style='text-align: center; font-size:20px; color:black'>Address: "."<br></h3>";
        echo   "<h3 style='text-align: center; font-size:20px; color:black'>House No: ".$house_no."<br></h3>";
        echo   "<h3 style='text-align: center; font-size:20px; color:black'>Street: ".$street."<br></h3>";
        echo   "<h3 style='text-align: center; font-size:20px; color:black'>City: ".$city."<br></h3>";
        echo   "<h3 style='text-align: center; font-size:20px; color:black'>State: ".$states."<br></h3>";
        echo   "<h3 style='text-align: center; font-size:20px; color:black'> Pincode: ".$pincode."<br></h3>";
        echo   "<h3 style='text-align: center; font-size:20px; color:black'>Fathers Name: ".$father_name."<br></h3>";
        echo   "<h3 style='text-align: center; font-size:20px; color:black'>Mothers Name: ".$mother_name."<br></h3>";
        echo   "<h3 style='text-align: center; font-size:20px; color:black'>Parents Mobile No: ".$parents_mobile."<br></h3>";
        echo   "<h3 style='text-align: center; font-size:20px; color:black'>Alternate_parents_mobile: ".$alternate_parents_mobile."<br></h3>";
       
      ;
        
}

else{
    echo "<h3 style='text-align: center; padding-top:200px;'>Something went wrong,Try Again!</h3>";
}  
} 

 ?>
 
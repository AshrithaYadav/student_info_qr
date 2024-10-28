<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require 'db.php';

$conn = mysqli_connect($server,$username,$password,$database);
if($conn == false){
  die('cannot connect'.mysqli_connect_error($conn));
}

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$ht_no = $_POST['ht_no'];
$email = $_POST['email'];
$phone_no = $_POST['phone_no'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$house_no = $_POST['house_no'];
$street = $_POST['street'];
$city = $_POST['city'];
$states = $_POST['states'];
$pincode = $_POST['pincode'];
$father_name = $_POST['father_name'];
$mother_name = $_POST['mother_name'];
$parents_mobile = $_POST['parents_mobile'];
$alternate_parents_mobile = $_POST['alternate_parents_mobile'];

if ($_SERVER["REQUEST_METHOD"] == "POST"){


  
  
 


      if (isset($_POST['qr_generate'])) {
                  $qr_generate = $_POST['qr_generate'];

                   if($qr_generate =="generate"){
                   $query1 = "SELECT * FROM student_info WHERE ht_no = '$ht_no'";
                   $result = mysqli_query($conn,$query1);
       
    
                     if ($result->num_rows > 0) {
                           echo " <h1 style='text-align: center; padding-top:200px;'>Duplicate entry!Try Again!</h1>";
                      }
                     else{
                        $query2 = "INSERT INTO student_info(ht_no,first_name,last_name,email,phone_no,birthdate,gender,house_no,street,city,states,pincode,father_name,mother_name,parents_mobile,alternate_parents_mobile) VALUES ('$ht_no','$first_name','$last_name','$email','$phone_no','$birthdate','$gender','$house_no','$street','$city','$states','$pincode','$father_name','$mother_name','$parents_mobile','$alternate_parents_mobile')";
                          mysqli_query($conn,$query2);


                        include 'phpqrcode/qrlib.php';

                          // Data to be encoded in the QR code
                            $data = " Student Name: ".$first_name." ".$last_name." "." HT NO: ".$ht_no." Email: ".$email." Phone No: ".$phone_no." Gender: ".$gender."Birthdate: ".$birthdate."Address: "."House No: ".$house_no." Street: ".$street."City: ".$city."State: ".$states." Pincode: ".$pincode."Father's Name: ".$father_name."Mother's Name: ".$mother_name."Parent's Mobile No: ".$parents_mobile." alternate_parents_mobile: ".$alternate_parents_mobile;

                           // Path to save the QR code image
                            $filename = 'qrcodes\qrcode.png';

                            // Generate QR code and save it to a file
                            QRcode::png($data, $filename);

                             echo "<h1 style='text-align: center; padding-top:200px;'>SCAN THIS QR CODE</h1>";
                             echo "<img style='display: flex; justify-content: center; align-items: center; padding-left: 550px; height: 400px;' src='" . $filename . "' >"; 
                            echo "<a href='qrcodes/qrcode.png' download='image.png' style='display: flex;justify-content: center; align-items: center;;'>Download Image</a>";
        
                        }
        

                  }
                    elseif( $qr_generate =="update_generate"){
                                  $query3 = "UPDATE student_info SET 
                                  first_name = '$first_name', 
                                   last_name = '$last_name', 
                                      email = '$email', 
                                     phone_no = '$phone_no', 
                                     birthdate = '$birthdate', 
                                     gender = '$gender', 
                                    house_no = '$house_no', 
                                     street = '$street', 
                                     city = '$city', 
                                     states = '$states', 
                                        pincode = '$pincode', 
                                       father_name = '$father_name', 
                                         mother_name = '$mother_name', 
                                        parents_mobile = '$parents_mobile', 
                                        alternate_parents_mobile = '$alternate_parents_mobile' 
                                          WHERE ht_no = '$ht_no'";
                                     mysqli_query($conn,$query3);  

       
                                    include 'phpqrcode/qrlib.php';

                                   // Data to be encoded in the QR code
                                   $data = " Student Name: ".$first_name." ".$last_name." "." HT NO: ".$ht_no." Email: ".$email." Phone No: ".$phone_no." Gender: ".$gender."Birthdate: ".$birthdate."Address: "."House No: ".$house_no." Street: ".$street."City: ".$city."State: ".$states." Pincode: ".$pincode."Father's Name: ".$father_name."Mother's Name: ".$mother_name."Parent's Mobile No: ".$parents_mobile." alternate_parents_mobile: ".$alternate_parents_mobile;
       
                                     // Path to save the QR code image
                                     $filename = 'qrcodes\qrcode.png';
       
                                     // Generate QR code and save it to a file
                                      QRcode::png($data, $filename);

                                      echo "<h1 style='text-align: center; padding-top:200px;'>SCAN THIS QR CODE</h1>";
                                      echo "<img style='display: flex; justify-content: center; align-items: center; padding-left: 550px; height: 400px;' src='" . $filename . "' >"; 
                                      echo "<a href='qrcodes/qrcode.png' download='image.png' style='display: flex;justify-content: center; align-items: center;;'>Download Image</a>";
       
                             }
                             else{
                                echo 'Something went wrong!Try Again!';
                                } 
                     } 
  
      }
       else{
     echo 'Something went wrong! Try again!';
      }

 // include 'phpqrcode/qrlib.php';

// Data to be encoded in the QR code
//$data = " Student Name: ".$first_name." ".$last_name." "." HT NO: ".$ht_no." Email: ".$email." Phone No: ".$phone_no." Gender: ".$gender."Birthdate: ".$birthdate."Address: "."House No: ".$house_no." Street: ".$street."City: ".$city."State: ".$states." Pincode: ".$pincode."Father's Name: ".$father_name."Mother's Name: ".$mother_name."Parent's Mobile No: ".$parents_mobile." alternate_parents_mobile: ".$alternate_parents_mobile;

// Path to save the QR code image
//$filename = 'qrcodes\qrcode.png';

// Generate QR code and save it to a file
//QRcode::png($data, $filename);



 

?>


</body>
</html>
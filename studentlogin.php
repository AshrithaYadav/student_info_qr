
  <?php 
    require 'db.php';
    $conn = mysqli_connect($server,$username,$password,$database);
if($conn == false){
  die('cannot connect'.mysqli_connect_error($conn));


}

$email_address = $_POST['email_address'];
$student_login_password = $_POST['student_login_password'];
$hashed_pass = password_hash($student_login_password, PASSWORD_DEFAULT);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    
    // Query the database for the user
    $query = "SELECT * FROM studentsignup WHERE email_signup = '$email_address'";
    $result = mysqli_query($conn,$query);
       
    
    if ($result->num_rows > 0) {
        // Fetch the user data
        $row = $result->fetch_assoc();
        $hashed_pass = $row['student_password'];
        
        // Verify the password
        if (password_verify($student_login_password, $hashed_pass)) {
            include 'studentform.html';
           
        } else {
             //Incorrect password
            echo "Incorrect password. Please try again.";
        }
    } else {
        // Email not found
        echo "No account found with that email.";
    }
}

// Close connection
$conn->close();


 ?>
 
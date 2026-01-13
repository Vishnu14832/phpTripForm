<?php
$insert = false;
if (isset($_POST['name'])) {

    // $servername = "localhost";
    // $username = "root";
    // $password = "Vishnu123";
    // $database = "trip";
    
    // Create connection
    $conn = mysqli_connect("localhost","root","Vishnu123","travel",3307);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get form data
    $name   = $_POST['name'];
    $age    = $_POST['age'];
    $gender = $_POST['gender'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $desc   = $_POST['desc'];

    // SQL query (STRINGS IN QUOTES)
    $sql = "INSERT INTO `trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`)
            VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";

    if ($conn->query($sql) === TRUE) {
        // echo "Successfully inserted";
        $insert = true;
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="image.jpg" alt="college image">
    <div class="container">
        <h3>Welcome to college trip form</h3>
        <p>Enter your details to confirm your participation in the trip</p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting this form we are happy to see you in this trip</p>";
    }
        ?>
    
    <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter Your name">
        <input type="text" name="age" id="age" placeholder="Enter Your age">
        <input type="text" name="gender" id="gender" placeholder="Enter Your gender">
        <input type="email" name="email" id="email" placeholder="Enter Your email">
        <input type="phone" name="phone" id="phone" placeholder="Enter Your phone">

        <textarea name="desc" id="desc" cols="30" rows="10">Enter other information</textarea>

        <button class="btn">submit</button>
    </form>

    </div>
    <script src="script.js"></script>
</body>
</html>
<!-- INSERT INTO `trip` (`sno`, `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('1', 'Rahul', '23', 'male', 'rahul1@gmail.com', '7382782734', 'this is my first trip from college', current_timestamp()); -->

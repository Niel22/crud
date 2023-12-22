<?php 
include 'config.php';

if(isset($_POST['submit'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO users (`firstname`, `lastname`, `email`, `password`, `gender`) VALUES ('$firstname', '$lastname', '$email', '$password', '$gender')";
    $result = $conn->query($sql);

    if($result){
        header('location:view.php');
    }else {
        echo "Error" . $sql . "<br>". $conn->error;
    }
$conn->close();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
    <h2>Signup Form</h2>

    <form action="" method='post'>
        <fieldset>
            <legend>Personal Information</legend>
            First Name:<br>
            <input type="text" name='firstname'><br>
            Last Name:<br>
            <input type="text" name='lastname'><br>
            Email:<br>
            <input type="text" name='email'><br>
            Password:<br>
            <input type="text" name='password'><br>
            Gender:<br>
            <input type="radio" name='gender' value="Male">Male
            <input type="radio" name='gender' value="Female">Female
            <br><br>
            <input type="submit" name="submit" value="submit">
        </fieldset>
    </form>
</body>
</html>
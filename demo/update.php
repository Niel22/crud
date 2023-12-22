<?php

include 'config.php';

if(isset($_POST['update'])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $id = $_POST['id'];
    $password = $_POST['password'];
    
    $sql = "UPDATE users SET `firstname` = '$firstname',  `lastname` = '$lastname',  `email` = '$email',  `gender` = '$gender',  `password` = '$password' WHERE `id`='$id'";    

    $result = $conn->query($sql);

    if($result= $conn->error){
        echo "Error ". $sql . '<br>' . $conn->error;
    } else {
        header('location:view.php');
    }
}

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE `id` = '$id'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $password = $row['password'];
            $gender = $row['gender'];
            $id = $row['id'];
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        
    <h2>User Update Form</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Personal Information</legend>
            First Name:<br>
            <input type="text" name='firstname'value='<?php echo $firstname; ?>'><br>
            Last Name:<br>
            <input type="text" name='lastname'value='<?php echo $lastname; ?>'><br>
            Email:<br>
            <input type="text" name='email'value='<?php echo $email; ?>'><br>
            Password:<br>
            <input type="text" name='password'value='<?php echo $password; ?>'><br>
            Gender:<br>
            <input type="radio" name='gender'value='Male' <?php if($gender == 'Male'){echo 'checked';} ?>>Male
            <input type="radio" name='gender'value='Female' <?php if($gender == 'Female'){echo 'checked';} ?>>Female
            <br><br>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="submit" name="update" value="update">
        </fieldset>
    </form>
    <?php
    }
}else {
    echo "No result found";
}
}else {
    header('location:view.php');
}
?>
</body>
</html>
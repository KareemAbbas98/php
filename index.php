
<?php

$name = $age = $gender = $address = $email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $age = test_input($_POST["age"]);
    $gender = test_input($_POST["gender"]);
    $address = test_input($_POST["address"]);
    $email = test_input($_POST["email"]);
    var_dump($email,$name,$age,$address,$gender);
    $conn = new mysqli('localhost', 'root', '', 'sb1');
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO student (name, age, email,address,gender)
VALUES ('$name', '$age', '$email','$address','$gender')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    return htmlspecialchars($data);}



?>
<html>
<body>
<form action="" method="post">
    Name: <input type="text" name="name">
    <span class="error"> *  </span>
    <br>
    age: <input type="number" name="age" id="username">
    <span class="error"> *  </span>
    <br>
    gender: <input type="radio" name="gender" id="male">
    <label for="male">Male</label>
    <input type="radio" name="gender" id="female">
    <label for="female">Female</label>
    <span class="error"> *  </span>
    <br>
    <label for="address">Address:</label>
    <textarea rows="3" cols="30" name="address" id="address"></textarea>
    <span class="error"> *  </span>
    <br>
    email: <input type="text" name="email">
    <span class="error"> *  </span>
    <br>
    <input type="submit">
</form>
</body>
</html>
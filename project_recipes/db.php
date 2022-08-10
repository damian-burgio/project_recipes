<?php
date_default_timezone_set("America/Argentina/Buenos_Aires");
require_once('functions.php');


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "recipes";

$name = $_POST['name'];
$email = $_POST['email'];
$date = date('Y-m-d H:i:s');

$valid_email = is_valid_email($email);


$conn = new mysqli($servername, $username, $password, $dbname);
$verificar_correo = mysqli_query($conn, "SELECT * from newsleter WHERE mail_newsletter='$email'");
if (mysqli_num_rows($verificar_correo) > 0 || $valid_email == "False" ) {
    echo '<script>
            alert("There is an error. The email already exists or the address is wrong.");
            window.history.go(-1);
          </script>';
} else {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // prepare sql and bind parameters
        $stmt = $conn->prepare("INSERT INTO newsleter (name_newsletter,mail_newsletter,date_newsletter)
        VALUES (:name_newsletter, :mail_newsletter, :date_newsletter)");
        $stmt->bindParam(':name_newsletter', $name);
        $stmt->bindParam(':mail_newsletter', $email);
        $stmt->bindParam(':date_newsletter', $date);

        // insert a row
        $name = $_POST['name'];
        $email = $_POST['email'];
        $date = date('Y-m-d H:i:s');
        $stmt->execute();

        echo '<script>
                alert("Success");
                window.history.go(-1);
              </script>';
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
}

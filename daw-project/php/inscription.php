<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $age = $_POST["age"];
    $wilaya = $_POST["wilaya"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];
    $host = "sql301.infinityfree.com";
    $dbname = "if0_41995530_db";
    $dbuser = "if0_41995530";
    $dbpass = "u5UOIhPreO";
    try {
        $conn=new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbuser , $dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $query = "INSERT INTO Client ( No_Clt , Pno_Clt , Age_Clt , Wi_Clt , Tel_Clt , Mail_Clt , Adr_Clt , Mot_Clt , Sexe_Clt)
        VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$lname , $fname  , $age , $wilaya , $phone , $email , $address , $password , $gender]); 
        $checkQuery = "SELECT Id_Clt, Pno_Clt, No_Clt FROM Client WHERE Mail_Clt = ?";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->execute([$email]);
        $client = $checkStmt->fetch(PDO::FETCH_ASSOC);
        if ($client) {
            $_SESSION["id"]         = $client["Id_Clt"];
            $_SESSION["first_name"] = $client["Pno_Clt"];
            $_SESSION["last_name"]  = $client["No_Clt"];
        }
        header("location:../html/index.php");
        exit();
    } catch (PDOException $e) {
        echo "❌ Database Error: " . $e->getMessage();
    }
    $conn = null ; 
}
?>
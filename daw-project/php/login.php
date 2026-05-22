<?php
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    $host = "127.0.0.1";
    $dbname = "Base_Client";
    $dbuser = "root";
    $dbpass = "@Younes2006";
    try {
        $conn = new PDO('sqlite:' . __DIR__ . '/Base_Client.sqlite');
        $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $query = "SELECT Id_Clt , No_Clt , Pno_Clt , Mail_Clt , Mot_Clt FROM Client WHERE Mail_Clt= ? AND Mot_Clt = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$email , $password]);
        $client = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($client) {
            session_start();
            $_SESSION["id"] = $client["Id_Clt"];
            $_SESSION["first_name"] = $client["Pno_Clt"];
            $_SESSION["last_name"] = $client["No_Clt"];
            echo "<script>
            alert('Authentication successful! Welcome ".$_SESSION["first_name"]." ".$_SESSION["last_name"].". You can now place orders.');
            window.location.href='../html/index.php';
            </script>";
        }else {
            echo "<script>
            alert('Error: Incorrect E-mail or Password!');
            window.location.href='../html/login.html';
            </script>";
        }
    } catch (PDOException $e) {
        echo "❌ Database Error: " . $e->getMessage();
    }
    $conn = null ; 
}
?>
<?php

try {
    $conn = new PDO('sqlite:' . __DIR__ . '/Base_Client.sqlite');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
   
    $conn->exec("CREATE TABLE IF NOT EXISTS Client (
        Id_Clt INTEGER PRIMARY KEY AUTOINCREMENT,
        No_Clt TEXT NOT NULL,
        Pno_Clt TEXT NOT NULL,
        Mail_Clt TEXT NOT NULL UNIQUE,
        Mot_Clt TEXT NOT NULL
    )");
} catch (PDOException $e) {
    die("❌ Database Error: " . $e->getMessage());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $spassword = $_POST["password"];
    
    try {
        $query = "SELECT Id_Clt , No_Clt , Pno_Clt , Mail_Clt , Mot_Clt FROM Client WHERE Mail_Clt = ? AND Mot_Clt = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$email , $spassword]);
        $client = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($client) {
            session_start();
            $_SESSION["id"] = $client["Id_Clt"];
            $_SESSION["first_name"] = $client["Pno_Clt"];
            $_SESSION["last_name"] = $client["No_Clt"];
            echo "<script>
                    alert('Authentication successful! Welcome ".$_SESSION["first_name"]." ".$_SESSION["last_name"]."');
                    window.location.href='../html/index.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Error: Incorrect E-mail or Password!');
                    window.location.href='../html/login.html';
                  </script>";
        }
    } catch (PDOException $e) {
        die("❌ Query Error: " . $e->getMessage());
    }
    
    $conn = null;
}
?>
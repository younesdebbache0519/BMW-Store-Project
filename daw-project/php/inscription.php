<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


try {
    $conn = new PDO('sqlite:' . __DIR__ . '/Base_Client.sqlite');
    $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    

    $conn->exec("CREATE TABLE IF NOT EXISTS Client (
        Id_Clt INTEGER PRIMARY KEY AUTOINCREMENT,
        No_Clt TEXT NOT NULL,
        Pno_Clt TEXT NOT NULL,
        Age_Clt INTEGER,
        Wi_Clt TEXT,
        Tel_Clt TEXT,
        Mail_Clt TEXT NOT NULL UNIQUE,
        Adr_Clt TEXT,
        Mot_Clt TEXT NOT NULL,
        Sexe_Clt TEXT
    )");
} catch (PDOException $e) {
    die("❌ Database Connection Error: " . $e->getMessage());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $age = $_POST["age"];
    $wilaya = $_POST["wilaya"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];

    try {
  
        $query = "INSERT INTO Client (No_Clt , Pno_Clt , Age_Clt , Wi_Clt , Tel_Clt , Mail_Clt , Adr_Clt , Mot_Clt , Sexe_Clt)
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
        echo "❌ Database Query Error: " . $e->getMessage();
    }
    
    $conn = null; 
}
?>
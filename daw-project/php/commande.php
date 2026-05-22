<?php
session_start();
if (!isset($_SESSION["id"])) {
    echo "<script>
    alert('Please login first to be able to order a vehicle!');
    window.location.href = '../html/login.html';
    </script>";
    exit();
}else{
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Ref_prod = $_POST["Ref_prod"]; 
    $Vendeur_prod = $_POST["Vendeur_prod"];
    $Prix_prod = $_POST["Prix_prod"];
    $Colr_prod = $_POST["Colr_prod"]; 
    $Qant_prod = $_POST["Qant_prod"];
    $host = "sql301.infinityfree.com";
    $dbname = "if0_41995530_db";
    $dbuser = "if0_41995530";
    $dbpass = "u5UOlhPre0";


    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8" , $dbuser , $dbpass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "INSERT INTO Commande_produit(Id_client , Vendeur_prod , Prix_prod , Ref_prod , Colr_prod , Qant_prod ) VALUES(?,?,?,?,?,?)";
        $stmt = $conn->prepare($query);
        $stmt->execute([$_SESSION["id"] , $Vendeur_prod , $Prix_prod , $Ref_prod , $Colr_prod , $Qant_prod]);
        echo "<script>
        alert('🎉 Order placed successfully! Thank you for buying from BMW STORE.');
        window.location.href = '../html/index.php';
        </script>";
        exit();
    } catch (PDOException $e) {
        echo "❌ Order Error: ".$e->getMessage();
    }
    $conn = null ; 

}
}

?>
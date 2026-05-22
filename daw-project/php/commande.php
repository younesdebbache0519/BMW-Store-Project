<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// 1. الاتصال بـ SQLite وبناء جدول الطلبات فوراً عند تحميل الصفحة
try {
    $conn = new PDO('sqlite:' . __DIR__ . '/Base_Client.sqlite');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // بناء جدول الطلبات تلقائياً بكافة الأعمدة الستة المتوافقة مع منطق مشروعك
    $conn->exec("CREATE TABLE IF NOT EXISTS Commande_produit (
        Id_cmd INTEGER PRIMARY KEY AUTOINCREMENT,
        Id_client INTEGER NOT NULL,
        Vendeur_prod TEXT,
        Prix_prod REAL NOT NULL,
        Ref_prod TEXT NOT NULL,
        Colr_prod TEXT,
        Qant_prod INTEGER NOT NULL,
        Date_cmd TEXT DEFAULT CURRENT_TIMESTAMP
    )");
} catch (PDOException $e) {
    die("❌ Database Connection Error: " . $e->getMessage());
}

// 2. التحقق من تسجيل الدخول أولاً قبل السماح بالطلب
if (!isset($_SESSION["id"])) {
    echo "<script>
    alert('Please login first to be able to order a vehicle!');
    window.location.href = '../html/login.html';
    </script>";
    exit();
}

// 3. معالجة بيانات الطلب وإدخالها عند إرسال النموذج (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Ref_prod = $_POST["Ref_prod"]; 
    $Vendeur_prod = $_POST["Vendeur_prod"];
    $Prix_prod = $_POST["Prix_prod"];
    $Colr_prod = $_POST["Colr_prod"]; 
    $Qant_prod = $_POST["Qant_prod"];

    try {
        // استعلام الإدخال الخاص بك دون أدنى تغيير في المنطق والبناء
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
    
    $conn = null; 
}
?>
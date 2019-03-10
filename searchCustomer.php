
<?php
$host = 'localhost';
$db = 'classicmodels';
$user = 'root';
$pass = 'Carlphp2019';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;
 dbname=$db;
 charset=$charset";

 try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(),(int)$e->getCode());
}

if (isset($_GET['customer'])) {
    $customerNumber = filter_input(INPUT_GET, 'customer', FILTER_SANITIZE_STRING);    

    $stmt = $pdo->query("SELECT * FROM customers WHERE customerNumber = $customerNumber");

    if ($row = $stmt->fetch()) {
        print_r($row);
        echo "<br>" . "<br>" .$row['customerNumber'] . " - " . $row['customerName'] . " - " .  $row['country'] .  "<br>";
    } else {
        echo 'Det finns ingen kund med det numret.';
    }
 } else {
     echo 'Ingen kund vald.';
}

$customerNumber = '242';  



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--    <link rel="stylesheet" href="styles.css">-->
    <title>Search Customers</title>
</head>
<body>

<h1>Sökresultat kunder</h1>
<form action="searchcustomer.php" method="get">
        <input type="text" name="customer">
        <input type="submit" value="Search">   
</form>
  
</body>
</html>
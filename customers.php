<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customers</title>
<!--    <link rel="stylesheet" href="styles.css">-->
</head>

<body>

<h1>Kunder</h1>

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

    $stmt = $pdo->query("SELECT country FROM customers group by country;");
while ($row = $stmt->fetch())
{
    echo $row['country'] . "<br>";
}    

?>
<h1>Sök kunder</h1>

<form action="searchcustomer.php" method="get">
        <input type="text" name="query">
        <input type="submit" value="Search">   
</form>
</body>

</html>
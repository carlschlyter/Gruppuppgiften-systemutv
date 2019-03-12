<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    $host = 'localhost';
    $user = 'root';
    $password = 'Carlphp2019';
    $dbname = 'classicmodels';

    $dsn = 'mysql:host='. $host .';dbname='. $dbname;
    
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 

    /*$stmt = $pdo->query('SELECT * FROM customers LIMIT 20');

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo $row['customerName'] . '-' . $row['customerNumber'] . '<br>';
    }*/

    $customer = 'France';

    $sql = 'SELECT * FROM customers WHERE country = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$customer]);
    $customers = $stmt->fetchALL();
    
    //var_dump($customers);
    foreach($customers as $customerEntry){
        echo $customerEntry->customerName . '<br>';
    } 
?>
    
</body>
</html>


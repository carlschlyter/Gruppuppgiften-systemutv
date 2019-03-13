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


    $customerCtry = 'Spain';
    $customerNme = 'ANG Resellers';

    $sql = 'SELECT * FROM customers WHERE country = :customerCtry && customerName = :customerNme';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['customerCtry' => $customerCtry, 'customerNme' => $customerNme]);
    $posts = $stmt->fetchALL();

 /*
    $sql = 'SELECT * FROM customers WHERE country = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$customer]);
    $posts = $stmt->fetchALL();
*/    
    //var_dump($customers);
    foreach($posts as $post){
        echo $post->customerName . '<br>';
    } 
?>
    
</body>
</html>


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

    $customer = 'Herkku';

    $sql = 'SELECT * FROM customers WHERE customerName = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$customer]);
    $customers = $stmt->fetchALL();
    
    var_dump($customers);
?>
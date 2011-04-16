<?php
try {
$dbh = new PDO('sqlite:../database/anm293.db'); //SQLite by default is UTF-8
$dbh->exec('SET NAMES utf8');
$dbh->exec('CREATE TABLE orders(id INTEGER PRIMARY KEY, name CHAR(20), age INT, sex CHAR(4));
INSERT INTO orders (name,age,sex) VALUES("Sam","32","Male");
 ');
$dbh->exec('INSERT INTO orders (name,age,sex) VALUES("Fred","22","Male")');
foreach( $dbh->query('select * from orders') as $row ){
echo $row['name'] . chr(10);
echo $row['age'] . chr(10);
}

$dbh = NULL;
}
catch(PDOException $e)
{
die($e->getMessage());
}
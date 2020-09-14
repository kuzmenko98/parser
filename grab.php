<?php
$driver = 'mysql';
$host = 'localhost';
$db_name = 'parser_bd';
$username = 'root';
$password = 'root';
$charset = 'utf8';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
    $pdo = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $username,$password,$options);
}catch (PDOException $e){
    die("Не могу подключиться");
}



ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
set_time_limit(5);

include('simple_html_dom.php');
$searchQuery = $_GET['query'];

$searchQuery = str_replace(' ','+',$searchQuery);
$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, "https://www.google.com/search?q=" . $searchQuery);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION,true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.102 Safari/537.36');


$result = curl_exec($curl);
curl_close($curl);

$domResults = new simple_html_dom();

$domResults->load($result);

    foreach ($domResults->find('div.r') as $elements) {
        $title = $elements->find('h3', 0)->plaintext;
        $link = $elements->find('a', 0)->href;
        $sql = 'INSERT INTO query(title,link) VALUES(:title,:link)';
        $query = $pdo->prepare($sql);
        $query->execute(['title' => $title, 'link' => $link]);
    }

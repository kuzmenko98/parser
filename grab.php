<?php
include('simple_html_dom.php');
$searchQuery = $_GET['query'];

$searchQuery = str_replace(' ','+',$searchQuery);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "https://www.google.com/search?q=" . $searchQuery);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION,true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);

$result = curl_exec($curl);
curl_close($curl);

$domResults = new simple_html_dom();

$domResults->load($result);

foreach ($domResults->find('div.r') as $elements){
    echo $elements . '</br>';
}
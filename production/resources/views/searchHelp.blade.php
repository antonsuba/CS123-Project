<!DOCTYPE html>
<html lang="en">

<?php
$clientID = 'BFTXU5UAPKE1BNL3E1RGFGJ3OXZQA0JEGLCM12VP4PURBVVK';
$clientSecret = 'IPB1VK0SXQCC20OX4SGYQDTIRGS0O211W3PCN4CILGWWLUU0';

$requestDate = date('Ymd');

$baseURL = 'https://api.foursquare.com/v2/';
$endpoint = 'venues/search?'; #note: if we want top place, we use explore instead of search
$params = 'near=Mandaluyong+City'; #Note: we can add more search options like query by adding "&" after, ex. near=Quezon+City&query=Coffee+shop
$auth = "&client_id=$clientID&client_secret=$clientSecret&v=$requestDate";

$url = $baseURL.$endpoint.$params.$auth;
#echo $url;

$results = file_get_contents($url);
$json_results = json_decode($results,true); #array
$venues = $json_results['response']['venues'];

foreach($venues as $venue){
	echo '<li>';
	echo $venue['name'];
	echo '</li>';
}
?>
<head></head>
<body></body>
</html>
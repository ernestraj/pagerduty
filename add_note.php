<?php
$API_ACCESS_KEY = 'wYAx6kaxqtbWwHTHHEkK';
$URL = 'https://api.pagerduty.com/incidents?incident_key=72991&time_zone=UTC';
$ch = curl_init();
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL, $URL);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Content-type: application/json',
  'Authorization: Token token=' . $API_ACCESS_KEY
));
$output = curl_exec($ch);
print_r($output);
?>
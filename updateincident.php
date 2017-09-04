<?php

$API_ACCESS_KEY = 'wYAx6kaxqtbWwHTHHEkK';
$REQUESTER_EMAIL = 'tajinders.minhas@gmail.com';
$INCIDENT_ID = 'PGJO717';
$PAYLOAD = array(
  'incident' => array(
    'type' => 'incident_reference',
    'status' => 'acknowledged'
  )
);

print urlencode($INCIDENT_ID);

$JSON = json_encode($PAYLOAD);
$URL = 'https://api.pagerduty.com/incidents/' . urlencode($INCIDENT_ID);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $URL);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-type: application/json',
    'Authorization: Token token=' . $API_ACCESS_KEY,
    'From: ' . $REQUESTER_EMAIL
));
curl_setopt($ch, CURLOPT_HEADER, TRUE); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, $JSON);
$output = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
print '<pre>'; print_r($httpcode);
print '<pre>'; print_r($output);
?>
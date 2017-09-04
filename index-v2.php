<?php
$API_ACCESS_KEY = '	37a7b0b9f9554953abf8db72a1ef3ff1';
$REQUESTER_EMAIL = 'tajinders.minhas@gmail.com';
$INCIDENT_ID = 'P2RDEWJ';
$PAYLOAD = array(
  'note' => array(
    'content' => 'Firefighters are on the scene.'
  )
);
$JSON = json_encode($PAYLOAD);
$URL = 'https://api.pagerduty.com/incidents/' . urlencode($INCIDENT_ID) . '/notes';
$session = curl_init();
curl_setopt($session, CURLOPT_URL, $URL);
curl_setopt($session, CURLOPT_HTTPHEADER, array(
    'Content-type: application/json',
    'Authorization: Token token=' . $API_ACCESS_KEY,
    'From: ' . $REQUESTER_EMAIL
));
curl_setopt($session, CURLOPT_POSTFIELDS, $JSON);
$output = curl_exec($session);

print '<pre>'; print_r($output);
?>
<?php

$API_ACCESS_KEY = 'wYAx6kaxqtbWwHTHHEkK';
$REQUESTER_EMAIL = 'john.doe@gmail.com';
$INCIDENT_ID = 'PGJO717';
$PAYLOAD = array(
  'incident' => array(
    'type' => 'incident_reference',
    'status' => 'trigger'
  )
);

/*
  This example shows how to send a trigger event without a dedup_key.
  In this case, PagerDuty will automatically assign a random and unique key
  and return it in the response object.
  You should store this key in case you want to send an acknowledge or resolve
  event to this incident in the future.
*/

$json = '{
  "routing_key": "37a7b0b9f9554953abf8db72a1ef3ff1",
  "dedup_key": "1",
  "event_action": "acknowledge"
}';

$JSON = json_encode($PAYLOAD);
$URL = 'https://events.pagerduty.com/v2/enqueue';
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
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
$output = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
print '<pre>'; print_r($httpcode);
print '<pre>'; print_r($output);
?>
<?php
$API_ACCESS_KEY = 'wYAx6kaxqtbWwHTHHEkK';
$PAYLOAD = array(
  'user' => array(
    'type' => 'user',
    'name' => 'John Doe',
    'email' => 'john.doe@gmail.com',
    'time_zone' => 'UTC',
    'color' => 'green',
    'role' => 'limited_user',
    'job_title' => 'DevOps Intern'
  )
);
$JSON = json_encode($PAYLOAD);
$URL = 'https://api.pagerduty.com/users';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $URL);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-type: application/json',
    'Authorization: Token token=' . $API_ACCESS_KEY
));
curl_setopt($ch, CURLOPT_HEADER, TRUE); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_POSTFIELDS, $JSON);
$output = curl_exec($ch);
print_r($output);
?>
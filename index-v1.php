<?php

/*
  This example shows how to send a trigger event without an incident_key.
  In this case, PagerDuty will automatically assign a random and unique key
  and return it in the response object.
  You should store this key in case you want to send an acknowledge or resolve
  event to this incident in the future.
*/

$options = array(   
  "service_key" => "aee3266deb7f4e46acd9fff5a6243643",
  "event_type" => "trigger",
  "description" => "FAILURE for production/HTTP on machine srv01.acme.com",
  "client" => "Sample Monitoring Service",
  "client_url"=> "https://monitoring.service.com",
  "details" => array(
    "ping time" => "1500ms",
    "load avg" => 0.75
  ),
  "contexts" => array( 
    array(
      "type" => "link",
      "href" => "http://acme.pagerduty.com"
    ),
	array(
      "type"=> "link",
      "href"=> "http://acme.pagerduty.com",
      "text"=> "View the incident on PagerDuty"
    ),
	array(
      "type"=> "image",
      "src"=> "https://chart.googleapis.com/chart?chs=600x400&chd=t:6,2,9,5,2,5,7,4,8,2,1&cht=lc&chds=a&chxt=y&chm=D,0033FF,0,0,5,1"
    )
  )
);

$options = array(
  "incident" => array(
    "type"=> "incident",
    "title"=> "The server is on fire.",
    "service"=> array(
      "id"=> "aee3266deb7f4e46acd9fff5a6243643",
      "type"=> "service_reference"
    ),
    "incident_key"=> "0858542572b84ab5a6a6015bfaf4840f"
  )
);

$url = 'https://events.pagerduty.com/generic/2010-04-15/create_event.json';

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $url); 
curl_setopt($ch, CURLOPT_HEADER, TRUE); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($options));  //Post Fields
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
$head = curl_exec($ch); 

print '<pre>'; print_r($head);


?>
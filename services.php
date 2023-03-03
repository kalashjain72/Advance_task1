<?php
require_once 'vendor/autoload.php'; // include Composer autoload file
use GuzzleHttp\Client;

// define the Service class with properties for id, title, description, and image_url
class Service {
    public $fieldservice;
    public $image_url;
    public $icons;
    public $fieldsecondary;

    public function __construct($image_url,$icons,$fieldsecondary,$fieldservice){
        $this->image_url = $image_url;
        $this->icons = $icons;
        $this->fieldsecondary = $fieldsecondary;
        $this->fieldservice = $fieldservice;
    }
}

// fetch the JSON data from the Innoraft API using GuzzleHttp
$client = new Client(['base_uri' => 'https://ir-dev-d9.innoraft-sites.com/']);
$response = $client->get('jsonapi/node/services');
$data = json_decode($response->getBody(), true);

// extract the relevant data from the JSON response and create Service objects for the last four items
$services = [];
$last_four = array_slice($data['data'], -4);

for ($i = 0; $i < count($last_four); $i++) {
    $service = $last_four[$i];

    $image_url = "";
    $icon_url = "";
    $uri_url = $service['relationships']['field_image']['links']['related']['href'];
    $iconuri_url = $service['relationships']['field_service_icon']['links']['related']['href'];
    $fieldsecondary = $service['attributes']['field_secondary_title']['processed'];
    $fieldservice = $service['attributes']['field_services']['processed'];
    
    // fetch the second JSON file using GuzzleHttp
    $response = $client->get($uri_url);
    $data = json_decode($response->getBody(), true);
    // extract the image URL from the second JSON file
    if(isset($data['data']['attributes']['uri']['url'])){
        $image_url = $data['data']['attributes']['uri']['url'];
    }
    // fetch the third JSON file using GuzzleHttp
    $response = $client->get($iconuri_url);
    $data1= json_decode($response->getBody(), true);
		$icons = [];


    for ($j=0; $j<count($data1['data']); $j++) {
        // extract the thumbnail URL from the third JSON file
        if(isset($data1['data'][$j]['relationships']['thumbnail']['links']['related']['href'])){
            $thumbnailuri_url = $data1['data'][$j]['relationships']['thumbnail']['links']['related']['href'];
        }
        // fetch the fourth JSON file using GuzzleHttp
        $response = $client->get($thumbnailuri_url);
        $data2 = json_decode($response->getBody(), true);
        
        // extract the icon URL from the fourth JSON file
					$icons[] = $data2['data']['attributes']['uri']['url'];
    
    }
    $services[] = new Service($image_url,$icons,$fieldsecondary,$fieldservice);

}
?>
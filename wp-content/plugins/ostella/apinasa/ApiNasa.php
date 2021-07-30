<?php

/*  $request = wp_remote_get('https://images-api.nasa.gov/search');
 
if( is_wp_error( $request ) ) {
    return false; // Si il y a une erreur, on s'arrête là
}
$body = wp_remote_retrieve_body( $request );
var_dump($body);

$data = json_decode( $body, true );

foreach ($data as $item) {
    $image = $item['image'];
    
    echo '<p>' . $image . '</p>';
  } */

  
// fonction pour récupérer les données de la nasa 

$apiUrl = 'https://images-api.nasa.gov/search';
$response = wp_remote_get($apiUrl);
$responseBody = wp_remote_retrieve_body( $response );
$result = json_decode( $responseBody );
return $result;
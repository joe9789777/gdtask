<?php 

function site_files(){
    wp_enqueue_script( 'js', get_template_directory_uri() . '/index.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_style('site_style',get_stylesheet_uri());
    wp_localize_script('js','js_data',[
        'root_url' => get_site_url(),
        'nonce' => wp_create_nonce('wp_rest')
    ]);
    wp_enqueue_style('fonts','//fonts.googleapis.com/css2?family=Roboto&display=swap');
    wp_enqueue_style('bootstrap','//stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
    
}



add_action('wp_enqueue_scripts','site_files');

//basic sanitization
$email = sanitize_email($_POST['email']);
$name = sanitize_text_field($_POST['name']);


$data = [
    'contact'=> [
        'email'=> $email,
        'firstname'=> $name
    ]
];

//submitting to active campaign
$data =  json_encode($data);

$params = array(
	'api_key'      => 'key-goes-here-the-gdtask-has-the-api-key',
);

$args = array(
    'body'        => $data,
    'timeout'     => '50',
    'redirection' => '5',
    'httpversion' => '1.0',
    'blocking'    => true,
    'headers'     => ['Api-Token'      => 'a75a63a9e0cf80869f719bc66bf1cc783e403d9ff51c968f51641db30d77c92b8a77a700'],
    'cookies'     => array(),
);

$url = 'https://techben97.api-us1.com/api/3/contacts';




$response = wp_remote_post( $url, $args );
$http_code = wp_remote_retrieve_response_code( $response );
//echo $http_code;







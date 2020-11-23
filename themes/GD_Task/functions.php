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


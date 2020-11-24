<?php get_header(); ?>

<?php 
	$postID = 0;
    $query = new WP_Query([
        'post_per_page' => -1,
        'post_type' => 'campaign',
        'meta_key' => 'is_active_campaign',
        'meta_query' => [
            [
                'key' => 'is_active_campaign',
                'compare' => '=',
                'value' => "Yes"
            ]
        ]
    ]);

     if($query->post_count > 1){

        echo '<h1 class="text-danger">Some Error occurred please try again after sometime</h1>';
		die;
     }else{
		$postID= wp_list_pluck( $query->posts, 'ID' );
		
	 }


?>

<div class="contact1">

	<form action="functions.php" method="POST">
	<input type="hidden" id="postID" name="custId" data-id="<?php echo $postID[0]; ?>">
		<div class="container-contact1">
			<div class="contact1-pic js-tilt" data-tilt>
				<img src="<?php echo get_template_directory_uri(); ?>/img-01.png" alt="IMG">
			</div>
				<span class="contact1-form-title">
					Campaign Form
				</span>

				<div class="wrap-input1 validate-input" data-validate = "Name is required">
					<input class="input1" type="text" name="name" placeholder="Firstname" id="name" required>
					<span class="shadow-input1"></span>
				</div>

				<div class="wrap-input1 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input class="input1" type="text" name="email" placeholder="Email" id="email" required>
					<span class="shadow-input1"></span>
				</div>

				<div class="container-contact1-form-btn">
					<button class="contact1-form-btn" id="submit">
						<span>
							Submit
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
				</div>
		</div>
	</div>
	</form>	
		

<?php get_footer(); ?>
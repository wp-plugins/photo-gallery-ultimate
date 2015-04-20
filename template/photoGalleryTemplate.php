	
	
 <?php get_header(); ?> 

<div class="pg-container">
	<div class="pg-row" id="pg-headline">
		<h1><?php echo $headline; ?></h1>
	</div>
	<div class="pg-row" id="pg-header">
		<div class="pg-header-column">
			<?php echo do_shortcode($header); ?>
		</div>
	</div>
	<?php
		
		$pg_singlePhotoCount = 0;
		foreach($photoGroup as $photo){
			pg_make_photo_display($photo, $pg_singlePhotoCount);
			$pg_singlePhotoCount++;
		}
		if(!($pg_singlePhotoCount % 3 == 2)){
			echo '</div>';
		}
		
		function pg_make_photo_display($photo, $pg_PhotoCount){
			global $post;
			global $wpdb;
					
			if($pg_PhotoCount % 3 == 0 || $pg_PhotoCount == 0){
				echo '<div class="pg-row">';
				
			}
			
			echo '<div class="pg-columns">';
			
			if(isset($photo['title']) && trim($photo['title']) != ''){
				$pg_photo_title = $photo['title'];
				echo '<h4>'.$pg_photo_title.'</h4>';
			}
			 if ( isset( $photo['image_id'] ) ) {
			 	$image_url = $photo['image'];
			 	$image_id = $photo['image_id'];
			 	$img = wp_get_attachment_image( $image_id, 'thumbnail', null, array(
			            'class' => 'thumb',
			        ) );
			        echo '<div><a href="'.$image_url.'">'.$img.'</a></div>';
			 }
			 
			if ( isset( $photo['description'] ) ) {
				echo '<p>'.$photo['description'].'</p>';
			}
			echo '</div>';
			if($pg_PhotoCount % 3 == 2){
				echo '</div>';
			}
		}
	?>
	
	<div class="row" id="pg-footer">
		<div class="pg-footer-column">
			<?php echo do_shortcode($footer); ?>
		</div>
	</div>
</div>
	<?php get_footer(); ?>


</body>
</html>




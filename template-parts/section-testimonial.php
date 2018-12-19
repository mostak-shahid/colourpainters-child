<?php 
global $mosacademy_options;
$animation = $mosacademy_options['sections-testimonial-animation'];
$animation_delay = ( $mosacademy_options['sections-testimonial-animation-delay'] ) ? $mosacademy_options['sections-testimonial-animation-delay'] : 0;
$title = $mosacademy_options['sections-testimonial-title'];
$content = $mosacademy_options['sections-testimonial-content'];


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_testimonial', $page_details ); 
?>
<section id="section-testimonial" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_testimonial hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_testimonial', $page_details ); 
		?>
				<?php if ($title) : ?>				
					<div class="title-wrapper">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php 
				$args = array(
					'post_type' => 'testimonial',
					'posts_per_page'=> -1
				);
				$query = new WP_Query( $args );

				if ( $query->have_posts() ) :
					echo '<div class="testimonial-con"><div id="testimonial-owl-carousel" class="owl-carousel owl-theme">';
					while ( $query->have_posts() ) : $query->the_post();
						$designation = get_post_meta( get_the_ID(), '_mos_testimonial_designation', true );
						echo '<div class="wrapper">';
						echo '<h3 class="testimonial-header">' . get_the_title();
						if ($designation) echo ', ' . $designation;
						echo '</h3>';
						echo '<div class="desc">' . get_the_content() . '</div>';
						echo '</div>';
					endwhile;
					echo '</div></div>';
					wp_reset_postdata();
				endif;
				?>
		<?php 
		/*
		* action_after_testimonial hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_testimonial', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_testimonial', $page_details  ); ?>
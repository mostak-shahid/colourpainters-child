<?php 
global $mosacademy_options;
$animation = $mosacademy_options['sections-iservices-animation'];
$animation_delay = ( $mosacademy_options['sections-iservices-animation-delay'] ) ? $mosacademy_options['sections-iservices-animation-delay'] : 0;
$title = $mosacademy_options['sections-iservices-title'];
$content = $mosacademy_options['sections-iservices-content'];
$slides = $mosacademy_options['sections-iservices-slides'];


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_iservices', $page_details ); 
?>
<section id="section-iservices" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_iservices hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_iservices', $page_details ); 
		?>
				<?php if ($title) : ?>				
					<div class="title-wrapper">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php if (@$slides) : ?>
					<div class="flex-container">
						<?php foreach ($slides as $slide) : ?>
							<div class="iservices-unit">
								<?php if ($slide['attachment_id']): ?>										
								<img class="img-responsive img-iservices" src="<?php echo aq_resize( wp_get_attachment_url( $slide['attachment_id'] ), 360, 204, true ) ?>" alt="<?php echo $alt_tag['inner'] . $slide['title'] ?>">
								<?php endif ?>
								<div class="con"><h3 class="title-iservices"><?php echo $slide['title']; ?></h3></div>
								<a href="<?php echo do_shortcode( $slide['url'] )?>" class="hidden-link">View</a>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif; ?>
<?php 				
/*
  array(8) {
    ["title"]=>
    string(20) "Residential Painting"
    ["url"]=>
    string(32) "[home_url]/residential-painting/"
    ["sort"]=>
    string(1) "0"
    ["attachment_id"]=>
    string(2) "78"
    ["image"]=>
    string(87) "http://colourpainters.belocal.today/wp-content/uploads/2018/11/Residential-Painting.png"
    ["height"]=>
    string(3) "103"
    ["width"]=>
    string(3) "127"
    ["thumb"]=>
    string(87) "http://colourpainters.belocal.today/wp-content/uploads/2018/11/Residential-Painting.png"
  }
*/
?>
		<?php 
		/*
		* action_after_iservices hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_iservices', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_iservices', $page_details  ); ?>
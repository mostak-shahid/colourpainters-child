<?php 
global $mosacademy_options;
$animation = $mosacademy_options['sections-pservices-animation'];
$animation_delay = ( $mosacademy_options['sections-pservices-animation-delay'] ) ? $mosacademy_options['sections-pservices-animation-delay'] : 0;
$title = $mosacademy_options['sections-pservices-title'];
$content = $mosacademy_options['sections-pservices-content'];
$slides = $mosacademy_options['sections-pservices-slides'];


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_pservices', $page_details ); 
?>
<section id="section-pservices" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_pservices hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_pservices', $page_details ); 
		?>
		<div class="row">
			<div class="col-md-5">
				<div class="wrapper">
				<?php if ($title) : ?>				
					<div class="title-wrapper">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>	
				</div>			
			</div>
			<div class="col-md-7">
				<?php if (@$slides) : ?>
					<div class="row">
						<?php foreach ($slides as $slide) : ?>
							<div class="col-md-6">
								<div class="pservices-unit">
									<?php if ($slide['attachment_id']): ?>										
									<img class="img-responsive img-pservices" src="<?php echo aq_resize( wp_get_attachment_url( $slide['attachment_id'] ), 432, 245, true ) ?>" alt="<?php echo $alt_tag['inner'] . $slide['title'] ?>">
									<?php endif ?>
									<div class="con"><h3 class="title-pservices"><?php echo $slide['title']; ?></h3></div>
									<a href="<?php echo do_shortcode( $slide['url'] )?>" class="hidden-link">View</a>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				<?php endif ?>		
			</div>
		</div>

		<?php 
		/*
		* action_after_pservices hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_pservices', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_pservices', $page_details  ); ?>
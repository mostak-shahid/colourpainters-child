<?php 
global $mosacademy_options;
$animation = $mosacademy_options['sections-ohours-animation'];
$animation_delay = ( $mosacademy_options['sections-ohours-animation-delay'] ) ? $mosacademy_options['sections-ohours-animation-delay'] : 0;
$title = $mosacademy_options['sections-ohours-title'];
$content = $mosacademy_options['sections-ohours-content'];
$media = $mosacademy_options['sections-ohours-media'];


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_ohours', $page_details ); 
?>
<section id="section-ohours" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_ohours hook
		* @hooked start_container 10 (output .container)
		*/
		do_action( 'action_before_ohours', $page_details ); 
		?>
		<div class="flex-container">
			<div class="media-part"><img src="<?php echo wp_get_attachment_url( $media['id'] ) ?>" alt="<?php echo $alt_tag['inner'] . do_shortcode( $title )?>"></div>
			<div class="content-part">
				<?php if ($title) : ?>				
					<div class="title-wrapper">
						<h2 class="title"><?php echo do_shortcode( $title ); ?></h2>				
					</div>
				<?php endif; ?>
				<?php if ($content) : ?>				
					<div class="content-wrapper"><?php echo do_shortcode( $content ) ?></div>
				<?php endif; ?>
				<?php echo do_shortcode( '[hours]' ) ?>

				
			</div>
		</div>
		<?php 
		/*
		* action_after_ohours hook
		* @hooked end_div 10 
		*/
		do_action( 'action_after_ohours', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_ohours', $page_details  ); ?>
<?php 
global $mosacademy_options;



include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'mos-image-alt/mos-image-alt.php' ) ) {
	$alt_tag = mos_alt_generator(get_the_ID());
} 
$page_details = array( 'id' => get_the_ID(), 'template_file' => basename( get_page_template() ));
do_action( 'action_avobe_cwidgets', $page_details ); 
?>
<section id="section-cwidgets" <?php if ($animation) echo 'data-wow-delay="'.$animation_delay.'s" class="wow '.$animation.'"' ?>>
	<div class="content-wrap">
		
		<?php 
		/*
		* action_before_cwidgets hook
		*/
		do_action( 'action_before_cwidgets', $page_details ); 
		?>
		<div class="flex-container">
				<div class="map-part" style="background-image: url(<?php echo wp_get_attachment_url($mosacademy_options['contact-address'][0]['attachment_id']) ?>);">
					<a href="<?php echo $mosacademy_options['contact-address'][0]['map_link'] ?>" class="btn btn-map" target='_blank'>View Map</a>
				</div>
				<div class="content-part">
					<?php if ( is_active_sidebar( 'custom_widgets_1' ) ) : ?>
					    <div class="custom_widgets_1"><?php dynamic_sidebar( 'custom_widgets_1' ); ?></div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'custom_widgets_2' ) ) : ?>
					    <div class="custom_widgets_2"><?php dynamic_sidebar( 'custom_widgets_2' ); ?></div>
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'custom_widgets_3' ) ) : ?>
					    <div class="custom_widgets_3"><?php dynamic_sidebar( 'custom_widgets_3' ); ?></div>
					<?php endif; ?>
				</div>
			</div>	
		<?php 
		/*
		* action_after_cwidgets hook
		*/
		do_action( 'action_after_cwidgets', $page_details ); 
		?>	
	</div>
</section>
<?php do_action( 'action_below_cwidgets', $page_details  ); ?>
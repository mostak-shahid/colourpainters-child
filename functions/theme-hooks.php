<?php
add_action( 'action_after_small_logo', 'get_a_quote_fnc', 10, 1 );
function get_a_quote_fnc ($page_details) {
   ?>
   <div class="text-center"><a href="<?php echo do_shortcode( '[home_url]' ) . '/contact-us/'; ?>" class="btn btn-quote-sm">GET A QUOTE</a></div>
   <?php 
}
add_action( 'action_after_banner', 'custom_menu', 10, 1 );
add_action( 'action_below_title', 'custom_menu', 15, 1 );
function custom_menu () {
    ?>
    <section id="section-menu" class="visible-md visible-lg">
    	<div class="sticky_menu">
	        <div class="container-fluid">
	            <div class="row">
	                <div class="col-md-10 col-md-offset-1">
	                    <div class="pull-left"><?php echo do_shortcode( "[mosmenu container='nav' container_class='mosmenu' menu_class='mos-menu' location='mainmenu']" ) ?></div>
	                    <div class="pull-right"><?php echo do_shortcode( "[phone index=1]" ) ?></div>
	                    
	                </div>
	            </div>
	        </div>
        </div>
    </section>
    <?php
}
add_action( 'action_below_title', 'custom_title', 20, 1 );
function custom_title ($page_details) {
    global $mosacademy_options;
    //var_dump($page_details);
    ?>
    <div class="text-center custom-title">
        <span>
            <?php 
            if (is_home()) 
                _e($mosacademy_options['blog-archive-title']);
            elseif (is_single()) {
                if($mosacademy_options['single-blog-title-option'] == 2 AND $mosacademy_options['single-blog-title'])
                    echo $mosacademy_options['single-blog-title'];
                else the_title();
            }
            elseif (is_404()) {                    
                _e($mosacademy_options['404-page-title']);
            }
            elseif (is_search()){
                _e('Search reasult for ');
                echo get_search_query();
            }
            elseif (is_shop() OR is_product_category()){
                _e('Shop');
            }
            elseif(!$hide_title) the_title();
            ?>
        </span>
    </div>
    <?php
}

add_action( 'action_testimonial_page', 'action_testimonial_page_fnc' );
function action_testimonial_page_fnc ($page_details) {
    $args = array(
        'post_type' => 'testimonial'
    );
    $query = new WP_Query( $args );
    $each_col = round( $query->post_count / 2 );
    $n = 1;   

    if ( $query->have_posts() ) :
        echo '<div class="testimonial-page-con"><div class="row"><div class="col-md-6">';
        while ( $query->have_posts() ) : $query->the_post();
            $designation = get_post_meta( get_the_ID(), '_mos_testimonial_designation', true );
            echo '<div class="wrapper">';
            echo '<h3 class="testimonial-header">' . get_the_title();
            if ($designation) echo ', ' . $designation;
            echo '</h3>';
            echo '<div class="desc">' . get_the_content() . '</div>';
            echo '</div>';
            if ($n == $each_col) echo '</div><div class="col-md-6">';
            $n++;
        endwhile;
        echo '</div></div></div>';
        wp_reset_postdata();
    endif;    
}
add_action( 'init', 'child_text_layout_manager' );
function child_text_layout_manager () {
    global $mosacademy_options;
    //Painting Services
    if ($mosacademy_options['sections-pservices-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_pservices', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_pservices', 'start_row', 11, 1 );
        add_action( 'action_before_pservices', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_pservices', 'end_div', 10, 1 );
        add_action( 'action_after_pservices', 'end_div', 11, 1 );
        add_action( 'action_after_pservices', 'end_div', 12, 1 );   
    } elseif ($mosacademy_options['sections-pservices-text-layout'] == 'container-fliud') {
        add_action( 'action_before_pservices', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_pservices', 'end_div', 10, 1 );
    } elseif ($mosacademy_options['sections-pservices-text-layout'] == 'container-full') {
        add_action( 'action_before_pservices', 'start_full_width', 10, 1 );
        add_action( 'action_after_pservices', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_pservices', 'start_container', 10, 1 );
        add_action( 'action_after_pservices', 'end_div', 10, 1 );
    }
    //Industries We Serve
    if ($mosacademy_options['sections-iservices-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_iservices', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_iservices', 'start_row', 11, 1 );
        add_action( 'action_before_iservices', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_iservices', 'end_div', 10, 1 );
        add_action( 'action_after_iservices', 'end_div', 11, 1 );
        add_action( 'action_after_iservices', 'end_div', 12, 1 );   
    } elseif ($mosacademy_options['sections-iservices-text-layout'] == 'container-fliud') {
        add_action( 'action_before_iservices', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_iservices', 'end_div', 10, 1 );
    } elseif ($mosacademy_options['sections-iservices-text-layout'] == 'container-full') {
        add_action( 'action_before_iservices', 'start_full_width', 10, 1 );
        add_action( 'action_after_iservices', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_iservices', 'start_container', 10, 1 );
        add_action( 'action_after_iservices', 'end_div', 10, 1 );
    }
    //Testimonial Section
    if ($mosacademy_options['sections-testimonial-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_testimonial', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_testimonial', 'start_row', 11, 1 );
        add_action( 'action_before_testimonial', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 11, 1 );
        add_action( 'action_after_testimonial', 'end_div', 12, 1 );   
    } elseif ($mosacademy_options['sections-testimonial-text-layout'] == 'container-fliud') {
        add_action( 'action_before_testimonial', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
    } elseif ($mosacademy_options['sections-testimonial-text-layout'] == 'container-full') {
        add_action( 'action_before_testimonial', 'start_full_width', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_testimonial', 'start_container', 10, 1 );
        add_action( 'action_after_testimonial', 'end_div', 10, 1 );
    }
    //Opening Hours
    if ($mosacademy_options['sections-ohours-text-layout'] == 'container-fliud-spacing') {
        add_action( 'action_before_ohours', 'start_container_fluid', 10, 1 );
        add_action( 'action_before_ohours', 'start_row', 11, 1 );
        add_action( 'action_before_ohours', 'start_container_col_10', 12, 1 );

        add_action( 'action_after_ohours', 'end_div', 10, 1 );
        add_action( 'action_after_ohours', 'end_div', 11, 1 );
        add_action( 'action_after_ohours', 'end_div', 12, 1 );   
    } elseif ($mosacademy_options['sections-ohours-text-layout'] == 'container-fliud') {
        add_action( 'action_before_ohours', 'start_container_fluid', 10, 1 );
        add_action( 'action_after_ohours', 'end_div', 10, 1 );
    } elseif ($mosacademy_options['sections-ohours-text-layout'] == 'container-full') {
        add_action( 'action_before_ohours', 'start_full_width', 10, 1 );
        add_action( 'action_after_ohours', 'end_div', 10, 1 );
    } else {
        add_action( 'action_before_ohours', 'start_container', 10, 1 );
        add_action( 'action_after_ohours', 'end_div', 10, 1 );
    }

}
/*add_action( 'wp_head', 'remove_defvault_action' );
function remove_defvault_action(){
    
}*/



<?php
function moslatest_metaboxes() {
    global $project_array;
    $forms = get_formadable_form_list();
    $pages_id = get_all_pages_list_with_id ();
    $pages_link = get_all_pages_list_with_link ();
    $prefix = '_mosacademy_child_';
    $readmore_details = new_cmb2_box(array(
        'id' => $prefix.'readmore_details',
        'title' => __( 'Read More Details', 'cmb2' ),
        'object_types'  => array( 'project' ), // Post type 
    ));    
    $readmore_details->add_field(array(
        'name' => 'Read More Text',
        'desc' => '',
        'id'   => $prefix.'readmore_text',
        'type' => 'text',
    )); 
    $readmore_details->add_field(array(
        'name' => 'Read More URL',
        'desc' => '',
        'id'   => $prefix.'readmore_url',
        'type' => 'text_url',
    ));
    $readmore_details->add_field( array(
        'name'             => 'Read More URL Internal',
        'desc'             => 'This will get priority',
        'id'               => $prefix.'readmore_url_page',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'custom',
        'options'          => $pages_id,
    ) );

    $project_details = new_cmb2_box(array(
        'id' => $prefix.'project_details',
        'title' => __( 'Project Details', 'cmb2' ),
        'object_types'  => array( 'project' ), // Post type 
    )); 

    $project_details->add_field( array(
        'name' => 'Project key points',
        'id'   => $prefix.'project_key_points',
        'type' => 'text',
        'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) ); 
    $project_details->add_field( array(
        'name' => 'Project For',
        'id'   => $prefix.'project_key_for',
        'type'             => 'select',
        'show_option_none' => true,
        'default'          => 'buy',
        'options'          => $project_array['for'],
    ) );    
    $project_details->add_field( array(
        'name' => 'Project Location',
        'id'   => $prefix.'project_key_location',
        'type' => 'text',
    ) );
    $project_details->add_field( array(
        'name' => 'Project Property Type',
        'id'   => $prefix.'project_key_property_type',
        'type'             => 'select',
        'show_option_none' => true,
        'options'          => $project_array['property_type'],
    ) );

    $project_details->add_field( array(
        'name' => 'Project Area',
        'id'   => $prefix.'project_key_area',
        'description' => __( 'In FT unit', 'cmb2' ),
        'type' => 'text',
    ) );
    $project_details->add_field( array(
        'name' => 'Project Bed Rooms',
        'id'   => $prefix.'project_key_bed',
        'type' => 'text',
    ) ); 
    $project_details->add_field( array(
        'name' => 'Project Toilets',
        'id'   => $prefix.'project_key_toilets',
        'type' => 'text',
    ) ); 
    $project_details->add_field( array(
        'name' => 'Project Car Parking',
        'id'   => $prefix.'project_key_car_parking',
        'type' => 'text',
    ) ); 
    $project_details->add_field( array(
        'name' => 'Project Price',
        'id'   => $prefix.'project_key_price',
        'type' => 'text',
    ) ); 
    /*$project_field_id = $project_details->add_field( array(
        'id'          => 'wiki_test_repeat_group',
        'type'        => 'group',
        'description' => __( 'Generates reusable form entries', 'cmb2' ),
        'options'     => array(
            'group_title'   => __( 'Entry {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
            'add_button'    => __( 'Add Another Entry', 'cmb2' ),
            'remove_button' => __( 'Remove Entry', 'cmb2' ),
            'sortable'      => true, // beta
            // 'closed'     => true, // true to have the groups closed by default
        ),
    ) );
    $project_details->add_group_field( $project_field_id, array(
        'name' => 'Entry Title',
        'id'   => 'title',
        'type' => 'text',
        'repeatable' => true, // Repeatable fields are supported w/in repeatable groups (for most types)
    ) );  
    $project_details->add_group_field( $project_field_id, array(
        'name' => 'Description',
        'description' => 'Write a short description for this entry',
        'id'   => 'description',
        'type' => 'textarea_small',
    ) ); */ 
}
add_action('cmb2_admin_init', 'moslatest_metaboxes');
<?php
function add_dumketo_theme_functions($sections){
    global $container_list, $animations, $section_list, $bootstrap_grids, $col_ratio;
    $page_sections = array_diff($section_list,array('banner' => 'Banner Section', 'welcome' => 'Welcome Section'));

    // $sections[] = array(
    //     'title'            => __( 'Child theme', 'redux-framework-demo' ),
    //     'id'               => 'child-theme',
    //     'desc'             => '',
    //     'customizer_width' => '400px',
    //     'icon'             => 'el el-move'
    // );

    //Painting Services Section
    $sections[] = array(
        'title'            => __( 'Painting Services Section', 'redux-framework-demo' ),
        'id'               => 'sections-pservices',
        'subsection'       => true,
        'desc'             => '',
        'customizer_width' => '450px',
        'icon'             => 'el el-move',
        'fields'     => array(
            array(
                'id'       => 'sections-pservices-text-layout',
                'type'     => 'radio',
                'title'    => __( 'Inner Content Width', 'redux-framework-demo' ),
                'options'  => $container_list,
                'default'  => 'container'
            ),
            array(
                'id'             => 'sections-pservices-padding',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-pservices .content-wrap' ),
                'title'          => __( 'Section Padding', 'redux-framework-demo' ),
            ),  
            array(
                'id'             => 'sections-pservices-margin',
                'type'           => 'spacing',
                'mode'           => 'margin',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-pservices .content-wrap' ),
                'title'          => __( 'Section Margin', 'redux-framework-demo' ),
            ),        
            array(
                'id'       => 'sections-pservices-border',
                'type'     => 'border',
                'title'    => __( 'Painting Services Section Border', 'redux-framework-demo' ),
                'output'   => array( '#section-pservices .content-wrap' ),
                'all'      => false,
            ),
            array(
                'id'       => 'sections-pservices-animation',
                'type'     => 'select',
                'title'    => __( 'Animation Style for this section', 'redux-framework-demo' ),
                'options'  => $animations,
                'validate' => 'no_html',
            ),
            array(
                'id'       => 'sections-pservices-animation-delay',
                'type'     => 'text',
                'title'    => __( 'Animation Delay for this section', 'redux-framework-demo' ),
                'subtitle' => __( 'This must be numeric.', 'redux-framework-demo' ),
                'desc'     => __( 'Unit will be second.', 'redux-framework-demo' ),
                'validate' => 'numeric',
                'default'  => '0',
            ),
            array(
                'id'       => 'sections-pservices-title',
                'type'     => 'text',
                'title'    => __( 'Painting Services Section Title', 'redux-framework-demo' ),
                'desc'     => 'You can use span tag ( &lt;span&gt;&lt;/span&gt;, &lt;strong&gt;&lt;/strong&gt;, &lt;em&gt;&lt;/em&gt;, &lt;br /&gt;) here.',
                'validate'     => 'html_custom',
                'allowed_html' => array(
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),
                    
                    'span' => array(
                        'id' => array(),
                        'class' => array()
                    )
                )
            ),
            array(
                'id'      => 'sections-pservices-content',
                'type'    => 'editor',
                'title'   => __( 'Section Content', 'redux-framework-demo' ),
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => false,
                    //'tinymce' => array(),
                    //'quicktags'     => false,
                )
            ),
            array(
                'id'          => 'sections-pservices-slides',
                'type'        => 'slides',
                'title'       => __( 'Service Images', 'redux-framework-demo' ),               
                'show' => array(
                    'title' => true,
                    'description' => false,
                    'url' => true              // <<========= that is what was asked at the top.
                ),
                'placeholder' => array(
                    'title'       => __( 'This is a title', 'redux-framework-demo' ),
                    'description' => __( 'Description Here', 'redux-framework-demo' ),
                    'url'         => __( 'Give us a link!', 'redux-framework-demo' ),
                ),
            ),

            array(
                'id'       => 'sections-pservices-background-type',
                'type'     => 'button_set',
                'title'    => __( 'Painting Services Background Type', 'redux-framework-demo' ),
                'options'  => array(
                    '1' => 'Gradient',
                    '2' => 'Solid Color/Image',
                    '3' => 'RGBA Color'
                ),
                'default'  => '2',
            ),

            array(
                'id'     => 'sections-pservices-background-start',
                'type'   => 'section',
                'indent' => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'sections-pservices-background-gradient',
                'type'     => 'color_gradient',
                'title'    => __( 'Painting Services Section Background', 'redux-framework-demo' ),
                'validate' => 'color',              
                'required' => array( 'sections-pservices-background-type', '=', '1' ),
            ),
            array(
                'id'       => 'sections-pservices-background-solid',
                'type'     => 'background',                
                'title'    => __( 'Painting Services Section Background', 'redux-framework-demo' ),
                'required' => array( 'sections-pservices-background-type', '=', '2' ),
            ),
            array(
                'id'       => 'sections-pservices-background-rgba',
                'type'     => 'color_rgba',
                'title'    => __( 'Painting Services Section Background', 'redux-framework-demo' ),
                'validate' => 'colorrgba',
                'required' => array( 'sections-pservices-background-type', '=', '3' ),
            ),
            array(
                'id'     => 'sections-pservices-background-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),
        )
    ); 

    //Industries We Serve
    $sections[] = array(
        'title'            => __( 'Industries We Serve', 'redux-framework-demo' ),
        'id'               => 'sections-iservices',
        'subsection'       => true,
        'desc'             => '',
        'customizer_width' => '450px',
        'icon'             => 'el el-move',
        'fields'     => array(
            array(
                'id'       => 'sections-iservices-text-layout',
                'type'     => 'radio',
                'title'    => __( 'Inner Content Width', 'redux-framework-demo' ),
                'options'  => $container_list,
                'default'  => 'container'
            ),
            array(
                'id'             => 'sections-iservices-padding',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-iservices .content-wrap' ),
                'title'          => __( 'Section Padding', 'redux-framework-demo' ),
            ),  
            array(
                'id'             => 'sections-iservices-margin',
                'type'           => 'spacing',
                'mode'           => 'margin',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-iservices .content-wrap' ),
                'title'          => __( 'Section Margin', 'redux-framework-demo' ),
            ),        
            array(
                'id'       => 'sections-iservices-border',
                'type'     => 'border',
                'title'    => __( 'Industries We Serve Border', 'redux-framework-demo' ),
                'output'   => array( '#section-iservices .content-wrap' ),
                'all'      => false,
            ),
            array(
                'id'       => 'sections-iservices-animation',
                'type'     => 'select',
                'title'    => __( 'Animation Style for this section', 'redux-framework-demo' ),
                'options'  => $animations,
                'validate' => 'no_html',
            ),
            array(
                'id'       => 'sections-iservices-animation-delay',
                'type'     => 'text',
                'title'    => __( 'Animation Delay for this section', 'redux-framework-demo' ),
                'subtitle' => __( 'This must be numeric.', 'redux-framework-demo' ),
                'desc'     => __( 'Unit will be second.', 'redux-framework-demo' ),
                'validate' => 'numeric',
                'default'  => '0',
            ),
            array(
                'id'       => 'sections-iservices-title',
                'type'     => 'text',
                'title'    => __( 'Industries We Serve Title', 'redux-framework-demo' ),
                'desc'     => 'You can use span tag ( &lt;span&gt;&lt;/span&gt;, &lt;strong&gt;&lt;/strong&gt;, &lt;em&gt;&lt;/em&gt;, &lt;br /&gt;) here.',
                'validate'     => 'html_custom',
                'allowed_html' => array(
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),
                    
                    'span' => array(
                        'id' => array(),
                        'class' => array()
                    )
                )
            ),
            array(
                'id'      => 'sections-iservices-content',
                'type'    => 'editor',
                'title'   => __( 'Section Content', 'redux-framework-demo' ),
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => false,
                    //'tinymce' => array(),
                    //'quicktags'     => false,
                )
            ),
            array(
                'id'          => 'sections-iservices-slides',
                'type'        => 'slides',
                'title'       => __( 'Service Images', 'redux-framework-demo' ),               
                'show' => array(
                    'title' => true,
                    'description' => false,
                    'url' => true              // <<========= that is what was asked at the top.
                ),
                'placeholder' => array(
                    'title'       => __( 'This is a title', 'redux-framework-demo' ),
                    'description' => __( 'Description Here', 'redux-framework-demo' ),
                    'url'         => __( 'Give us a link!', 'redux-framework-demo' ),
                ),
            ),

            array(
                'id'       => 'sections-iservices-background-type',
                'type'     => 'button_set',
                'title'    => __( 'Painting Services Background Type', 'redux-framework-demo' ),
                'options'  => array(
                    '1' => 'Gradient',
                    '2' => 'Solid Color/Image',
                    '3' => 'RGBA Color'
                ),
                'default'  => '2',
            ),

            array(
                'id'     => 'sections-iservices-background-start',
                'type'   => 'section',
                'indent' => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'sections-iservices-background-gradient',
                'type'     => 'color_gradient',
                'title'    => __( 'Industries We Serve Background', 'redux-framework-demo' ),
                'validate' => 'color',              
                'required' => array( 'sections-iservices-background-type', '=', '1' ),
            ),
            array(
                'id'       => 'sections-iservices-background-solid',
                'type'     => 'background',                
                'title'    => __( 'Industries We Serve Background', 'redux-framework-demo' ),
                'required' => array( 'sections-iservices-background-type', '=', '2' ),
            ),
            array(
                'id'       => 'sections-iservices-background-rgba',
                'type'     => 'color_rgba',
                'title'    => __( 'Industries We Serve Background', 'redux-framework-demo' ),
                'validate' => 'colorrgba',
                'required' => array( 'sections-iservices-background-type', '=', '3' ),
            ),
            array(
                'id'     => 'sections-iservices-background-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),
        )
    ); 

    //Testimonial Section
    $sections[] = array(
        'title'            => __( 'Testimonial Section', 'redux-framework-demo' ),
        'id'               => 'sections-testimonial',
        'subsection'       => true,
        'desc'             => '',
        'customizer_width' => '450px',
        'icon'             => 'el el-move',
        'fields'     => array(
            array(
                'id'       => 'sections-testimonial-text-layout',
                'type'     => 'radio',
                'title'    => __( 'Inner Content Width', 'redux-framework-demo' ),
                'options'  => $container_list,
                'default'  => 'container'
            ),
            array(
                'id'             => 'sections-testimonial-padding',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-testimonial .content-wrap' ),
                'title'          => __( 'Section Padding', 'redux-framework-demo' ),
            ),  
            array(
                'id'             => 'sections-testimonial-margin',
                'type'           => 'spacing',
                'mode'           => 'margin',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-testimonial .content-wrap' ),
                'title'          => __( 'Section Margin', 'redux-framework-demo' ),
            ),        
            array(
                'id'       => 'sections-testimonial-border',
                'type'     => 'border',
                'title'    => __( 'Section Border', 'redux-framework-demo' ),
                'output'   => array( '#section-testimonial .content-wrap' ),
                'all'      => false,
            ),
            array(
                'id'       => 'sections-testimonial-animation',
                'type'     => 'select',
                'title'    => __( 'Animation Style for this section', 'redux-framework-demo' ),
                'options'  => $animations,
                'validate' => 'no_html',
            ),
            array(
                'id'       => 'sections-testimonial-animation-delay',
                'type'     => 'text',
                'title'    => __( 'Animation Delay for this section', 'redux-framework-demo' ),
                'subtitle' => __( 'This must be numeric.', 'redux-framework-demo' ),
                'desc'     => __( 'Unit will be second.', 'redux-framework-demo' ),
                'validate' => 'numeric',
                'default'  => '0',
            ),
            array(
                'id'       => 'sections-testimonial-title',
                'type'     => 'text',
                'title'    => __( 'Section Title', 'redux-framework-demo' ),
                'desc'     => 'You can use span tag ( &lt;span&gt;&lt;/span&gt;, &lt;strong&gt;&lt;/strong&gt;, &lt;em&gt;&lt;/em&gt;, &lt;br /&gt;) here.',
                'validate'     => 'html_custom',
                'allowed_html' => array(
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),
                    
                    'span' => array(
                        'id' => array(),
                        'class' => array()
                    )
                )
            ),
            array(
                'id'      => 'sections-testimonial-content',
                'type'    => 'editor',
                'title'   => __( 'Section Content', 'redux-framework-demo' ),
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => false,
                    //'tinymce' => array(),
                    //'quicktags'     => false,
                )
            ),
            array(
                'id'       => 'sections-testimonial-media',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Section image', 'redux-framework-demo' ),
                'compiler' => 'true',
            ),

            array(
                'id'       => 'sections-testimonial-background-type',
                'type'     => 'button_set',
                'title'    => __( 'Painting Services Background Type', 'redux-framework-demo' ),
                'options'  => array(
                    '1' => 'Gradient',
                    '2' => 'Solid Color/Image',
                    '3' => 'RGBA Color'
                ),
                'default'  => '2',
            ),

            array(
                'id'     => 'sections-testimonial-background-start',
                'type'   => 'section',
                'indent' => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'sections-testimonial-background-gradient',
                'type'     => 'color_gradient',
                'title'    => __( 'Section Background', 'redux-framework-demo' ),
                'validate' => 'color',              
                'required' => array( 'sections-testimonial-background-type', '=', '1' ),
            ),
            array(
                'id'       => 'sections-testimonial-background-solid',
                'type'     => 'background',                
                'title'    => __( 'Section Background', 'redux-framework-demo' ),
                'required' => array( 'sections-testimonial-background-type', '=', '2' ),
            ),
            array(
                'id'       => 'sections-testimonial-background-rgba',
                'type'     => 'color_rgba',
                'title'    => __( 'Section Background', 'redux-framework-demo' ),
                'validate' => 'colorrgba',
                'required' => array( 'sections-testimonial-background-type', '=', '3' ),
            ),
            array(
                'id'     => 'sections-testimonial-background-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),
        )
    );

    //Opening Hours
    $sections[] = array(
        'title'            => __( 'Opening Hours', 'redux-framework-demo' ),
        'id'               => 'sections-ohours',
        'subsection'       => true,
        'desc'             => '',
        'customizer_width' => '450px',
        'icon'             => 'el el-move',
        'fields'     => array(
            array(
                'id'       => 'sections-ohours-text-layout',
                'type'     => 'radio',
                'title'    => __( 'Inner Content Width', 'redux-framework-demo' ),
                'options'  => $container_list,
                'default'  => 'container'
            ),
            array(
                'id'             => 'sections-ohours-padding',
                'type'           => 'spacing',
                'mode'           => 'padding',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-ohours .content-wrap' ),
                'title'          => __( 'Section Padding', 'redux-framework-demo' ),
            ),  
            array(
                'id'             => 'sections-ohours-margin',
                'type'           => 'spacing',
                'mode'           => 'margin',
                'all'            => false,
                'units'          => array( 'em', 'px', '%', 'vw', 'vh' ),
                'units_extended' => 'true',
                'output'         => array( '#section-ohours .content-wrap' ),
                'title'          => __( 'Section Margin', 'redux-framework-demo' ),
            ),        
            array(
                'id'       => 'sections-ohours-border',
                'type'     => 'border',
                'title'    => __( 'Section Border', 'redux-framework-demo' ),
                'output'   => array( '#section-ohours .content-wrap' ),
                'all'      => false,
            ),
            array(
                'id'       => 'sections-ohours-animation',
                'type'     => 'select',
                'title'    => __( 'Animation Style for this section', 'redux-framework-demo' ),
                'options'  => $animations,
                'validate' => 'no_html',
            ),
            array(
                'id'       => 'sections-ohours-animation-delay',
                'type'     => 'text',
                'title'    => __( 'Animation Delay for this section', 'redux-framework-demo' ),
                'subtitle' => __( 'This must be numeric.', 'redux-framework-demo' ),
                'desc'     => __( 'Unit will be second.', 'redux-framework-demo' ),
                'validate' => 'numeric',
                'default'  => '0',
            ),
            array(
                'id'       => 'sections-ohours-title',
                'type'     => 'text',
                'title'    => __( 'Section Title', 'redux-framework-demo' ),
                'desc'     => 'You can use span tag ( &lt;span&gt;&lt;/span&gt;, &lt;strong&gt;&lt;/strong&gt;, &lt;em&gt;&lt;/em&gt;, &lt;br /&gt;) here.',
                'validate'     => 'html_custom',
                'allowed_html' => array(
                    'br'     => array(),
                    'em'     => array(),
                    'strong' => array(),
                    
                    'span' => array(
                        'id' => array(),
                        'class' => array()
                    )
                )
            ),
            array(
                'id'      => 'sections-ohours-content',
                'type'    => 'editor',
                'title'   => __( 'Section Content', 'redux-framework-demo' ),
                'args'    => array(
                    'wpautop'       => false,
                    'media_buttons' => false,
                    'textarea_rows' => 5,
                    //'tabindex' => 1,
                    //'editor_css' => '',
                    'teeny'         => false,
                    //'tinymce' => array(),
                    //'quicktags'     => false,
                )
            ),
            array(
                'id'       => 'sections-ohours-media',
                'type'     => 'media',
                'url'      => true,
                'title'    => __( 'Section image', 'redux-framework-demo' ),
                'compiler' => 'true',
            ),

            array(
                'id'       => 'sections-ohours-background-type',
                'type'     => 'button_set',
                'title'    => __( 'Painting Services Background Type', 'redux-framework-demo' ),
                'options'  => array(
                    '1' => 'Gradient',
                    '2' => 'Solid Color/Image',
                    '3' => 'RGBA Color'
                ),
                'default'  => '2',
            ),

            array(
                'id'     => 'sections-ohours-background-start',
                'type'   => 'section',
                'indent' => true, // Indent all options below until the next 'section' option is set.
            ),
            array(
                'id'       => 'sections-ohours-background-gradient',
                'type'     => 'color_gradient',
                'title'    => __( 'Section Background', 'redux-framework-demo' ),
                'validate' => 'color',              
                'required' => array( 'sections-ohours-background-type', '=', '1' ),
            ),
            array(
                'id'       => 'sections-ohours-background-solid',
                'type'     => 'background',                
                'title'    => __( 'Section Background', 'redux-framework-demo' ),
                'required' => array( 'sections-ohours-background-type', '=', '2' ),
            ),
            array(
                'id'       => 'sections-ohours-background-rgba',
                'type'     => 'color_rgba',
                'title'    => __( 'Section Background', 'redux-framework-demo' ),
                'validate' => 'colorrgba',
                'required' => array( 'sections-ohours-background-type', '=', '3' ),
            ),
            array(
                'id'     => 'sections-ohours-background-end',
                'type'   => 'section',
                'indent' => false, // Indent all options below until the next 'section' option is set.
            ),
        )
    ); 
    return $sections;
}
add_filter("redux/options/mosacademy_options/sections", 'add_dumketo_theme_functions');
<?php
/**
* Plugin Name: Preschool Registration
* Description: A custom plugin for preschool registration.
* Version: 1.0
* Author: Khris Marcial
*/

function create_post_type() {
    register_post_type( 'preschool-reg', // Preschool-registration is too long of a string
        array(
            'labels' => array(
                'name' => __( 'Preschool Registration' ),
                'singular_name' => __( 'Preschool' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'preschool-reg'),
            'show_in_rest' => true,
            'supports' => array( 'title')
        )
    );
}
add_action( 'init', 'create_post_type' );

function psr_register_meta_boxes( $meta_boxes ) {
    $prefix = 'psr-'; // Used for meta key?
    $meta_boxes[] = array(
        'id'         => 'preschool_details',
        'title'      => __( 'Preschool Details', 'textdomain' ),
        'post_types' => array( 'preschool-reg' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => __( 'Name of preschool', 'textdomain' ),
                'desc'  => __( 'Name of the preschool', 'textdomain' ),
                'id'    => $prefix . 'preschool_name',
                'type'  => 'text',
            ),
            array(
                'name'  => __( 'Address', 'textdomain' ),
                'desc'  => __( 'Address of the preschool', 'textdomain' ),
                'id'    => $prefix . 'preschool_address',
                'type'  => 'textarea',
            ),
            array(
                'name'  => __( 'Open Registration', 'textdomain' ),
                'desc'  => __( 'Is the location accepting registrations? Y/N', 'textdomain' ),
                'id'    => $prefix . 'is_accepting',
                'type'  => 'radio',
                'options' => array(
                    'Y' => __( 'Yes', 'textdomain' ),
                    'N' => __( 'No', 'textdomain' ),
                ),
                'std'  => 'N', // Default value
            ),
            array(
                'id'       => $prefix . 'registration_start_date',
                'name'     => __( 'Registration Start Date', 'textdomain' ),
                'type'     => 'date',
            ),
            array(
                'id'       => $prefix . 'registration_end_date',
                'name'     => __( 'Registration End Date', 'textdomain' ),
                'type'     => 'date',
            ),
            array(
                'id'   => $prefix . 'registration_start_time',
                'name' => __( 'Beginning Registration Time', 'textdomain' ),
                'type' => 'time',
            ),
            array(
                'id'   => $prefix . 'registration_end_time',
                'name' => __( 'End Registration Time', 'textdomain' ),
                'type' => 'time',
            ),
        ),
    );
    
    
    return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'psr_register_meta_boxes' );

// Expose above fields in REST API
function register_prereg_meta_fields() {

    $meta_fields = array(
        'psr-preschool_name',
        'psr-preschool_address',
        'psr-is_accepting',
        'psr-registration_start_date',
        'psr-registration_end_date',
        'psr-registration_start_time',
        'psr-registration_end_time'
    );

    foreach ($meta_fields as $field) {
        register_rest_field(
            'preschool-reg',
            $field,
            array(
                'get_callback' => 'get_prereg_meta_field',
                'schema' => null,
            )
        );
    }
}

// Extend date time query param
add_action('rest_api_init', 'register_prereg_meta_fields');

function get_prereg_meta_field($object, $field_name, $request) {
    return get_post_meta($object['id'], $field_name, true);
}

function psr_modify_rest_query( $args, $request ) {
    $start_date = $request->get_param( 'registration_start_date' );
    $end_date = $request->get_param( 'registration_end_date' );
    $start_time = $request->get_param( 'registration_start_time' );
    $end_time = $request->get_param( 'registration_end_time' );

    if ( ! empty( $start_date ) && ! empty( $end_date ) && ! empty( $start_time ) && ! empty( $end_time ) ) {
        $args['meta_query'] = array(
            'relation' => 'AND',
            array(
                'relation' => 'AND',
                array(
                    'key'     => 'psr-registration_start_date',
                    'value'   => $start_date,
                    'compare' => '>=',
                    'type'    => 'DATE',
                ),
                array(
                    'key'     => 'psr-registration_end_date',
                    'value'   => $end_date,
                    'compare' => '<=',
                    'type'    => 'DATE',
                ),
            ),
            array(
                'relation' => 'OR',
                array(
                    'relation' => 'AND',
                    array(
                        'key'     => 'psr-registration_start_time',
                        'value'   => $start_time,
                        'compare' => '>=',
                        'type'    => 'TIME',
                    ),
                    array(
                        'key'     => 'psr-registration_end_time',
                        'value'   => $end_time,
                        'compare' => '<=',
                        'type'    => 'TIME',
                    ),
                ),
                array(
                    'relation' => 'AND',
                    array(
                        'key'     => 'psr-registration_start_time',
                        'value'   => $start_time,
                        'compare' => '<=',
                        'type'    => 'TIME',
                    ),
                    array(
                        'key'     => 'psr-registration_end_time',
                        'value'   => $end_time,
                        'compare' => '>=',
                        'type'    => 'TIME',
                    ),
                ),
            ),
        );
    }

    return $args;
}
add_filter( 'rest_preschool-reg_query', 'psr_modify_rest_query', 10, 2 );

?>
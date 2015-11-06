<?php if ( ! defined( 'ABSPATH' ) ) exit;

return apply_filters( 'ninja-forms-field-input-settings', array(

    /*
     * DEFAULT VALUE
     */

    'default' => array(
        'type'    => 'select',
        'label'   => __( 'Default to User Email (if logged-in)', Ninja_Forms::TEXTDOMAIN ),
        'options' => array(
            'none'         => __( 'None', Ninja_Forms::TEXTDOMAIN ),
            'post_id'      => __( 'Post / Page ID', Ninja_Forms::TEXTDOMAIN ),
            'post_title'   => __( 'Post / Page Title', Ninja_Forms::TEXTDOMAIN ),
            'post_url'     => __( 'Post / Page URL', Ninja_Forms::TEXTDOMAIN ),
            'query_string' => __( 'Query String Variable', Ninja_Forms::TEXTDOMAIN ),
            'custom'       => __( 'Custom Default Value', Ninja_Forms::TEXTDOMAIN ),
        ),
        'width' => 'one-half',
        'group' => 'primary'
    ),

));
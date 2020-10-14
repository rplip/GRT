<?php

if ( ! function_exists( 'grt_scripts' ) ) :

    function grt_scripts(){
        
        // Style.css
        wp_enqueue_style( 
            'grt-css',
            get_stylesheet_uri(), 
            array(), 
            '1.2'
        );

        // Déclarer un autre fichier CSS
        wp_enqueue_style( 
            'grt-BScss', 
            'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css',
            array(), 
            '4.5.2'
        );

        // Autre fichier CSS
        wp_enqueue_style( 
            'grt-MainCss', 
            get_template_directory_uri() . '/assets/css/main.css',
            array(), 
            '1.2'
        );

        //jQuery
        wp_enqueue_script( 
            'grt-jquery', 
            'https://code.jquery.com/jquery-3.5.1.js', 
            false, 
            '3.5.1', 
            true 
        );

        //Popper
        wp_enqueue_script( 
            'grt-popper', 
            'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', 
            false, 
            '1.14.7', 
            true 
        );

        //Bootstrap JS
        wp_enqueue_script( 
            'grt-bootstrapJS', 
            'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', 
            false, 
            '4.3.1', 
            true 
        );

        //isotope
        wp_enqueue_script( 
            'grt-isotope', 
            'https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js', 
            false, 
            '1.0', 
            true 
        );
        
        //JS
        wp_enqueue_script( 
            'grt-js', 
            get_template_directory_uri() . '/assets/js/app.js', 
            false, 
            '1.0', 
            true
        );
        
    }

endif;

function grt_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'grt' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Right sidebar', 'grt' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
    ) );

}

function mytheme_post_thumbnails() {
    add_theme_support( 'post-thumbnails' );
}

function contact_form_treatment() {
    if (isset($_POST['contact-form']) && isset($_POST['contact-verif']))  {

		if (wp_verify_nonce($_POST['contact-verif'], 'make-contact')) {

           
            $name = strip_tags(trim($_POST['name']));
            $email = $_POST['email'];
            $object = strip_tags(trim($_POST['object']));
            $message = strip_tags(trim($_POST['message']));

            if (strlen($name) < 2)
            {
                $url = add_query_arg('formError', 'shortName', wp_get_referer());
                wp_safe_redirect($url);
				exit();
            } 
            else if (strlen($name) > 64)
            {
                $url = add_query_arg('formError', 'longName', wp_get_referer());
				wp_safe_redirect($url);
				exit();
            }
            else if (strlen($object) < 2)
            {
                $url = add_query_arg('formError', 'shortObject', wp_get_referer());
                wp_safe_redirect($url);
				exit();
            }
            else if (strlen($object) > 128)
            {
                $url = add_query_arg('formError', 'longObject', wp_get_referer());
                wp_safe_redirect($url);
				exit();
            }
            else if (strlen($message) < 2)
            {
                $url = add_query_arg('formError', 'shortMessage', wp_get_referer());
                wp_safe_redirect($url);
				exit();
            }
            else if (!preg_match( " /^.+@.+\.[a-zA-Z]{2,}$/ " , $email ))
            {
                $url = add_query_arg('formError', 'email', wp_get_referer());
                wp_safe_redirect($url);
                exit();
            }

            else
            {
                global $wpdb;
                $wpdb->insert ('wp_contacts', array (
                    'name' => $name,
                    'email' => $email,
                    'object' => $object,
                    'message' => $message
                ));

                $url = add_query_arg('formError', 'none', 'http://extranetoko.fr/grtgaz-preprod/');
                wp_safe_redirect($url);
				exit();

            }

		}

	}
}

    add_action('template_redirect', 'contact_form_treatment');
    add_action( 'after_setup_theme', 'mytheme_post_thumbnails' );
    add_action( 'widgets_init', 'grt_widgets_init' );
    add_action( 'wp_enqueue_scripts', 'grt_scripts' );
    add_post_type_support( 'page', 'excerpt' );



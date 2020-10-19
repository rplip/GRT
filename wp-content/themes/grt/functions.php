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
            get_template_directory_uri() . '/assets/css/bootstrap.min.css',
            array(), 
            '4.5.2'
        );

        wp_enqueue_style(
            'grt-FA',
            'https://pro.fontawesome.com/releases/v5.10.0/css/all.css',
            array(),
            '5.10'
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
            $firstname = strip_tags(trim($_POST['firstname']));
            $position = strip_tags(trim($_POST['position']));
            $email = $_POST['email'];
            $object = strip_tags(trim($_POST['object']));
            $premessage = strip_tags(trim($_POST['message']));
            $message = str_replace(CHR(13).CHR(10)," ",$premessage); 

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
            else if (strlen($firstname) < 2)
            {
                $url = add_query_arg('formError', 'shortFirstname', wp_get_referer());
                wp_safe_redirect($url);
				exit();
            } 
            else if (strlen($firstname) > 64)
            {
                $url = add_query_arg('formError', 'longFirstname', wp_get_referer());
				wp_safe_redirect($url);
				exit();
            }
            else if (strlen($position) < 2)
            {
                $url = add_query_arg('formError', 'shortPosition', wp_get_referer());
                wp_safe_redirect($url);
				exit();
            } 
            else if (strlen($position) > 128)
            {
                $url = add_query_arg('formError', 'longPosition', wp_get_referer());
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
                    'firstname' => $firstname,
                    'position' => $position,
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


if ( is_admin()) {
    function my_admin_menu() {
		add_menu_page(
			__( 'Sample page', 'my-textdomain' ),
			__( 'Contacts', 'my-textdomain' ),
			'manage_options',
			'sample-page',
			'my_admin_page_contents',
			'dashicons-testimonial',
			6
		);
	}

    add_action( 'admin_menu', 'my_admin_menu' );

    function my_admin_page_contents() { 
          include 'assets/views/contact.php'; 
    }
        
    function register_my_plugin_scripts() {
    wp_register_style( 'my-plugin', plugins_url( '/admin-menu/plugin.css' ) );
    wp_register_style( 'my-plugin-bs-editable', plugins_url( '/admin-menu/bs_editable.css' ) );
    wp_register_style( 'my-plugin-bs-table', get_template_directory_uri() .'/assets/css/bstable.min.css' );
    wp_register_style( 'my-plugin-bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_register_style( 'my-plugin-fa', 'https://pro.fontawesome.com/releases/v5.10.0/css/all.css');
    wp_register_script( 'my-plugin', plugins_url( '/admin-menu/app.js' ) );
    }
    
    add_action( 'admin_enqueue_scripts', 'register_my_plugin_scripts' );
        
    function load_my_plugin_scripts( $hook ) {
        // Load only on ?page=sample-page
        if( $hook != 'toplevel_page_sample-page' ) {
        return;
        }
        // Load style & scripts.
        wp_enqueue_style( 'my-plugin' );
        wp_enqueue_style( 'my-plugin-bs-editable' );
        wp_enqueue_style( 'my-plugin-bs-table' );
        wp_enqueue_style( 'my-plugin-bootstrap' );
        wp_enqueue_style( 'my-plugin-fa' );
        wp_enqueue_script( 'my-plugin' );
    
    }
        
    add_action( 'admin_enqueue_scripts', 'load_my_plugin_scripts' );

        
}

    add_action('template_redirect', 'contact_form_treatment');
    add_action( 'after_setup_theme', 'mytheme_post_thumbnails' );
    add_action( 'widgets_init', 'grt_widgets_init' );
    add_action( 'wp_enqueue_scripts', 'grt_scripts' );
    add_post_type_support( 'page', 'excerpt' );





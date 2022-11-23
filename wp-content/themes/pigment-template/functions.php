<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: pigment.com | @pigment
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
    External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
    Theme Support
\*------------------------------------*/




/*
 *  Author: Todd Motto | @toddmotto
 *  URL: pigment.com | @pigment
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
    External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
    Theme Support
\*------------------------------------*/



if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');
}

/*------------------------------------*\
    Functions
\*------------------------------------*/

// pigment Blank navigation


// Load pigment Blank conditional scripts
function pigment_conditional_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
      $postID = get_the_ID();
        $posttype = get_post_type();


      wp_register_script('lazy', get_template_directory_uri() . '/js/lazy_load_cookies.js', '1.0.0'); // Custom scripts
      wp_enqueue_script('lazy'); // Enqueue it!

      wp_register_script('wow', get_template_directory_uri() . '/js/wow.min.js', '1.0.0'); // Custom scripts
      wp_enqueue_script('wow'); // Enqueue it!

      wp_register_script('basic', get_template_directory_uri() . '/js/basic.js', '1.0.0'); // Custom scripts
      wp_enqueue_script('basic'); // Enqueue it!
       
       wp_register_script('unitegallery-min', get_template_directory_uri() . '/js/unitegallery.min.js', '1.0.0'); // Custom scripts
       wp_register_script('unitegallery', get_template_directory_uri() . '/js/unitegallery.js', '1.0.0'); // Custom scripts
       wp_register_script('ug-theme', get_template_directory_uri() . '/js/ug-theme-tiles.js', '1.0.0'); // Custom scripts
       wp_register_script('gallery', get_template_directory_uri() . '/js/gallery.js', '1.0.0'); // Custom scripts
      
      
           
        if ( 'is_contact' ) {
            wp_register_script('home', get_template_directory_uri() . '/js/home.js', '1.0.0'); // Custom scripts
            wp_enqueue_script('home'); // Enqueue it! 
        }
        if ( 'is_faq' ) {
            wp_register_script('faq', get_template_directory_uri() . '/js/faq.js', '1.0.0'); // Custom scripts
            wp_enqueue_script('faq'); // Enqueue it! 
        }
        if ( 'is_gallery' ) {
            wp_enqueue_script('unitegallery'); // Enqueue it! 
            wp_enqueue_script('unitegallery-min'); // Enqueue it! 
            wp_enqueue_script('ug-theme'); // Enqueue it! 
            wp_enqueue_script('gallery'); // Enqueue it! 
          
        }
      switch($postID):
          case 2:
            //homepage
           
            // wp_register_script('splide', get_template_directory_uri() . '/js/splide-custom.js', '1.0.0'); // Custom scripts
            // wp_enqueue_script('splide'); // Enqueue it!
            // wp_register_script('lightgallery', get_template_directory_uri() . '/js/lightgallery.min.js', '1.0.0'); // Custom scripts
            // wp_enqueue_script('lightgallery'); // Enqueue it!
            // wp_register_script('contactForm', get_template_directory_uri() . '/js/contactForm.js', '1.0.0'); // Custom scripts
            // wp_enqueue_script('contactForm'); // Enqueue it!
          break;
         
         
      endswitch;
      switch ( $posttype ) :  
        
      
    endswitch;
    }

}

// Load pigment Blank styles
function pigment_styles()
{
    $postID = get_the_ID();
    $posttype = get_post_type();
    // wp_register_style('preloader', get_template_directory_uri() . '/css/loading.css', array(), '1.0', 'all');
    // wp_enqueue_style('preloader'); // Enqueue it!
    wp_register_style('basic', get_template_directory_uri() . '/css/basic.css', array(), '1.0', 'all');
    wp_enqueue_style('basic'); // Enqueue it!
    wp_register_style('home', get_template_directory_uri() . '/css/home.css', array(), '1.0', 'all');
    wp_register_style('offer', get_template_directory_uri() . '/css/offer.css', array(), '1.0', 'all');
    wp_register_style('prices', get_template_directory_uri() . '/css/prices.css', array(), '1.0', 'all');
    wp_register_style('contact', get_template_directory_uri() . '/css/contact.css', array(), '1.0', 'all');
    wp_register_style('aboutMe', get_template_directory_uri() . '/css/aboutMe.css', array(), '1.0', 'all');
    wp_register_style('gallery', get_template_directory_uri() . '/css/gallery.css', array(), '1.0', 'all');
    wp_register_style('unitegallery', get_template_directory_uri() . '/css/unite-gallery.css', array(), '1.0', 'all');
    wp_register_style('pomoc', get_template_directory_uri() . '/css/pomoc.css', array(), '1.0', 'all');
   
    if ( 'is_home' ) {
        wp_enqueue_style( 'home' );
    }
    if ( 'is_offer' ) {
        wp_enqueue_style( 'offer' );
    }
    if ( 'is_prices' ) {
        wp_enqueue_style( 'prices' );
    }
    if ( 'is_contact' ) {
        wp_enqueue_style( 'contact' );
    }
    if ( 'is_aboutMe' ) {
        wp_enqueue_style( 'aboutMe' );
    }
    if ( 'is_faq' ) {
        wp_enqueue_style( 'pomoc' );
    }
    if ( 'is_gallery' ) {
        wp_enqueue_style( 'gallery' );
        wp_enqueue_style( 'unitegallery' );
       
    }

}


// Register pigment Blank Navigation
function register_pigment_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'pigment'), // Main Navigation
        // 'sidebar-menu' => __('Sidebar Menu', 'pigment'), // Sidebar Navigation
        'footer' => __('Footer Menu', 'pigment'), // Extra Navigation if needed (duplicate as many as you need!)
       
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function pigment_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}





// Custom Comments Callback

/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions

add_action('wp_print_scripts', 'pigment_conditional_scripts'); // Add Conditional Page Scripts

add_action('wp_enqueue_scripts', 'pigment_styles'); // Add Theme Stylesheet
add_action('init', 'register_pigment_menu'); // Add pigment Blank Menu
add_action('init', 'create_post_type_uslugi');
add_action('init', 'create_post_type_offer');
add_action('init', 'create_post_type_price');
add_action('init', 'create_post_type_gallery');
add_action('init', 'create_post_type_faq');

add_theme_support( 'post-thumbnails', array('post', 'page','profile'));


// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)

add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'pigment_style_remove'); // Remove 'text/css' from enqueued stylesheet


// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('pigment_shortcode_demo', 'pigment_shortcode_demo'); // You can place [pigment_shortcode_demo] in Pages, Posts now.
add_shortcode('pigment_shortcode_demo_2', 'pigment_shortcode_demo_2'); // Place [pigment_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [pigment_shortcode_demo] [pigment_shortcode_demo_2] Here's the page title! [/pigment_shortcode_demo_2] [/pigment_shortcode_demo]

/*------------------------------------*\
    Custom Post Types
\*------------------------------------*/


// Create 1 Custom Post type for a Demo, called pigment-Blank
function create_post_type_uslugi()
{
    register_taxonomy_for_object_type('category', 'uslugi'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'uslugi');
    register_post_type('Uslugi', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Uslugi', 'uslugi_item'), // Rename these to suit
            'singular_name' => __('uslugi', 'uslugi_item'),
            'add_new' => __('Dodaj uslugi', 'uslugi_item'),
            'add_new_item' => __('Dodaj uslugi', 'uslugi_item'),
            'edit' => __('Edytuj', 'uslugi_item'),
            'edit_item' => __('Edit uslugi', 'uslugi_item'),
            'new_item' => __('Nowy uslugi', 'uslugi_item'),
            'view' => __('Zobacz uslugi', 'uslugi_item'),
            'view_item' => __('Zobacz uslugi', 'uslugi_item'),
            'search_items' => __('Szukaj uslugi', 'uslugi_item'),
            'not_found' => __('Nie znaleziono uslugi', 'uslugi_item'),
            'not_found_in_trash' => __('Nie znaleziono uslugi w koszu', 'uslugi_item')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'menu_icon' => '',
        'supports' => array(
            'title',
            'thumbnail'
        ), // Go to Dashboard Custom pigment Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}

function create_post_type_offer()
{
    register_taxonomy_for_object_type('category', 'oferta'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'oferta');
    register_post_type('oferta', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Oferta', 'oferta_item'), // Rename these to suit
            'singular_name' => __('oferta', 'oferta_item'),
            'add_new' => __('Dodaj ofertę', 'oferta_item'),
            'add_new_item' => __('Dodaj ofertę', 'oferta_item'),
            'edit' => __('Edytuj', 'oferta_item'),
            'edit_item' => __('Edit oferta', 'oferta_item'),
            'new_item' => __('Nowy oferta', 'oferta_item'),
            'view' => __('Zobacz ofertę', 'oferta_item'),
            'view_item' => __('Zobacz ofertę', 'oferta_item'),
            'search_items' => __('Szukaj oferty', 'oferta_item'),
            'not_found' => __('Nie znaleziono oferty', 'oferta_item'),
            'not_found_in_trash' => __('Nie znaleziono oferty w koszu', 'oferta_item')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'menu_icon' => '',
        'supports' => array(
            'title',
            'thumbnail'
        ), // Go to Dashboard Custom pigment Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}
function create_post_type_gallery()
{
    register_taxonomy_for_object_type('category', 'galeria'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'galeria');
    register_post_type('galeria', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Galeria', 'galeria_item'), // Rename these to suit
            'singular_name' => __('galeria', 'galeria_item'),
            'add_new' => __('Dodaj galerię', 'galeria_item'),
            'add_new_item' => __('Dodaj galerię', 'galeria_item'),
            'edit' => __('Edytuj', 'galeria_item'),
            'edit_item' => __('Edit galeria', 'galeria_item'),
            'new_item' => __('Nowa galeria', 'galeria_item'),
            'view' => __('Zobacz galerię', 'galeria_item'),
            'view_item' => __('Zobacz galerię', 'galeria_item'),
            'search_items' => __('Szukaj galerii', 'galeria_item'),
            'not_found' => __('Nie znaleziono galerii', 'galeria_item'),
            'not_found_in_trash' => __('Nie znaleziono galerii w koszu', 'galeria_item')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'menu_icon' => '',
        'supports' => array(
            'title',
            'thumbnail'
        ), // Go to Dashboard Custom pigment Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}
function create_post_type_faq()
{
    register_taxonomy_for_object_type('category', 'faq'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'faq');
    register_post_type('faq', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Faq', 'faq_item'), // Rename these to suit
            'singular_name' => __('faq', 'faq_item'),
            'add_new' => __('Dodaj faq', 'faq_item'),
            'add_new_item' => __('Dodaj faq', 'faq_item'),
            'edit' => __('Edytuj', 'faq_item'),
            'edit_item' => __('Edit faq', 'faq_item'),
            'new_item' => __('Nowy faq', 'faq_item'),
            'view' => __('Zobacz faq', 'faq_item'),
            'view_item' => __('Zobacz faq', 'faq_item'),
            'search_items' => __('Szukaj faq', 'faq_item'),
            'not_found' => __('Nie znaleziono faq', 'faq_item'),
            'not_found_in_trash' => __('Nie znaleziono faq w koszu', 'faq_item')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'menu_icon' => '',
        'supports' => array(
            'title',
            'thumbnail'
        ), // Go to Dashboard Custom pigment Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}
function create_post_type_price()
{
    register_taxonomy_for_object_type('category', 'cena'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'cena');
    register_post_type('cena', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Cena', 'cena_item'), // Rename these to suit
            'singular_name' => __('cena', 'cena_item'),
            'add_new' => __('Dodaj cenę', 'cena_item'),
            'add_new_item' => __('Dodaj cenę', 'cena_item'),
            'edit' => __('Edytuj', 'cena_item'),
            'edit_item' => __('Edit cena', 'cena_item'),
            'new_item' => __('Nowy cena', 'cena_item'),
            'view' => __('Zobacz cenę', 'cena_item'),
            'view_item' => __('Zobacz cenę', 'cena_item'),
            'search_items' => __('Szukaj ceny', 'cena_item'),
            'not_found' => __('Nie znaleziono ceny', 'cena_item'),
            'not_found_in_trash' => __('Nie znaleziono ceny w koszu', 'cena_item')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'menu_icon' => '',
        'supports' => array(
            'title',
            'thumbnail'
        ), // Go to Dashboard Custom pigment Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}
//add custom column
// function add_acf_columns ( $columns ) {
//    return array_merge ( $columns, array (
//      'active' => __ ( 'Aktywny' )
//    ) );
//  }
//  add_filter ( 'manage_kontakty_posts_columns', 'add_acf_columns' );
//
// function kontakty_custom_column ( $column, $post_id ) {
//   switch ( $column ) {
//     case 'active':
//       if(get_field('active', $post_id )==1){
//         $str = 'Tak';
//       }else{
//         $str = 'Nie';
//       }
//       echo $str;
//       break;
//   }
// }
// add_action ( 'manage_kontakty_posts_custom_column', 'kontakty_custom_column', 10, 2 );
//add custom column


/*------------------------------------*\
    ShortCode Functions
\*------------------------------------*/

//GET EXTRA FUNCTIONS
include( locate_template('functions/extra-functions.php', false, false ));

// flush_rewrite_rules();
?>





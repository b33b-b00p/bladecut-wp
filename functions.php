<?php
if (!defined('_S_VERSION')) {
   // Replace the version number of the theme on each release.
   define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bladecut_setup()
{
   /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on BladeCut, use a find and replace
		* to change 'bladecut' to the name of your theme in all the template files.
		*/
   load_theme_textdomain('bladecut', get_template_directory() . '/languages');

   // Add default posts and comments RSS feed links to head.
   add_theme_support('automatic-feed-links');

   /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
   add_theme_support('title-tag');

   /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
   add_theme_support('post-thumbnails');

   // This theme uses wp_nav_menu() in one location.
   register_nav_menus(
      array(
         'header'    => 'Шапка',    //Название месторасположения меню в шаблоне
         'footer' => 'Подвал'      //Название другого месторасположения меню в шаблоне
      )
   );

   /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
   add_theme_support(
      'html5',
      array(
         'search-form',
         'comment-form',
         'comment-list',
         'gallery',
         'caption',
         'style',
         'script',
      )
   );

   // Set up the WordPress core custom background feature.
   add_theme_support(
      'custom-background',
      apply_filters(
         'bladecut_custom_background_args',
         array(
            'default-color' => 'ffffff',
            'default-image' => '',
         )
      )
   );

   // Add theme support for selective refresh for widgets.
   add_theme_support('customize-selective-refresh-widgets');

   /**
    * Add support for core custom logo.
    *
    * @link https://codex.wordpress.org/Theme_Logo
    */
   add_theme_support(
      'custom-logo',
      array(
         'height'      => 250,
         'width'       => 250,
         'flex-width'  => true,
         'flex-height' => true,
      )
   );
}
add_action('after_setup_theme', 'bladecut_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bladecut_content_width()
{
   $GLOBALS['content_width'] = apply_filters('bladecut_content_width', 640);
}
add_action('after_setup_theme', 'bladecut_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bladecut_widgets_init()
{
   register_sidebar(
      array(
         'name'          => esc_html__('Sidebar', 'bladecut'),
         'id'            => 'sidebar-1',
         'description'   => esc_html__('Add widgets here.', 'bladecut'),
         'before_widget' => '<section id="%1$s" class="widget %2$s">',
         'after_widget'  => '</section>',
         'before_title'  => '<h2 class="widget-title">',
         'after_title'   => '</h2>',
      )
   );
}
add_action('widgets_init', 'bladecut_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function bladecut_scripts()
{
   wp_enqueue_style('bladecut-style', get_stylesheet_uri(), array(), _S_VERSION);
   wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Oswald:wght@600&display=swap', array(), _S_VERSION);
   wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css', array(), _S_VERSION);
   wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css', array(), _S_VERSION);
   wp_enqueue_style('animate', get_template_directory_uri() . '/lib/animate/animate.min.css', array(), _S_VERSION,);
   wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/lib/owlcarousel/assets/owl.carousel.min.css', array(), _S_VERSION,);
   wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), _S_VERSION,);
   wp_enqueue_style('bladecut-style-main', get_template_directory_uri() . '/css/style.css', array(), _S_VERSION);

   wp_deregister_script('jquery');
   wp_register_script('jquery', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), _S_VERSION, true);
   wp_enqueue_script('jquery');

   wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js', array(), _S_VERSION, true);
   wp_enqueue_script('wow', get_template_directory_uri() . '/lib/wow/wow.min.js', array(), _S_VERSION, true);
   wp_enqueue_script('easing', get_template_directory_uri() . '/lib/easing/easing.min.js', array(), _S_VERSION, true);
   wp_enqueue_script('waypoints', get_template_directory_uri() . '/lib/waypoints/waypoints.min.js', array(), _S_VERSION, true);
   wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/lib/owlcarousel/owl.carousel.min.js', array(), _S_VERSION, true);
   wp_enqueue_script('bladecut-style-main', get_template_directory_uri() . '/js/main.js', array(), _S_VERSION, true);
}
add_action('wp_enqueue_scripts', 'bladecut_scripts');

// adding custom pages for editing general settings, header and footer
if (function_exists('acf_add_options_page')) {

   acf_add_options_page(array(
      'page_title'    => 'Настройки темы',
      'menu_title'   => 'Настройки темы',
      'menu_slug'    => 'theme-general-settings',
      'capability'   => 'edit_posts',
      'redirect'      => false
   ));

   acf_add_options_sub_page(array(
      'page_title'    => 'Настройки header',
      'menu_title'   => 'Header',
      'parent_slug'   => 'theme-general-settings',
   ));

   acf_add_options_sub_page(array(
      'page_title'    => 'Настройки footer',
      'menu_title'   => 'Footer',
      'parent_slug'   => 'theme-general-settings',
   ));

   acf_add_options_sub_page(array(
      'page_title'    => 'Настройки страницы 404',
      'menu_title'   => '404',
      'parent_slug'   => 'theme-general-settings',
   ));
}

// Добавляем классы ссылкам
function custom_menu_link($atts, $item, $args)
{
   if ($args->theme_location == 'header') {
      $atts['class'] = 'nav-item nav-link';
   }
   if ($args->theme_location == 'footer') {
      $atts['class'] = 'btn btn-link';
   }

   return $atts;
}
add_filter('nav_menu_link_attributes', 'custom_menu_link', 10, 3);

// Создание шорткода
function schedule_shortcode($atts)
{
   require 'shortcodes/schedule.php';
}

add_shortcode('schedule', 'schedule_shortcode');

// Создание шорткода
function pricing_shortcode($atts)
{
   require 'shortcodes/pricing.php';
}

add_shortcode('pricing', 'pricing_shortcode');

// Создание шорткода
function testimonials_shortcode($atts)
{
   require 'shortcodes/testimonials.php';
}

add_shortcode('testimonials', 'testimonials_shortcode');

// Подключение функции хлебных крошек
require 'breadcrumbs-function.php';

// Создание шорткода
function breadcrumbs_shortcode($atts)
{
   require 'shortcodes/breadcrumbs.php';
}

add_shortcode('breadcrumbs', 'breadcrumbs_shortcode');

// Removing span ContactForm7
add_filter('wpcf7_form_elements', function ($content) {
   $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);

   $content = str_replace('<br />', '', $content);

   return $content;
});

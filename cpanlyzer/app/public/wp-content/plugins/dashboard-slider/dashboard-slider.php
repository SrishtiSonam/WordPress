<?php
/*
Plugin Name: Dashboard Slider
Description: Custom homepage hero slider
*/

// Create Custom Post Type
function ds_create_slider_cpt() {

    register_post_type('dashboard_slide', array(
        'labels' => array(
            'name' => 'Dashboard Slides',
            'singular_name' => 'Dashboard Slide'
        ),
        'public' => true,
        'menu_icon' => 'dashicons-images-alt2',
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true
    ));

}
add_action('init', 'ds_create_slider_cpt');

// Enqueue Swiper files (local)
function ds_slider_assets() {

    wp_enqueue_style('swiper-css', plugin_dir_url(__FILE__) . 'assets/swiper-bundle.min.css');
    wp_enqueue_script('swiper-js', plugin_dir_url(__FILE__) . 'assets/swiper-bundle.min.js', array(), null, true);

    wp_enqueue_script('dashboard-slider-js', plugin_dir_url(__FILE__) . 'slider.js', array('swiper-js'), null, true);

}
add_action('wp_enqueue_scripts', 'ds_slider_assets');


// Slider Shortcode
function ds_slider_shortcode() {

    $query = new WP_Query(array(
        'post_type' => 'dashboard_slide',
        'posts_per_page' => -1
    ));

    ob_start(); ?>

    <div class="swiper dashboard-swiper">
        <div class="swiper-wrapper">

            <?php while($query->have_posts()) : $query->the_post(); ?>

                <div class="swiper-slide">
                    <div class="ds-slide" style="background-image:url('<?php echo get_the_post_thumbnail_url(null, 'full'); ?>')">
                        <div class="ds-content">
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_content(); ?></p>
                        </div>
                    </div>
                </div>

            <?php endwhile; wp_reset_postdata(); ?>

        </div>

        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

    </div>

    <?php
    return ob_get_clean();
}
add_shortcode('dashboard_slider', 'ds_slider_shortcode');
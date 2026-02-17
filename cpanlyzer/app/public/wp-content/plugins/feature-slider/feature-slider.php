<?php
/**
 * Plugin Name: Feature Slider
 * Description: Dynamic Feature Slider + About section sync.
 */

if (!defined('ABSPATH')) exit;

function fc_register_feature_post_type() {
    register_post_type('feature', array(
        'label' => 'Features',
        'public' => true,
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-screenoptions',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt')
    ));
}

add_action('init', 'fc_register_feature_post_type');

function fc_enqueue_carousel_scripts() {
    wp_enqueue_script('fc-carousel', plugins_url('carousel.js', __FILE__), array(), '1.0', true);
    wp_enqueue_style('fc-carousel', plugins_url('carousel.css', __FILE__));
}

add_action('wp_enqueue_scripts', 'fc_enqueue_carousel_scripts');

function fc_carousel_shortcode() {

    ob_start();

    $query = new WP_Query(array(
        'post_type' => 'feature',
        'posts_per_page' => -1
    ));

    if ($query->have_posts()) :
    ?>

    <div class="custom-carousel">
        <button class="arrow prev">&#10094;</button>
        
        <div class="carousel-track">
            <?php while($query->have_posts()) : $query->the_post(); ?>

                <div class="card">
                    <?php 
                    $post_id = get_the_ID();
                    $image_html = '';
                    
                    // Try WordPress featured image first
                    if (has_post_thumbnail()) {
                        $image_html = get_the_post_thumbnail($post_id, 'medium', array('class' => 'card-image'));
                    } else {
                        // Fallback to stored URL in postmeta
                        $thumbnail_url = get_post_meta($post_id, '_thumbnail_url', true);
                        if (!$thumbnail_url) {
                            // Fallback to guid if no meta URL
                            $post = get_post();
                            $thumbnail_url = $post->guid;
                        }
                        
                        if ($thumbnail_url) {
                            $image_html = '<img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr(get_the_title()) . '" class="card-image" loading="lazy">';
                        } else {
                            // Placeholder if no image available
                            $image_html = '<div class="card-image-placeholder" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; height: 200px; color: white; font-weight: bold;">' . esc_html(get_the_title()) . '</div>';
                        }
                    }
                    echo $image_html;
                    ?>
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_excerpt(); ?></p>
                    <a href="<?php echo esc_url('/about/#' . sanitize_title(get_the_title())); ?>">Read More</a>
                </div>

            <?php endwhile; ?>
        </div>
        
        <button class="arrow next">&#10095;</button>
    </div>

    <?php
    endif;

    wp_reset_postdata();
    return ob_get_clean();
}

add_shortcode('feature_slider', 'fc_carousel_shortcode');


function fc_about_sections_shortcode() {

    ob_start();

    $query = new WP_Query(array(
        'post_type' => 'feature',
        'posts_per_page' => -1
    ));

    while($query->have_posts()) : $query->the_post();
    ?>

        <div id="<?php echo sanitize_title(get_the_title()); ?>">
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </div>

    <?php endwhile;

    wp_reset_postdata();
    return ob_get_clean();
}

add_shortcode('feature_about', 'fc_about_sections_shortcode');

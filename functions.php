<?php
function alpha_child_asstes(){
    wp_enqueue_style('parent-style',get_parent_theme_file_uri('/style.css'),array('bootstrap'));
}
add_action('wp_enqueue_scripts','alpha_child_asstes' );

function alpha_child_asstes_dequeue(){
    wp_dequeue_style('alpha-style');
    wp_deregister_style('alpha-style');
    wp_enqueue_style('alpha-style',get_theme_file_uri('/assets/css/alpha.css'));
}
add_action('wp_enqueue_scripts','alpha_child_asstes_dequeue',14 );

function alpha_child_bootstrap_ed(){
    wp_dequeue_style('bootstrap');
    wp_deregister_style('bootstrap');
    wp_enqueue_style('bootstrap','//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css');
}
add_action('wp_enqueue_scripts','alpha_child_bootstrap_ed',11 );

function alpha_about_page_template_header(){
    if (is_page()){
        $alpha_feat_image = get_the_post_thumbnail_url(null,"large");
        ?>
        <style>
            .page-header{
                background-image: url(<?php echo $alpha_feat_image;?>);
            }
            .page-header h1 a{
                color:#fff0f0;
            }
        </style>
        <?php
    }
    if (is_front_page()){
        if (current_theme_supports('custom-header')){
            ?>
            <style>
                .header{
                    background-image: url(<?php echo header_image() ; ?>);
                    background-size: cover;
                    margin-bottom: 30px;
                }
                .header h1.heading a, h3.tagline{
                    color:#<?php echo get_header_textcolor(); ?>;
                }
            </style>
            <?php

        }
    }
}
    function alpha_todays_date(){
        echo date('d-m-y');
    }


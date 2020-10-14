<section id="sidebar" class="col-12 col-lg-3">
    <div class="row justify-content-center">

    <?php if ( ! is_active_sidebar( 'sidebar-1' ) ) {
        return;
    }
    ?>

    <aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Main widget area', 'grt' ); ?>">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </aside>

    <?php $custom_query = new WP_Query(array( 
                            'post_type'=>'page',
                            'orderby' => 'menu_order',
                            'order' => 'DESC',
                            'posts_per_page' => '20',
                        ));
        $count = 0;
        shuffle( $custom_query->posts );

        //Boucle qui affiche les articles
        if ($custom_query->have_posts()) : while ($custom_query->have_posts() && $count < 2) : $custom_query->the_post();
            $count += 1; //Permet de n'afficher que 2 articles aléatoirement
    ?>

            <div class="col-12 marginFooter">
                <a href="<?php the_permalink() ?>">
                    <div class="sidebar-thumb" style="background-image : url('<?php the_post_thumbnail_url();?>);">
                        <?php the_title();?>
                    </div>
                </a>
            </div>
        
    <?php
    endwhile; endif;
    wp_reset_postdata();
    ?>
        
    </div>           
</section>
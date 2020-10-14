<?php get_header(); ?>


<?php $search_query = new WP_Query(array( 
                            's' => $_GET["s"],
                            'order' => 'DESC',
                            'posts_per_page' => '25',
                            'post__not_in' => array (13, 355, 361),
                        ));
?>

        <main class="container searchPage" id="mainContainer">
            <div class="row justify-content-center mt-3">
                Nombre de résultat(s) : <?= $search_query->found_posts; ?>
            </div>
            <?php if ($wp_query->found_posts != 0) : ?>
                <div class="row">
                    <?php if ($search_query->have_posts()) : while ($search_query->have_posts()) : $search_query->the_post(); ?>
                    
                        <div class="card" style="width: 18rem;">
                            <div class="card-body research">
                                <h5 class="card-title"><?php the_title();?></h5>
                                <?php if (get_post_type() == 'page') : ?>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                    <a href="<?php the_permalink();?>" style="color: #00a984;">> En savoir plus</a>
                                <? elseif (get_post_type() == 'post') : ?>
                                    <p class="card-text"><?php the_excerpt(); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>


                    <?php endwhile; endif; wp_reset_postdata(); ?>
                </div>
            <?php else : ?>
                <div class="row justify-content-center align-items-center">
                    <img src="/grtgaz/wp-content/themes/grt/assets/images/oups.png" alt="Oups">
                </div>
                <div class="row justify-content-center align-items-center">
                    <p>Aucun résultat</p>
                </div>
                <div class="row justify-content-center align-items-center">
                <p><a href="http://extranetoko.fr/grtgaz" class="link">Revenir à la page d'accueil</a></p>
                </div>
            <?php endif; ?>
        </main>

        <?php include 'assets/views/modale.php' ?>

<?php get_footer(); ?>
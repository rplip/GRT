
<?php get_header(); ?>

<?php if (is_front_page()) : //Affichage de l'abcédaire si page de garde ?>

        <main class="container" id="mainContainer">
            <?php the_content(); ?>
        </main>
    
        <section class="container abcdaire" id="alphabetContainer">
            <div id="letters" class="row justify-content-between">
                <ul class="AtoZ col-12 filters-a-group">
                    <?php
                        $alphabet = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
    
                        foreach ($alphabet as $key => $value) {
                            echo ('<a class="alphabetLetter" href="#letter-'.$value.'" data-filter=".letter-'.$value.'"><li>'.$value.'</li></a>');
                        };
                    ?>
                </ul>
            </div>
        </section>
    
        <section class="container abcdaire" id="abcdContainer">
            <div class="grid">
            <div class="grid-sizer"></div>
                <?php $custom_query = new WP_Query(array( 
                                        'post_type'=>'post',
                                        'orderby' => array( 'meta_value_num' => 'DESC', 'id' => 'DESC' ),
                                    ));
                
                    //Boucle qui affiche les articles
                    if ($custom_query->have_posts()) : while ($custom_query->have_posts()) : $custom_query->the_post();
    
                    // Première lettre de l'article pour les trier par ordre alphabétique
                    $firstLetter = substr(get_the_title(), 0, 1);
                ?>
                
                <div class="grid-item letter-<?= $firstLetter ?>" id="post-<?php the_ID();?>">
                    <div>
                        <h5 class="title"><?php the_title(); ?></h5>
                        <p> <?php the_content(); ?></p>
                    </div>
                </div>
                
                <?php
                endwhile; endif;
                wp_reset_postdata();
                ?>
    
            </div>
       
        </section>

<?php endif; ?>

<?php if(!is_front_page() && get_post_type() == 'page') : // Affichage des pages hormis la homepage?> 
    <main class="container" id="id-<?php the_id(); ?>">
        <section class="row">
            <section id="mainContent" class="col-12 col-sm-9">
                <?php the_content(); ?>
            </section>
            <?php get_sidebar();?>
        </section>
    </main>
<?php endif;?>

<?php if(!is_front_page() && get_post_type() == 'post') : //Affichage des articles?>
    <main class="container" style="">
        <section id="postContent" class="row my-2">
                <h1 class="col-12 postTitle"><?php the_title(); ?></h1>
                <div class="col-12 postContent"><?php the_content(); ?></div>
        </section>
    </main>
<?php endif;?>



<?php get_footer(); ?>
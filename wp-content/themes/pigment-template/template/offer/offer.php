<?php
$title_page = get_field('title');
$postID = get_the_ID();

?>


<section class="offer">
    <div class="container">
        <h2><?=$title_page?></h2>
        <div class="offer_wrapper">
        <?php
            $args = array(
            'post_type' => 'oferta',
            'post_status' => 'publish',
            );
            $posts_oferta = new WP_Query($args);
            
            if($posts_oferta->have_posts()) {
                while($posts_oferta->have_posts()) {
                    $posts_oferta->the_post();
                    $post = get_post();
                    $idpost = get_the_ID();
                    $offer = get_field('oferta', $idpost);?>
                    <div class="offer_wrapper_item">
                        <div class="offer_wrapper_item--text">
                            <h4><?= $offer['title']?></h4>
                             <?= add_nbsp($offer['txt'])?>
                        </div>
                        <div class="offer_wrapper_item--img">
                           
                                <img src="<?= $offer['img']['url'] ;?>" alt="">
                          
                        </div>
                    </div>
                   
             <?php }?>
            <?php }?>
        
        </div>
    </div>
</section>
<?php
$title = get_field('title', 157);
$banner = get_field('img_desktop', 157);
$banner_small = get_field('img_mobile', 157);
?>


<section class="cennik">
    <div class="banner">
    <img class="banner__desktop" src="<?= ($banner['url']) ;?>" alt="">
    <img class="banner__mobile" src="<?= ($banner_small['url']) ;?>" alt="">
    </div>
    <div class="container">
        <h2><?=$title?></h2>
        <div class="prices">
        <?php
            $args = array(
            'post_type' => 'cena',
            'post_status' => 'publish',
            );
            $posts_cena = new WP_Query($args);
            
            if($posts_cena->have_posts()) {
                while($posts_cena->have_posts()) {
                    $posts_cena->the_post();
                    $post = get_post();
                    $idpost = get_the_ID();
                    $prices_name = get_field('name', $idpost);
                    $prices_price = get_field('price_list', $idpost)
                    ?>
                   
                    <div class="prices__wrapper">
                        <div class="prices__wrapper__item">
                            <h3><?=$prices_name?></h3>
                        </div>
                        <div class="prices__wrapper__price">
                            <div class="prices__wrapper__price--price">
                                <?=$prices_price['type']['type_name']?>
                                <p><?=$prices_price['type']['price']?></p>
                            </div>
                            <?php if(!empty($prices_price['type_two']['type_name'])) {?>
                            <div class="prices__wrapper__price--price ">
                                <?=$prices_price['type_two']['type_name']?>
                                <p><?=$prices_price['type_two']['price']?></p>
                            </div>
                            <?php } ?>
                            <?php if(!empty($prices_price['type_three']['type_name'])) {?>
                            <div class="prices__wrapper__price--price">
                                <?=$prices_price['type_three']['type_name']?>
                                <p><?=$prices_price['type_three']['price']?></p>
                            </div>
                            <?php } ?>
                            
                        </div>
                        
                    </div>
                   
             <?php }?>
            <?php }?>
        
        </div>
       
    </div>
</section>
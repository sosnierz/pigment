<?php
$services = get_field('uslugi', 203);
?>


<section class="services">
    <div class="container">
        <h2><?=$services['title']?></h2>
        <div class="services_wrapper">
        <?php
            $args = array(
            'post_type' => 'uslugi',
            'post_status' => 'publish',
            );
            $posts_uslugi = new WP_Query($args);
            
            if($posts_uslugi->have_posts()) {
                while($posts_uslugi->have_posts()) {
                    $posts_uslugi->the_post();
                    $post = get_post();
                    $idpost = get_the_ID();
                    $service = get_field('uslugi', $idpost);?>
                    <div class="services_wrapper_item">
                        <div class="services_wrapper_item--img">
                            <img src="<?= ($service['img']['url']) ;?>" alt="">
                        </div>
                        <div class="services_wrapper_item--txt">
                            <h4><?= $service['title']?></h4>
                            <?= add_nbsp($service['txt'])?>
                        </div>
                    </div>
                   
             <?php }?>
            <?php }?>
        
        </div>
        <button><a href="pigment/oferta/"><?=$services['btn']?></a></button>
    </div>
</section>
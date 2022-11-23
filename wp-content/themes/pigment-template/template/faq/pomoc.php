<?php 
    $faq = get_field('faq');
?>
<section class="faq">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2><?= add_nbsp($faq['title']); ?></h2>
                <?= add_nbsp($faq['description']); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul>
            <?php
            $args = array(
            'post_type' => 'faq',
            'post_status' => 'publish',
            );
            $posts_faq = new WP_Query($args);
            
            if($posts_faq->have_posts()) {
                while($posts_faq->have_posts()) {
                    $posts_faq->the_post();
                    $post = get_post();
                    $idpost = get_the_ID();
                    $question = get_field('q', $idpost);
                    $answer = get_field('a', $idpost)
                    ;?>
                    
                    <li class="question">
                        <div class="title-container">
                            <img src="<?= get_template_directory_uri(); ?>/src/images/icons/plus.svg" alt="">
                            <?= $question; ?>
                        </div>
                        <div class="answer">
                            <?= add_nbsp($answer); ?>
                        </div>
                    </li>

                   
             <?php }?>
            <?php }?>
                
                    </ul> 
                
            </div>
        </div>
    </div>
</section>
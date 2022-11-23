
<section class="gallery_section">
    <div class="container">
    <div id="gallery" style="display:none;"> 
        <?php
            $args = array(
            'post_type' => 'galeria',
            'post_status' => 'publish',
            );
            $posts_galeria = new WP_Query($args);
            
            if($posts_galeria->have_posts()) {
                while($posts_galeria->have_posts()) {
                    $posts_galeria->the_post();
                    $post = get_post();
                    $idpost = get_the_ID();
                    $gallery = get_field('img', $idpost);?>
                    
                  
                   
			    <img alt="img " src="<?= $gallery['url'] ;?>" data-src="<?= $gallery['url'] ;?>"
				data-image="<?= $gallery['url'] ;?>"
				data-description="Image 1 Description">
                   
             <?php }?>
            <?php }?>
        </div>
    </div>
</section>
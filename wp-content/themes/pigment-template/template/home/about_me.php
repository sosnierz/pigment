<?php
$about = get_field('about_me', 2);
?>


<section class="about">
    <div class="container">
        <h2><?= $about['title']?></h2>
        <div class="wrapper">
            <div class="wrapper_left">
                <?=$about['txt']?> 
            </div>
            <div class="wrapper_right">
            <img src="<?= ($about['img']['url']) ;?> ">
            </div>
        </div>
    </div>
</section>
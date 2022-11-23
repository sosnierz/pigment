<?php
$about = get_field('about_me', 203);
?>


<section class="about">
    <div class="container">
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
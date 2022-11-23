<?php
$banner = get_field('banner', 2);
// var_dump($banner)
?>

<section class="banner">
    <div class="banner__wrapper">
            <div class="banner__wrapper__text">
                <?=$banner['title']?>
                <h3><?=$banner['title_two']?></h3>
                <?=add_nbsp($banner['text'])?>
                <button><a href="/pigment/kontakt/">Umów wizytę</a></button>
            </div>
            <div class="banner__wrapper__img">
                <img src="<?= ($banner['img']['url']) ;?> ">
            </div>
    </div>
</section>
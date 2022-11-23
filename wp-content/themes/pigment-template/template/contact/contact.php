<?php
$title = get_field('title');
$email = get_field('email');
$header = get_field('header', 2);


?>


<section class="contact">
    <div id="map" data-icon="<?=get_template_directory_uri()?>/src/images/marker.svg">
    </div>
    <div class="contact__wrapper">
        <div class="contact__wrapper__left">
            <h4>Pigment House Permanent Art</h4>
            <div class="contact__wrapper__left__contact">
                <div class="contact__wrapper__left__contact--phone">
                    <img class="icon" src="<?=get_template_directory_uri()?>/src/images/icons/phone-cont.svg" /> 
                    <p><a href="tel:+48785474588">+48 785 474 588</a></p>
                </div>
                <div class="contact__wrapper__left__contact--email">
                     <img class="icon" src="<?=get_template_directory_uri()?>/src/images/icons/email.svg" /> 
                    <p><a href="mailto:kasiakarge@wp.pl"><?=$email?></a></p>
                </div>
                <div class="contact__wrapper__left__contact--address">
                <img class="icon" src="<?=get_template_directory_uri()?>/src/images/icons/lok-cont.svg" /> 
                    <?=$header['adres']?>
                </div>
            </div>
        </div>
        <div class="contact__wrapper__right">
            <p>Chcesz dokonać rezerwacji lub dowiedzieć się więcej o zabiegu? Napisz do mnie. Odpowiem jak najszybciej.</p>
        <?php echo apply_shortcodes('[contact-form-7 id="202" title="Pigment"]') ?>
        </div>
    </div>
    
</section>
<?php
    $footer = get_field('header', 2);
    
    ?>


<footer id="footer">
    <div class="footer">
        <div class="footer__left">
            <div class="footer__left__logo">
                        <a href="<?php echo home_url() ;?>">
                            <img src="<?= ($footer['logo']['url']) ;?> ">
                        </a>
                    </div>
        </div>
         <div class="footer__middle">
         <div class="address">
                        <img class="icon" src="<?=get_template_directory_uri()?>/src/images/icons/location.svg" />
                        <div class="txt">
                            <?=$header['adres']?>
                        </div>
                    </div>
                    <div class="socials">
                        <p>Obserwuj mnie:</p>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/Pigment-House-Katarzyna-Karge-100722975786960/"><img class="icon" src="<?=get_template_directory_uri()?>/src/images/icons/fb.svg" /></a>
                           <a href="#"><img class="icon insta" src="<?=get_template_directory_uri()?>/src/images/icons/ins.svg" /></a>
                        </div>
                    </div>
         </div>
    </div>
</footer>

<?php wp_footer(); ?>

<script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCy-TlwDDuOXvaF1U_Z3P6DX-NHBLQgNh8&callback=initMap">
    
</script>

</body>
</html>

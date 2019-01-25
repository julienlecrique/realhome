<?php wp_footer() ?>
<footer>
        <div class="footer-menu-1">
            <div><img class="footer-menu-logo"
                      src="<?php echo bloginfo( 'template_url' ); ?>/images/images-home/logo-2.png" alt="Logo"></div>
            <div class="footer-menu-menusecondaire"><?php wp_nav_menu( array(
					'theme_location' => 'menu-secondaire',
					'container'      => 'nav'
				) ); ?>
            </div>
        </div>
        <div class="footer-menu-2">
            <h2>Menu</h2>
            <div class="footer-menu-menuprincipal"><?php wp_nav_menu( array(
					'theme_location' => 'menu-principal',
					'container'      => 'nav'
				) ); ?>
            </div>
        </div>

        <div class="footer-menu-3">
            <h2>Contact</h2>
            <p><?php echo the_field('adresse-footer','option') ?> </br></p>
            <p>Freephone: <?php echo the_field('freephone-footer','option') ?></br>
                Telephone: <?php echo the_field('telephone-footer','option') ?></br>
                FAX: <?php echo the_field('fax-footer','option') ?>
            </p>
            </br>
            <a href="mailto:<?php echo the_field('mail-footer','option') ?>"><?php echo the_field('mail-footer','option') ?></a>
        </div>

</footer>

</body>
</html>
<?php /* Template Name: Contact  */ ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
        <h1 class="titre-contact">Contact</h1>
        <div id="map">
            <!-- Ici s'affichera la carte -->
        </div>
        <div class="contact-content">
            <div class="contact-infos">
                <h2>Infos</h2>

                <p class="contact-infos-paragraphe">
                    <?php the_field( 'infos_paragraphe' ); ?></br>
                </p>

                <p class="contact-infos-adresse">
					<?php the_field( 'adresse_rue' ); ?></br>
					<?php the_field( 'adresse_ville' ); ?></br>
                </p>

                <p class="contact-infos-electroniques">
					<?php the_field( 'telephone' ); ?></br>
					<?php the_field( 'fax' ); ?></br>
                    <span>E-mail:</span><a href="<?php echo the_field( 'mail' ); ?>"><?php the_field( 'mail' ); ?></a>
                </p>

            </div>

            <div class="form">

                <h2>Envoyez-nous un message !</h2>

				<?php echo do_shortcode( '[contact-form-7 id="66" title="Contact form 1"]' ); ?>

            </div>

        </div>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>


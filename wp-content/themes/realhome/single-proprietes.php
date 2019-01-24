<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
        <h1 class="single-propriete-titre"><?php the_title() ?></h1>
        <div class="single-propriete-card">


            <img class="single-propriete-image" src='<?php the_post_thumbnail_url( 'full' ) ?>' alt="image a la une">
            <div class="single-propriete-infos">
                <p class="single-propriete-prix"><i class="fas fa-bookmark"></i><?php the_field( 'prix' ); ?></p>
                <hr>
				<p class="single-propriete-ville">Ville : <span><?php

					$id      = get_the_ID();
					$myterms = get_the_terms( $id, 'ville' );
					if ( $myterms ): ?>
					<?php foreach ( $myterms as $myterm ): ?>
                <?php echo $myterm->name; ?>
	            <?php endforeach; ?>
	            <?php endif; ?></span>

                </p>
                </br>
                <p class="single-propriete-piece">Nombre de pièces: <span><?php the_field( 'nb_p' ); ?></span></p>
                <p class="single-propriete-info">Info: <span><?php the_field( 'info' ); ?></span></p>
                <hr>
                <div class="single-propriete-paragraphe"><?php the_content() ?></div>
            </div>
        </div>

	<?php endwhile; ?>
<?php endif; ?>


<div class="single-propriete-proprietes">
    <hr>
    <h2>Nos propriétés</h2>
    <div class="single-propriete-proprietes-container">

		<?php
		$args = array(
			'post_type'      => 'proprietes',
			'posts_per_page' => 4,
			'orderby' => 'rand',
			'order'          => 'ASC',
		);

		?>
		<?php $the_query = new WP_Query( $args ); ?>

		<?php if ( $the_query->have_posts() ) : ?>

			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                <div class="single-propriete-proprietes-card">

                    <a href="<?php the_permalink() ?>">
                        <div style="background-image: url('<?php  the_post_thumbnail_url( 'full' ) ?>')" class="single-propriete-proprietes-img"></div>

                        <h4 class="single-propriete-proprietes-titre"><?php the_title() ?></h4>

						<?php

						$id      = get_the_ID();
						$myterms = get_the_terms( $id, 'ville' );

						if ( $myterms ): ?>

								<?php foreach ( $myterms as $myterm ): ?>
                                    <p><?php echo $myterm->name; ?></p>


								<?php endforeach; ?>


						<?php endif; ?>
                    </a>


                </div>

			<?php endwhile; ?>

		<?php endif; ?>
    </div>

</div>
<?php get_footer(); ?>

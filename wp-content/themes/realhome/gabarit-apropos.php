<?php /* Template Name: Gabarit Apropos  */ ?><?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_content() ?>
        <div class="a-propos">
            <h1><?php the_title() ?></h1>
            <div class="a-propos-detail">
                <img class="a-propos-image" src='<?php the_post_thumbnail_url( 'full' ) ?>' alt="image a la une">
                <div class="a-propos-detail-paragraphe">
                    <p><?php the_field( 'premier_paragraphe' ) ?></p>
                </br>
                    <p><?php the_field( 'second_paragraphe' ) ?></p>
                </div>
            </div>
        </div>
        <div class="detail">

			<?php
			if ( have_rows( 'repeteur_apropos' ) ):
				while ( have_rows( 'repeteur_apropos' ) ) : the_row(); ?>

                    <div class="detail-card">

						<?php the_sub_field( 'icone-apropos' ); ?>

                        <h3><?php the_sub_field( 'titre-apropos' ); ?></h3>

                        <p><?php the_sub_field( 'paragraphe-apropos' ); ?></p>

                    </div>
				<?php endwhile;
			else :
			endif;

			?>
        </div>
        <h2 class="titre_equipe">Notre équipe</h2>
        <div class="equipe">

	        <?php
	        $args = array(
		        'post_type'      => 'agents',
		        'posts_per_page' => 4,
		        'orderby' => 'rand',
		        'order'          => 'ASC',
	        );

	        ?>
	        <?php $the_query = new WP_Query( $args ); ?>

	        <?php if ( $the_query->have_posts() ) : ?>

		        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                    <div class="equipe-card">
                        <a class="" href="<?php the_permalink() ?>">
                        <img src="<?php  the_post_thumbnail_url( 'full' ) ?>" alt="<?php the_title() ?>">

                        <h3><?php echo the_title() ?></h3>
                        <?php

	                        $id      = get_the_ID();
	                        $myterms = get_the_terms( $id, 'profession' );
	                        if ( $myterms ): ?>
		                        <?php foreach ( $myterms as $myterm ): ?>
                            <p><?php echo $myterm->name; ?></p>
	                        <?php endforeach; ?>
                            <?php endif; ?>

                        </a>
                    </div>
		        <?php endwhile;
	        else :
	        endif;

	        ?>


        </div>

	<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>

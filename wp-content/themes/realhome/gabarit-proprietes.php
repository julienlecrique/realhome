<?php /* Template Name: Gabarit Proprietes  */ ?>

<?php get_header(); ?>
<?php $title = get_the_title(); ?>
<?php $img = get_the_post_thumbnail_url( 'full' ); ?>

    <div class="nos-proprietes">
        <h1><?php echo $title ?></h1>
    </div>


<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
	<?php endwhile; ?>
<?php endif; ?>

    <div class="villes_nav header-menu-menuville">
        <a href="<?php echo site_url() ;?>/nos-proprietes/">Tous</a>

		<?php $villes = get_terms('ville', array(
			'hide_empty' => false,
		)); ?>

		<?php foreach ($villes as $ville) { ?>

            <a href="<?php echo get_term_link($ville->slug, 'ville'); ?>"><?php echo $ville_name = $ville->name; ?></a>


		<?php } ?>

    </div>
<?php wp_reset_postdata() ?>


    <div class="propriete-container">

        <?php
		$args = array(
			'post_type'      => 'proprietes',
			'posts_per_page' => 9,
			'orderby' => 'rand',
			'order'          => 'ASC',
		);

		?>
		<?php $the_query = new WP_Query( $args ); ?>

		<?php if ( $the_query->have_posts() ) : ?>

			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                <div class="propriete-card">

                    <a href="<?php the_permalink() ?>">
                        <div style="background-image: url('<?php  the_post_thumbnail_url( 'full' ) ?>')" class="img-propriete"></div>

                        <h4 class="titre-propriete"><?php the_title() ?></h4>
	                    <?php

	                    $id      = get_the_ID();
	                    $myterms = get_the_terms( $id, 'ville' );

	                    if ( $myterms ): ?>

                            <ul>

			                    <?php foreach ( $myterms as $myterm ): ?>
                                    <p><?php echo $myterm->name; ?></p>


			                    <?php endforeach; ?>

                            </ul>


	                    <?php endif; ?>
                        <p class="prix"><?php the_field( 'prix' ); ?></p>
                        <div class="footer-propriete">
                            <p><?php the_field( 'superficie' ); ?></p>
                            <p><?php the_field( 'chambres' ); ?></p>
                            <p><?php the_field( 'sdb' ); ?></p>
                        </div>

                    </a>


                </div>

			<?php endwhile; ?>

		<?php endif; ?>
    </div>



<?php get_footer(); ?>
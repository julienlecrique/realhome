<!--//////////////////////////////
//                              //
//           HEADER             //
//                              //
///////////////////////////////-->
<?php get_header(); ?>

<!--//////////////////////////////
//                              //
//   AFFICHAGE DE LA BANNIERE   //
//                              //
///////////////////////////////-->
<div class="banniere ">
	<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) :
	the_post(); ?>
    <img src='<?php the_post_thumbnail_url( 'full' ) ?>' alt="image a la une" style="width: 100%">

    <h1 class="titre-frontpage"><?php echo the_content() ?></h1>
</div>

<!--//////////////////////////////
//                              //
//     AFFICHAGE DESCRIPTION    //
//                              //
///////////////////////////////-->
    <div class="description">

        <h2>
			<?php the_field( 'titre' ) ?>
            </br>
            <span>—</span>
        </h2>

        <p><?php the_field( 'paragraphe-description' ) ?></p>

    </div>

<!--//////////////////////////////
//                              //
//    AFFICHAGE DES DETAILS     //
//                              //
///////////////////////////////-->
    <div class="detail">

		<?php
		if ( have_rows( 'detail' ) ):
			while ( have_rows( 'detail' ) ) : the_row(); ?>

                <div class="detail-card">

					<?php the_sub_field( 'icone' ); ?>

                    <h3><?php the_sub_field( 'detail-titre' ); ?></h3>

                    <p><?php the_sub_field( 'detail-paragraphe' ); ?></p>

                </div>
			<?php endwhile;
		else :
		endif;

		?>
    </div>

<!--//////////////////////////////
//                              //
//   AFFICHAGE DES PROPRIETES   //
//                              //
///////////////////////////////-->
    <div class="propriete">

        <h3 class="titre-proprietes">Nos <span> propriétés </span></h3>

        <i>____</i>

        <div class="propriete-paragraphe"><?php the_field( 'propriete-paragraphe' ); ?>
        </div>

        <div class="propriete-container">
			<?php
			$args = array(
				'post_type'      => 'proprietes',
				'posts_per_page' => 6,
				'orderby'        => 'rand',
				'order'          => 'ASC',
			);

			?>
			<?php $the_query = new WP_Query( $args ); ?>

			<?php if ( $the_query->have_posts() ) : ?>

				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="propriete-card">

                        <a href="<?php the_permalink() ?>">
                            <div style="background-image: url('<?php the_post_thumbnail_url( 'full' ) ?>')"
                                 class="img-propriete"></div>

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
            <a href="<?php echo site_url(); ?>/nos-proprietes/" class="button-propriete"> VOIR TOUTES</a>
        </div>

    </div>

<!--    restore the context of the template-->
<?php wp_reset_postdata() ?>

<!--//////////////////////////////
//                              //
//     AFFICHAGE AGENT RANDOM   //
//                              //
///////////////////////////////-->
    <div class="agent-frontpage">
        <a class="agent-card" href="<?php the_permalink() ?>">
			<?php
			$args = array(
				'post_type'      => 'agents',
				'posts_per_page' => 1,
				'orderby'        => 'rand',
				'order'          => 'ASC',
			);

			?>
			<?php $the_query = new WP_Query( $args ); ?>

			<?php if ( $the_query->have_posts() ) : ?>

				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                    <div class="agents">
                        <img class="agent-photo" src="<?php the_post_thumbnail_url( 'full' ) ?>" alt="">
                        <div class="texte-agents">
                            <h2>Nos agents</h2>
                            <span>____</span>
                            <h3><?php the_title() ?></h3>
                            <p><?php the_content() ?></p>
                        </div>


                    </div>
				<?php endwhile; ?>

			<?php endif; ?>
        </a>
    </div>

<!--    restore the context of the template-->
<?php wp_reset_postdata() ?>

<!--//////////////////////////////
//                              //
//  AFFICHAGE DES PARTENAIRES   //
//                              //
///////////////////////////////-->
<div class="partenaires">
    <h2>Our <span>Partners</span></h2>

	<?php

	// check if the repeater field has rows of data
	if ( have_rows( 'partenaires' ) ):
		while ( have_rows( 'partenaires' ) ) : the_row(); ?>
			<?php $imagepartenaire = get_sub_field( 'partenaire-1' ) ?>
            <img src="<?php echo $imagepartenaire['url']; ?>" alt="<?php echo $imagepartenaire['alt']; ?>">


		<?php endwhile;
	else :

	endif;

	?>
	<?php endwhile; ?>
	<?php endif; ?>
</div>

<!--//////////////////////////////
//                              //
//       AFFICHAGE FOOTER       //
//                              //
///////////////////////////////-->
<?php get_footer(); ?>
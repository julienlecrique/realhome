<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<h1 class="single-agent-titre">Nos agents</h1>
		<div class="single-agent-card">


			<img class="single-agent-image" src='<?php the_post_thumbnail_url( 'full' ) ?>' alt="image a la une">
			<div class="single-agent-infos">
				<p class="single-agent-nom"><i class="fas fa-user"></i><?php the_title(); ?></p>
				<hr>
				<p class="single-agent-profession">Profession : <span><?php

						$id      = get_the_ID();
						$myterms = get_the_terms( $id, 'profession' );
						if ( $myterms ): ?>
							<?php foreach ( $myterms as $myterm ): ?>
								<?php echo $myterm->name; ?>
							<?php endforeach; ?>
						<?php endif; ?></span>

				</p>
				</br>
				<a href="mailto:<?php the_field( 'email' ); ?>" class="single-agent-mail">Email: <span><?php the_field( 'email' ); ?></span></a>
				<p class="single-agent-info">Info: <span><?php the_field( 'info' ); ?></span></p>
				<hr>
				<div class="single-agent-paragraphe"><?php the_content() ?></div>
			</div>
		</div>

	<?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>

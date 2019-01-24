<?php get_header(); ?>

<div class="nos-proprietes">
    <h1>Nos propriétés à <span><?php echo $ville ?></span></h1>
</div>

<div class="villes_nav header-menu-menuville">
    <a href="<?php echo site_url() ;?>/nos-proprietes/">Tous</a>

	<?php $villes = get_terms('ville', array(
		'hide_empty' => false,
	)); ?>

	<?php foreach ($villes as $ville) { ?>

		<a href="<?php echo get_term_link($ville->slug, 'ville'); ?>"><?php echo $ville_name = $ville->name; ?></a>


	<?php } ?>

</div>

<div class="container-ville">
<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>



		<div class="propriete-card-ville">

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

	<?php endwhile;?>
<?php endif;?>
</div>

<?php get_footer(); ?>

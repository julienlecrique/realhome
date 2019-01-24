<?php get_header(); ?>
<div class="single-actualite-container">
        <div class="single-actualite-infos">

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>


		<div class="">
            <h1 class="single-actualite-titre"><?php the_title() ?></h1>
            <div class="single-actualite-paragraphe-intro"><?php the_content() ?></div>
			<img src='<?php echo the_post_thumbnail_url('large') ?>'>
            <p class="paragraphe-1"><?php the_field( 'paragraphe-1' ); ?></p>
            <p class="paragraphe-2"><?php the_field( 'paragraphe-2' ); ?></p>
            <h3 class="titre-texte"><?php the_field( 'titre-texte' ); ?></h3>
            <p class="paragraphe-3"><?php the_field( 'paragraphe-3' ); ?></p>
            <p class="paragraphe-4"><?php the_field( 'paragraphe-4' ); ?></p>


		</div>
        <hr>
        <p class="footer-actualite"><?php the_time('d M Y '); ?> / PAR <span class="auteur"><?php the_field('auteur') ?></span></p>
        <hr>

        <div class="commentaires">
	        <?php comments_template(); ?>
        </div>



	<?php endwhile; ?>

<?php endif; ?>
	</div>
    <div class="sidebar-actualite-2">
	<?php get_sidebar( 'sidebar' ); ?>
    </div>
</div>


<?php get_footer(); ?>

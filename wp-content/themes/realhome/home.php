<?php get_header(); ?>
<?php $title = get_the_title( get_option( 'page_for_posts', true ) ); ?>
<?php $img = wp_get_attachment_image_src( get_post_thumbnail_id( get_option( 'page_for_posts' ) ), 'full' ); ?>

<div class="nos-actualites-titre">
    <h1>Nos <?php echo $title ?></h1>
</div>


<div class="container-actualite">
    <div class="actualites">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
                <article class="actualite">
                    <a href="<?php the_permalink() ?>">
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_taxonomies() ?></p>
                        <img src='<?php echo the_post_thumbnail_url( 'medium' ) ?>' style="opacity: 0.9">
                        <p><?php the_content() ?></p>
                    </a>
                </article>
                <a class="button-actualite" href="<?php the_permalink() ?>">Lire la suite</a>

                <hr>


			<?php endwhile; ?>
		<?php endif; ?>
    </div>


    <div class="sidebar-actualite">
		<?php get_sidebar( 'sidebar' ); ?>
    </div>
</div>
<?php get_footer(); ?>

<?php
/*
Template Name: Google Map Posts

* This template gets markers from queried posts
*/
get_header();?>

<div id="content" class="container-fluid">
	<h1><?php the_title(); ?></h1>

	<?php $args = array(
			'post_type' => 'post',
			'category_name' => 'location',
			'posts_per_page' => -1
			);
		$locations = new WP_Query( $args ); ?>

	<div class="acf-map row">
		<?php while ( $locations->have_posts() ) : $locations->the_post();
			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'marker' );
		?>
		<?php $location = get_field('google_map');
			if( !empty($location) ): ?>

			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>" data-icon="<?php echo $image[0];?>">
				<?php the_post_thumbnail('thumbnail'); ?>
				<h3><?php the_title(); ?></h3>
				<address><span class="glyphicon glyphicon-map-marker"></span><?php echo $location['address']; ?></address>
				<?php the_excerpt();?>
			</div>
			<?php endif; ?>
		<?php endwhile; ?>
	</div>
</div>

<?php get_footer();?>
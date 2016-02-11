<?php
/*
Template Name: Google Map
*/
get_header();?>

<div id="content" class="container-fluid">
	<h1><?php the_title(); ?></h1>
	<?php if( have_rows('google_map') ): ?>
		<div class="acf-map row">
			<?php while ( have_rows('google_map') ) : the_row();
					$location = get_sub_field('location');
					$title = get_sub_field('title');
					$desc = get_sub_field('description');
					$image = get_sub_field('image');
					if( !empty($image) ):
						// vars
						$url = $image['url'];
						$alt = $image['alt'];

						// thumbnail
						$marker = 'marker';
						$size = 'thumbnail';
						$thumb = $image['sizes'][ $size ];
						$markerthumb = $image['sizes'][ $marker ];
					endif; ?>
				<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>" data-icon="<?php echo $markerthumb; ?>">
					<?php if ($image){ ?><img class="img-responsive thumb" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>"/><?php } ?>
					<?php if ($title){ ?><h3><?php echo $title; ?></h3><?php } ?>
					<address><span class="glyphicon glyphicon-map-marker"></span><?php echo $location['address']; ?></address>
					<?php if ($desc){ ?><p><?php echo $desc; ?></p><?php } ?>
				</div>
		<?php endwhile; ?>
		</div>
	<?php endif; ?>
</div>

<?php get_footer();?>
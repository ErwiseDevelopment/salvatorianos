<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theme Dev
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php while (have_posts()) : the_post(); ?>
			<!-- banner -->
			<?php
			$editorial_slug = get_editorials()['portal']['categories']['slug'];

			echo get_template_part('template-parts/content', 'general-banner', get_query_custom('banners', $editorial_slug))
			?>
			<!-- end banner -->

			<!-- news -->
			<?php echo get_template_part('template-parts/content', 'home-news') ?>
			<!-- news -->

			<!-- gallery -->
			<?php echo get_template_part('template-parts/content', 'general-gallery', get_query_custom('galeria', $editorial_slug)) ?>
			<!-- gallery -->

			<!-- videos -->
			<?php echo get_template_part('template-parts/content', 'home-videos', get_query_custom('videos', $editorial_slug)) ?>
			<!-- videos -->

			<!-- banner welcome -->
			<?php echo get_template_part('template-parts/content', 'general-banner-welcome') ?>
			<!-- banner welcome -->

			<!-- blog -->
			<?php
			$blog_category = get_editorials()['portal']['categories']['blog'];

			echo get_template_part('template-parts/content', 'general-blog', get_general_blog_setting($blog_category));
			?>
			<!-- blog -->

			<!-- free materials -->
			<?php echo get_template_part('template-parts/content', 'general-free-materials', get_query_custom('materiais', $editorial_slug, 4)) ?>
			<!-- free materials -->

			<!-- prayer -->
			<?php echo get_template_part('template-parts/content', 'home-prayer') ?>
			<!-- prayer -->

			<!-- candle -->
			<?php echo get_template_part('template-parts/content', 'home-candle') ?>
			<!-- candle -->

			<div class="mt-10 xl:mt-20"></div>
		<?php endwhile; ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();

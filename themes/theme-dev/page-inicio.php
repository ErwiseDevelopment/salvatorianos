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
			$editorial_category_name = get_categories_setting()['editorials']['portal']['name'];

			echo get_template_part('template-parts/content', 'general-banner', get_query_custom('banners', $editorial_category_name))
			?>
			<!-- end banner -->

			<!-- news -->
			<?php echo get_template_part('template-parts/content', 'home-news') ?>
			<!-- news -->

			<!-- gallery -->
			<?php echo get_template_part('template-parts/content', 'general-gallery', get_query_custom('galeria', $editorial_category_name)) ?>
			<!-- gallery -->

			<!-- videos -->
			<?php echo get_template_part('template-parts/content', 'home-videos', get_query_custom('videos', $editorial_category_name)) ?>
			<!-- videos -->

			<!-- banner welcome -->
			<?php echo get_template_part('template-parts/content', 'general-banner-welcome') ?>
			<!-- banner welcome -->

			<!-- blog -->
			<?php
			$editorial_category_slug = get_categories_setting()['editorials']['portal']['slug'];

			echo get_template_part('template-parts/content', 'general-blog', get_general_blog_setting($editorial_category_slug));
			?>
			<!-- blog -->

			<!-- free materials -->
			<?php echo get_template_part('template-parts/content', 'general-free-materials', get_query_custom('materiais', $editorial_category_name, 4)) ?>
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

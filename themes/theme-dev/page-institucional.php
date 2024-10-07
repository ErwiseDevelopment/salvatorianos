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
			$editorial_slug = get_editorials()['editoria-institucional']['categories']['slug'];

			echo get_template_part('template-parts/content', 'general-banner', get_query_custom('banners', $editorial_slug))
			?>
			<!-- end banner -->

			<!-- news editorial -->
			<?php
			$news_category = get_editorials()['editoria-institucional']['categories']['news'];

			echo get_template_part('template-parts/content', 'general-news-editorial', get_general_news_editorial_setting('Confira o que está acontecendo em nossa Província', $news_category, 'Todas as notícias institucionais', 'noticias'))
			?>
			<!-- end news editorial -->

			<!-- our pedagogue -->
			<section class="pt-10 xl:py-32">

				<div class="container flex flex-wrap justify-center xl:px-0">

					<div class="w-5/12 translate-x-10 relative hidden xl:flex justify-end items-end z-10">
						<div class="w-full h-[560px]">
							<img class="w-full h-full translate-x-16 scale-[1.2] object-contain" src="<?php echo get_template_directory_uri() ?>/resources/images/carisma.png" alt="Institucional - Salvatorianos" />
						</div>
					</div>

					<div class="w-full xl:w-7/12 xl:-translate-x-10 flex items-end">
						<div class="rounded-tl-[250px] rounded-tr-[250px] rounded-br-[250px] bg-gradient-purple py-24 px-8 xl:px-32">
							<h4 class="text-3xl font-bold font-red-hat-display text-[#AFDF0F]" style="line-height:140%">
								Os Salvatorianos são o resultado do
								amor e do sonho do Pe. Francisco
								Maria da Cruz Jordan.
							</h4>

							<p class="text-2xl font-medium font-red-hat-display text-white" style="line-height:140%">
								Somos uma congregação religiosa que busca
								que Jesus seja conhecido e amado como o
								Salvador do Mundo. Queremos envolver a
								todos neste sonho, nesta forma de vida.
								Estamos presentes em muitos países, mais de
								30, e queremos crescer ainda mais. Venha nos
								conhecer!
							</p>
						</div>
					</div>

					<div class="w-full xl:w-8/12 -translate-y-10 relative flex justify-center z-20">
						<p class="inline-block text-xl xl:text-3xl font-bold font-red-hat-display text-center uppercase text-white bg-gradient-green p-4">
							conheça nosso carisma
						</p>
					</div>
				</div>
			</section>
			<!-- end our pedagogue -->

			<!-- blog -->
			<?php
			$blog_category = get_editorials()['editoria-institucional']['categories']['blog'];

			echo get_template_part('template-parts/content', 'general-blog', get_general_blog_setting($blog_category))
			?>
			<!-- blog -->

			<!-- jordan prayer -->
			<?php echo get_template_part('template-parts/content', 'general-jordan-prayer') ?>
			<!-- jordan prayer -->

			<div class="mt-10"></div>
		<?php endwhile; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php

get_footer();

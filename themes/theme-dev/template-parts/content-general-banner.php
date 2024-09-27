<section class="h-[300px] xl:h-screen mt-4">
    <!-- swiper -->
    <div class="swiper h-full js-swiper-banner">

        <div class="swiper-wrapper">

            <!-- slide -->
            <?php
            $banners = new WP_Query($args);

            if ($banners->have_posts()):
                while ($banners->have_posts()): $banners->the_post();
            ?>
                    <div class="swiper-slide">
                        <a href="<?php echo get_field('link_banner') ?>" target="_blank" rel="noreferrer noopener">
                            <img class="w-full h-full object-cover" src="<?php echo get_field('imagem_banner') ?>" alt="<?php the_title() ?> - Salvatorianos" />
                        </a>
                    </div>
            <?php
                endwhile;
            endif;

            wp_reset_query();
            ?>
            <!-- end slide -->
        </div>
    </div>
    <!-- end swiper -->
</section>
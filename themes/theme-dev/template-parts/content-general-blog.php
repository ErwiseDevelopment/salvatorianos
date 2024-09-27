<section class="pt-10 xl:pt-0">

    <div class="container flex flex-wrap">

        <div class="w-full xl:w-5/12 pr-4 xl:pr-20">
            <div class="relative">

                <div class="w-full h-[2px] bottom-2 left-0 absolute bg-[#E0E0E0]"></div>

                <div class="relative pb-2">
                    <h4 class="text-2xl xl:text-4xl font-black font-red-hat-display text-[#7137F0]">
                        Revistas Missão <br />
                        Salvatoriana
                    </h4>

                    <div class="w-48 h-2 translate-y-[2px] bg-[#92C900]"></div>
                </div>
            </div>

            <div class="flex flex-col items-center mt-8">
                <img class="h-[420px] object-cover" src="<?php echo get_template_directory_uri() ?>/resources/images/magazine-1.png" alt="Missão Salvatoriana - Salvatoriano" />

                <p class="text-sm font-bold font-red-hat-display text-center text-[#2C285B] mt-8 mb-4">
                    Jan/Fev/Mar - 2024
                </p>

                <div class="flex flex-col items-center gap-y-4">
                    <a class="transition hover:scale-90 rounded-full inline-block text-xl font-bold font-red-hat-display text-center uppercase text-white bg-gradient-to-r from-[#91AC31] to-[#4D8C3F] py-2 px-8" href="#">
                        Acesse agora
                    </a>

                    <a class="transition hover:scale-90 rounded-full inline-block text-xl font-bold font-red-hat-display text-center uppercase text-white bg-gradient-to-r from-[#7C33EE] to-[#2D2463] py-2 px-8" href="#">
                        Edições anteriores
                    </a>
                </div>
            </div>
        </div>

        <div class="w-full xl:w-7/12 pt-10 xl:pt-0">

            <div class="relative flex justify-between">

                <div class="w-full h-[2px] bottom-2 left-0 absolute bg-[#E0E0E0]"></div>

                <div class="relative pb-2">
                    <h4 class="text-2xl xl:text-4xl font-black font-red-hat-display text-[#7137F0]">
                        Mais conteúdos <br />
                        em nosso blog
                    </h4>

                    <div class="w-48 h-2 translate-y-[2px] bg-[#92C900]"></div>
                </div>

                <div class="hidden xl:flex justify-end items-end">
                    <a class="translate-y-2 transition hover:opacity-90 rounded-full relative inline-block text-xl font-bold font-red-hat-display text-center uppercase text-white bg-[#27225C] py-2 px-8" href="<?php echo get_home_url(null, '/blog') ?>">
                        Ver tudo
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 xl:grid-cols-2 gap-y-8 gap-x-4 mt-8">

                <!-- loop -->
                <?php
                $args = array(
                    'posts_per_page' => 4,
                    'post_type'      => 'post',
                    'cat_name'       => 'blog',
                    'order'          => 'DESC'
                );

                $blogs = new WP_Query($args);

                if ($blogs->have_posts()) :
                    while ($blogs->have_posts()) : $blogs->the_post();
                ?>
                        <a class="col-span-1 block" href="<?php the_permalink() ?>">
                            <!-- <img class="w-full h-[280px] block" src="<php echo ?>" alt="Salvatoriano" /> -->

                            <?php echo get_thumbnail_custom('w-full block', '280'); ?>

                            <h5 class="text-2xl font-black font-red-hat-display text-[#2C285B] my-6">
                                <!-- 5 livros para descobrir o
                                sentido da vida -->

                                <?php the_title() ?>
                            </h5>

                            <p class="transition hover:scale-90 inline-block text-xs font-bold font-red-hat-display text-center uppercase text-white bg-gradient-to-r from-[#91AC31] to-[#4D8C3F] py-2 px-8">
                                Ler mais
                            </p>
                        </a>
                <?php
                    endwhile;
                endif;

                wp_reset_query();
                ?>
                <!-- end loop -->

                <div class="flex xl:hidden justify-center">
                    <a class="rounded-full relative inline-block text-lg font-bold font-red-hat-display text-center uppercase text-white bg-[#27225C] py-2 px-8" href="#">
                        Ver tudo
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
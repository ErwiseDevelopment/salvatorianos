<section class="bg-[#f0f0f0] mt-20 py-20">

    <div class="container">

        <div class="w-full relative">

            <!-- swiper -->
            <div class="swiper js-swiper-parishes">

                <div class="swiper-wrapper">

                    <!-- loop -->
                    <?php for ($i = 0; $i < 10; $i++) : ?>
                        <a class="swiper-slide" href="#">

                            <div>
                                <img class="w-full h-[280px] object-cover" src="<?php echo get_template_directory_uri() ?>/resources/images/parishes-photo-1.png" alt="Paróquias - Salvatorianos" />
                            </div>

                            <h5 class="text-2xl font-black font-red-hat-display text-center text-[#6D37E8] mt-4">
                                Paróquia Nossa Senhora da Conceição
                            </h5>

                            <p class="font-bold text-center uppercase text-[#8FAB31] mt-2">
                                Chókwe - Moçambique
                            </p>

                            <div class="flex justify-center mt-4">
                                <span class="transition hover:scale-90 inline-block text-[10px] font-bold font-red-hat-display text-center uppercase text-white bg-gradient-to-r from-[#91AC31] to-[#4D8C3F] py-2 px-8">
                                    Conheça
                                </span>
                            </div>
                        </a>
                    <?php endfor; ?>
                    <!-- end loop -->
                </div>
            </div>

            <!-- navigation -->
            <div class="swiper-button-prev swiper-button-prev-parishes js-swiper-button-prev-parishes">
                <img src="<?php echo get_template_directory_uri() ?>/resources/images/icon-arrow-left.png" alt="Seta - Paróquias" />
            </div>

            <div class="swiper-button-next swiper-button-next-parishes js-swiper-button-next-parishes">
                <img src="<?php echo get_template_directory_uri() ?>/resources/images/icon-arrow-right.png" alt="Seta - Paróquias" />
            </div>
            <!-- end swiper -->
        </div>
    </div>
</section>
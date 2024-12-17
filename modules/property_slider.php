<?php
$properties = $m['property_slider'];
$title = $m['title'];
$text = $m['text'];
$above = $m['above_title'];
?>

<section class="relative w-full py-12 grey-bg">
    <div class="container mx-auto px-4">
        <?php if ($title || $text) { ?>
            <div class="mx-auto w-full text-center mb-[30px] lg:mb-[40px] max-w-[615px]">
                <?php if ($above) {
                    $elem->drawAboveTitle($above);
                }
                if ($title) { ?>
                    <h2 class="js-fade-up mb-[10px] lg:mb-[15px] text-[40px] md:text-[50px] lg:text-[60px] xl:text-[65px] 3xl:text-[70px]">
                        <?php echo $title; ?>
                    </h2>
                <?php }
                if ($text) { ?>
                    <div class="js-fade-up text-[18px] lg:text-[20px]">
                        <?php echo $text; ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>

        <!-- Alpine.js Swiper Component -->
        <div
            x-data="{ swiper: null, disablePrev: true, disableNext: false }"
            x-init="
                swiper = new Swiper($el.querySelector('.swiper-container'), {
                    slidesPerView: 1,
                    centeredSlides: false,
                    spaceBetween: 20,
                    loop: false,
                    navigation: {
                        nextEl: $el.querySelector('.button-next'),
                        prevEl: $el.querySelector('.button-prev'),
                    }
                });
            "
            class="relative overflow-hidden"
        >
            <!-- Swiper Container -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($properties as $property) {
                        $id = $property['property']->ID;
                        $short_description = get_field('short_description', $id);
                        $guide_price = get_field('price', $id);
                        $preview_text = get_field('preview_text', $id);
                        $preview_image = get_field('preview_image', $id);
                        $location_terms = get_the_terms($id, 'location');
                        $location = $location_terms ? $location_terms[0]->name : '';
                        ?>
                        <div class="swiper-slide flex flex-col lg:flex-row bg-white shadow-lg rounded-lg">
                            <div class="p-6 lg:w-1/2">
                                <?php if (get_the_title($id)) : ?>
                                    <h2 class="text-3xl font-semibold mb-2"><?php the_title($id); ?></h2>
                                <?php endif; ?>
                                <h3 class="text-lg text-gray-700 mb-4">5 bed Detached House For Sale</h3>
                                <?php if (!empty($location)) : ?>
                                    <p class="font-semibold mb-1">Location</p>
                                    <p class="text-gray-600 mb-4"><?php echo esc_html($location); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($preview_text)) : ?>
                                    <p class="font-semibold mb-1">Property Info</p>
                                    <div class="text-gray-600 mb-4"><?php echo $preview_text; ?></div>
                                <?php endif; ?>
                                <?php if (!empty($guide_price)) : ?>
                                    <p class="italic text-2xl font-semibold mb-1"><?php echo $guide_price; ?></p>
                                    <p class="text-gray-500 mb-6">Guide Price</p>
                                <?php endif; ?>
                                <?php $elem->drawButton(get_the_permalink($id), '', 'view property'); ?>
                            </div>
                            <div class="lg:w-1/2 h-64 lg:h-auto">
                                <?php if (!empty($preview_image)) : ?>
                                    <img src="<?php echo esc_url($preview_image['url']); ?>" alt="<?php echo esc_attr($preview_image['alt']); ?>" class="w-full h-full object-cover rounded-r-lg">
                                <?php else : ?>
                                    <div class="bg-gray-200 w-full h-full flex items-center justify-center text-gray-500">
                                        No Image Available
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="button-right text-right flex w-full mt-[45px] lg:mt-[75px] justify-end">
                <div class="max-w-[120px] flex w-full justify-between">
                    <!-- Custom Prev Button -->
                    <div class="flex items-center z-[3]">
                        <button @click="swiper.slidePrev()" class="w-[50px] h-[50px] border-2 border-[#B08D57] text-[#B08D57] rounded-[5px] button-next bg-brand-primary text-white w-[40px] h-[40px] lg:w-[50px] lg:h-[50px] flex items-center justify-center text-[16px] lg:text-[20px] rounded-[50%] min-h-[40px] min-w-[40px] lg:min-h-[50px] lg:min-w-[50px]">
                            <i class="fa-solid fa-chevron-left text-3xl text-[#B08D57]"></i>
                        </button>
                    </div>

                    <!-- Custom Next Button -->
                    <div class="flex items-center z-[3]">
                        <button @click="swiper.slideNext()" class="w-[50px] h-[50px] border-2 border-[#B08D57] text-[#B08D57] rounded-[5px] button-next bg-brand-primary text-white w-[40px] h-[40px] lg:w-[50px] lg:h-[50px] flex items-center justify-center text-[16px] lg:text-[20px] rounded-[50%] min-h-[40px] min-w-[40px] lg:min-h-[50px] lg:min-w-[50px]">
                            <i class="fa-solid fa-chevron-right text-3xl text-[#B08D57]"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

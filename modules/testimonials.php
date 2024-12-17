<?php
$testimonials = $m['testimonials'];
$title = $m['title'];
$text = $m['text'];
$above = $m['above_title'];
if ($testimonials) {
    ?>
    <section class="testimonials section" x-data="{ swiper: null }"
             x-init="
                swiper = new Swiper($el.querySelector('.swiper-container'), {
                    loop: true,
                    slidesPerView: 1,
                    spaceBetween: 30,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 30,
                    },
                    992: {
                        slidesPerView: 3, // Show 3 slides on larger screens
                        spaceBetween: 30,
                    }
                }
                });
             ">
        <div class="container">
            <?php if ($title || $text) { ?>
                <div class="mx-auto w-full text-center mb-[30px] lg:mb-[40px] max-w-[915px]">
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

            <div class="relative swiper-container testimonial-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($testimonials as $testimonial) {
                        $id = $testimonial['testimonial']->ID;
                        $testimonialText = get_field('testimonial', $id);
                        ?>
                        <div class="h-auto swiper-slide grey-bg p-[30px] md:py-[40px] lg:px-[40px] lg:py-[60px]">
                            <div class="">
                                <?php echo $testimonialText; ?>
                            </div>
                            <p><?php echo get_the_title($id); ?></p>
                        </div>
                        <?php
                    }
                    ?>
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
    <?php
}
?>

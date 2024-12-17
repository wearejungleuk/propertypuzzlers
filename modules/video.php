<?php
$video = $m['video'];
$image = $m['image'];

if ($video) {
    ?>
    <section class="video-section js-fade-up" x-data="{ open: false }">
        <div class="container">
            <!-- Thumbnail/Trigger for Video Lightbox -->
            <div class="relative overflow-hidden pb-[55%] rounded-[30px] lg:rounded-[50px]">
                <button class="w-full h-full cursor-pointer flex items-center justify-center absolute" @click="open = true">
                    <?php $elem->drawImage($image['url'], $image['alt'], 'object-fit-image absolute'); ?>
                    <div class="video__play w-[70px] h-[70px] rounded-[50%] flex items-center justify-center bg-brand-primary absolute z-[4] text-[28px] text-white">
                        <i class="fa-light fa-play"></i>
                    </div>
                </button>
            </div>
        </div>

        <!-- Lightbox Modal -->
        <template x-if="open">
            <div class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-75">
                <div class="relative max-w-3xl w-full">
                    <!-- Close Button -->
                    <button @click="open = false" class="absolute top-0 right-0 m-4 text-white z-[3] w-[50px] h-[50px] rounded-[50%] flex items-center justify-center bg-brand-primary text-white text-[22px]">
                        &times;
                    </button>
                    <!-- Video Lightbox -->
                    <div class="relative w-full h-[80vh] max-h-[80vh] flex items-center justify-center">
                        <video controls autoplay class="w-full h-full max-h-full object-contain">
                            <source src="<?php echo $video['url']; ?>" type="<?php echo $video['mime_type']; ?>">
                        </video>
                    </div>
                </div>
            </div>
        </template>
    </section>
    <?php
}
?>

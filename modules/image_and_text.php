<?php
$title = $m['title'];
$image = $m['image'];
$text = $m['text'];
$id = $m['id'];
$cta = $m['cta'];
$imageSide = $m['image_side'];
$imageCol = ($imageSide === 'left') ? 'md:order-1' : 'md:order-2';
$textCol = ($imageSide === 'left') ? 'md:order-2' : 'md:order-1';
?>
<section <?php echo drawId($id); ?> class="image-and-text section">
        <div class="grid grid-cols-1 md:grid-cols-12 mx-auto w-full max-w-[1920px]">
            <div class="col-span-6 <?php echo $imageCol; ?>">
                <?php
                if ($image) {
                    ?>
                    <div class="image-and-text__image overflow-hidden relative js-fade-up h-full">
                        <?php $elem->drawImage($image['url'], $image['alt'], 'object-fit'); ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="col-span-6 flex items-center <?php echo $textCol; ?> px-[30px] py-[40px]">
                <div class="grey-bg image-and-text__wrap p-[30px] lg:p-[50px] 3xl:p-[80px] image-and-text__wrap--<?php echo $imageSide; ?>">

                <?php
                if ($title) {
                    ?>
                    <div class="image-and-text__title js-fade-up">
                        <h2 class="text-[30px] md:text-[35px] lg:text-[38px] xxl:text-[44px] mb-[10px] lg:mb-[20px]"><?php echo $title; ?></h2>
                    </div>
                    <?php
                }
                ?>
                <div class="image-and-text__text js-fade-up text-[16px] md:text-[18px] lg:text-[22px]">
                    <?php echo $text; ?>
                </div>
                <?php if ($cta) {
                    ?>
                    <div class="flex items-center mt-[40px] js-fade-up">
                        <?php if ($cta) {
                            $elem->drawReadMore($cta['url'], $cta['target'], $cta['title']);
                        }
                        ?>
                    </div>
                <?php
                }
                ?>
                </div>
            </div>
    </div>
</section>
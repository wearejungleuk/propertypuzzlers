<?php
$elem = new ContentElements();
$title = get_field('hero_title') ? get_field('hero_title') : get_the_title();
$image = get_field('hero_image');
$above = get_field('hero_above_title');
$text = get_field('hero_text');
$cta = get_field('hero_cta');
$height = (is_front_page()) ? 'h-[100vh]' : 'h-[500px] lg:h-[700px]';
?>
<section class="hero overflow-hidden relative <?php echo $height; ?>">
    <?php
    if ($image) {
        $elem->drawImage($image['url'], $image['alt'], 'w-full h-full object-cover object-fit absolute top-0 left-0');
    }
    ?>
    <div class="overlay"></div>
    <div class="container h-full flex items-end relative z-[3]">

        <div class="max-w-[500px] xl:max-w-[600px] w-full text-white pb-[50px]">
            <?php if ($above) {
                $elem->drawAboveTitle($above);
            }
            ?>
            <h1 class="text-[50px] md:text-[60px] lg:text-[70px] xl:text-[75px] 3xl:text-[80px]"><?php echo $title; ?></h1>
            <?php if ($text) { ?>
            <div class="text-[18px] md:text-[22px] mt-[15px]"><?php echo $text; ?></div>
            <?php } ?>
            <?php if ($cta) {
                ?>
                <div class="flex mt-[30px] lg:mt-[50px]">
                    <?php
                    $elem->drawButton($cta['url'], $cta['target'], $cta['title']);
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>
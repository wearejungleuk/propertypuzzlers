<?php

class ContentElements {
    public function drawButton($url, $target, $title = null, $classes = null) {
        $title = ($title != '') ? $title : 'Find out more';
        $classes = ($classes != '') ? ' | ' . $classes : '';
        ob_start();
        ?>
        <a class="button <?php echo $classes; ?>" href="<?php echo $url; ?>" target="<?php echo $target; ?>">
            <div class="flex align-items-center"><span><?php echo $title; ?></span><span class="button__arrow"><i class="fa-regular fa-arrow-right button__arrow--first"></i><i class="fa-regular fa-arrow-right button__arrow--second"></i></span></div>
        </a>
        <?php
        ob_end_flush();
    }

    public function drawReadMore($url, $target, $title) {
        $title = ($title != '') ? $title : 'Find out more';
        echo "
		<a class=\"read-more\" href=\"{$url}\" target=\"{$target}\">{$title}</a>
		";
    }
    
    public function drawLearnMore($url, $target, $title) {
        $title = ($title != '') ? $title : 'Learn more';
        echo "
		<a class=\"link--helike learn-more\" href=\"{$url}\" target=\"{$target}\"><span class=\"menu__link-inner\"><span><i class=\"fa-regular fa-arrow-turn-down-right\"></i></span>{$title}</span></a>
		";
    }

    public function drawLearnMoreBlank($title) {
        $title = ($title != '') ? $title : 'Learn more';
        echo "
		<span class=\"link--helike learn-more\"><span class=\"menu__link-inner\"><span><i class=\"fa-regular fa-arrow-turn-down-right\"></i></span>{$title}</span>
		";
    }

    public function drawArrow($url, $target) {
        echo "
		<a class=\"arrow-link\" href=\"{$url}\" target=\"{$target}\"><i class=\"fa-light fa-arrow-up-right arrow-link__first\"></i><i class=\"fa-light fa-arrow-up-right arrow-link__second\"></i></a>
		";
    }

    public function drawArrowSpan() {
        echo "
		<span class=\"arrow-link\"><i class=\"fa-light fa-arrow-up-right arrow-link__first\"></i><i class=\"fa-light fa-arrow-up-right arrow-link__second\"></i></span>
		";
    }

    public function drawImage($url, $alt, $class = null) {
        echo "<img class=\"{$class}\" src=\"{$url}\" alt=\"{$alt}\">";
    }

    public function drawObjectImage($url, $alt, $class = null) {
        echo "<img class=\"u-object-fit {$class}\" src=\"{$url}\" alt=\"{$alt}\">";
    }

    public function drawVideo($url, $mime_type, $class = null) {
        ob_start();
        if ($mime_type === 'video/quicktime') {
            $mime_type = 'video/mp4';
        }
        ?>
        <video class="video <?php echo $class; ?>" autoplay muted loop playsinline>
            <source src="<?php echo $url; ?>" type="<?php echo $mime_type; ?>">
            Your browser does not support HTML5 video.
        </video>
        <?php
        ob_end_flush();
    }

    public function drawAboveTitle($title) {
        echo "<div class='above-title-wrap'><p class=\"above-title\">{$title}</p></div>";
    }

    public function drawAccordion($array) {
        ob_start();
        if ($array) {
            ?>
            <div class="accordion w-full">
                <?php
                $i = 1;
                foreach ($array as $row) {
                    ?>
                    <div class="accordion__item | js-fade-in pb-1">
                        <div class="accordion__item--title | flex justify-content-between align-items-center py-4 lg:py-8">
                            <div class="accordion__item--title-wrap"><h2 class="h4"><?php echo $row['title']; ?></h2></div>
                            <div class="accordion__item--trigger"><span class="plus"></div>
                        </div>
                        <div class="accordion__item--hidden">
                            <div class="accordion__item--hidden-inner py-4 lg:py-6 max-w-6xl">
                                <?php echo $row['text']; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                }
                ?>
            </div>
            <?php
        }
        ob_end_flush();
    }

    public function drawMap($map) {
        ob_start();
        ?>
        <div id="map-canvas">
            <div class="acf-map | js-prlx">
                <div class="marker" data-lat="<?php echo $map['lat']; ?>" data-lng="<?php echo $map['lng']; ?>">
                </div><!-- END map marker -->
            </div><!-- END acf map -->
        </div><!-- END map canvas -->
        <?php
        ob_end_flush();
    }

    public function drawCustomInstagramImages($images) {
        ob_start();
        if ($images) {
            foreach ($images as $img) {
                ?>
                <div class="instagram-section__feed-item | object-fit">
                    <img src="<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
                </div>
                <?php
            }
        }
        ob_end_flush();
    }

    public function drawTitleRows($array) {
        ob_start();
        if ($array) {
            ?>
            <div class="title-rows">
                <h2 class="large-title">
                    <?php
                    $i = 1;
                    foreach ($array as $row) {
                        ?>
                        <div class="title-rows__row title-rows__row--<?php echo $i; ?>">
                            <span class="title-rows__span"><?php echo spanReplaceBrackets($row['row']); ?></span>
                        </div>
                        <?php
                        $i++;
                    }
                    ?>
                </h2>
            </div>
            <?php
        }
        ob_end_flush();
    }
}
<?php
$teamMembers = $m['team_members'];
$title = $m['title'];
$text = $m['text'];
$cta = $m['cta'];
$above = $m['above_title'];
if ($teamMembers) {
    ?>
    <section class="team-members-section py-[2rem] lg:py-[3rem]">
        <div class="container">
            <?php if ($title || $text) {
                ?>
                <div class="mx-auto w-full text-center mb-[30px] lg:mb-[40px] max-w-[615px]">
                    <?php if ($above) {
                        $elem->drawAboveTitle($above);
                    }
                    if ($title) {
                        ?>
                        <h2 class="js-fade-up mb-[10px] lg:mb-[15px] text-[40px] md:text-[50px] lg:text-[60px] xl:text-[65px] 3xl:text-[70px]"><?php echo $title; ?></h2>
                        <?php
                    }
                    if ($text) {
                        ?>
                        <div class="js-fade-up text-[18px] lg:text-[20px]">
                            <?php echo $text; ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
            <div class="team-members grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-[2rem] lg:gap-[3rem]">
                <?php foreach ($teamMembers as $member) {
                    $id = $member['team_member']->ID;
                    $image = get_field('image', $id);
                    $bio = get_field('bio', $id);
                    $name = get_the_title($id);
                    $position = get_field('position', $id);
                    ?>
                    <div
                        class="js-fade-up col-span-1 team-member relative overflow-hidden aspect-[36/43] group"
                        x-data="{ hover: false, bioHeight: 0 }"
                        @mouseenter="hover = true"
                        @mouseleave="hover = false"
                        x-init="$nextTick(() => { bioHeight = $refs.bio.scrollHeight })"
                        @resize.window="bioHeight = $refs.bio.scrollHeight"
                    >
                        <?php if ($image) { ?>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="object-cover w-full h-full transition-all duration-300" :class="{ 'grayscale': hover }">
                        <?php } ?>

                        <!-- Overlay div -->
                        <div class="overlay overlay__bottom absolute w-full bottom-0 left-0 z-[4]"></div>

                        <div class="team_member__bottom z-[4] text-white p-[1rem] absolute w-full bottom-0 left-0">
                            <!-- Title and Position -->
                            <div class="team-member__bottom--top transition-transform duration-300"
                                 :style="hover ? `transform: translateY(-${bioHeight}px); transition-delay: 0ms;` : 'transform: translateY(0); transition-delay: 0ms;'">
                                <?php if ($name) { ?>
                                    <div class="team-member__name">
                                        <p class="text-[1.25rem] tracking-tight uppercase mb-[10px]"><?php echo $name; ?></p>
                                    </div>
                                <?php } ?>

                                <?php if ($position) { ?>
                                    <div class="team-member__position">
                                        <p class="leading-tight font-body tracking-wide uppercase text-[0.688rem]"><?php echo $position; ?></p>
                                    </div>
                                <?php } ?>
                            </div>

                            <!-- Bio Section -->
                            <?php if ($bio) { ?>
                                <div x-ref="bio" class="team-member__bio w-full absolute bottom-0 transition-all duration-500 max-w-calc-100-2rem"
                                     :style="hover ? 'opacity: 1; transform: translateY(-15px); transition-delay: 200ms;' : 'opacity: 0; transform: translateY(100%); transition-delay: 0ms;'">
                                    <?php echo $bio; ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php if ($cta) {
                ?>
                <div class="mt-[40px]">
                    <?php
                    $elem->drawButton($cta['url'], $cta['target'], $cta['title']);
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
    <?php
}

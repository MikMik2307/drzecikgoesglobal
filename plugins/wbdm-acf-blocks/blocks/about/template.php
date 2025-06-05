<?php
    $title = get_field('title');
    $subtitle = get_field('subtitle');
    $text = get_field('text');
    $image = get_field('image');
    $button = get_field('button');
    $anchor = get_field('anchor');

    $wrapper_attributes = get_block_wrapper_attributes();
?>
<section id="<?php echo $anchor ?>" <?php echo $wrapper_attributes; ?>>
        <div class="container wbdm-hero-container">
            <div class="row">
                <div class="col-6">
                    <div class="wbdm-about-img-container">
                        <img class="wbdm-about-img__img" src="<?php echo esc_url($image); ?>" alt="image">
                    </div>
                </div>
                <div class="col-6">
                    <div class="wbdm-about-text-container">
                        <h1 class="wbdm-about-text__title"><?php echo $title; ?></h1>
                        <h2 class="wbdm-about-text__subtitle"><?php echo $subtitle; ?></h2>
                        <div class="wbdm-about-text__content">
                            <?php echo wp_kses_post($text); ?>
                        </div>
                        <a class="wbdm-about-button" href="<?php echo $button["btn_url"];?>"><?php echo $button["button_txt"];?></a>
                    </div>
                </div>
            </div>
        </div>
</section>

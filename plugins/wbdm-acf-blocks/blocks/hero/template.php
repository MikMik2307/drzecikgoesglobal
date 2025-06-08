<?php
    $title = get_field('title');
    $subtitle = get_field('subtitle');
    $description = get_field('about_description');
    $background_img = get_field('background_img');
    $background_color = get_field('background_color');

    $wrapper_attributes = get_block_wrapper_attributes();
?>
<section <?php echo $wrapper_attributes; ?>>
    <div class="container-fluid" style="background:url(<?php echo esc_url($background_img)?>) <?php echo $background_color?>; background-size: cover; background-repeat: no-repeat; background-position: center; height: 60vh;">
        <div class="container wbdm-hero-container">
            <div class="row">
                <div class="col-5 offset-1">
                    <div class="wbdm-text-container" data-aos="zoom-in-up">
                        <h1 class="wbdm-text__title"><?php echo $title; ?></h1>
                        <h2 class="wbdm-text__subtitle"><?php echo $subtitle; ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
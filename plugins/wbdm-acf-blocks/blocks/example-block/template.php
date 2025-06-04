<?php
    $img   = get_field( 'about_img' );
    $title = get_field('about_title');
    $description = get_field('about_description');
    $wrapper_attributes = get_block_wrapper_attributes();
    $icon = CAB_URL . 'img/test.png';
?>
<section <?php echo $wrapper_attributes; ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-lg-5 offset-lg-1">
                <div class="oab-example-block__img">
                    <img src="<?php echo esc_url($img); ?>" alt="about_company">
                </div>
            </div>
            <div class="col-md-10 offset-md-1 offset-lg-0 col-lg-6 col-xl-5 offset-xl-1">
                <h1 class="oab-example-block__title"><?php echo esc_html($title); ?></h1>
                <div class="oab-example-block__description">
                    <?php echo wp_kses($description, array(
                            'a' => array(
                                'href'  => true,
                                'title' => true,
                            ),
                            'div'     => array(),
                            'p'     => array(),
                    ))
                    ?>
                </div>
                <a href="#" id="oab-example-block__btn" class="oab-example-block__btn"><?php echo esc_html__( 'Read more', 'odigo-acf-blocks' ) ?><img class="oab-test-block__icon" src="<?php echo esc_url($icon); ?>" alt="icon"></a>
            </div>
        </div>
    </div>
</section>
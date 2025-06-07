<?php
    $title = get_field('title');
    $subtitle_text_area = get_field('subtitle_text_area');
    $text_text_area = get_field('text_text_area');
    $email_address = get_field('email_address');
    $email_address = get_field('email_address');
    $subtitle_contact_area = get_field('subtitle_contact_area');
    $contact_form = get_field('contact_form');
    $overlay_img = get_field('overlay_img');
    $anchor = get_field('anchor');

    $wrapper_attributes = get_block_wrapper_attributes();
?>
<section id="<?php echo $anchor; ?>" <?php echo $wrapper_attributes; ?>>
        <div class="container" <?php if($overlay_img) echo 'style="background-image:url('.esc_url($overlay_img).'); background-size:100%; background-repeat: no-repeat; background-position: center;"'; ?>>
            <div class="row">
                <div class="col-12">
                    <div class="wbdm-collaboration-title-container">
                        <h2 class="wbdm-collaboration-title__text"><?php echo $title; ?></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="wbdm-collaboration-content-container">
                    <div class="col-6 wbdm-collaboration-content-container__col">
                        <div class="wbdm-collaboration-textarea-container">
                            <h3 class="wbdm-collaboration-textarea-subtitle"><?php echo $subtitle_text_area; ?></h3>
                            <div class="wbdm-collaboration-textarea__text">
                                <?php echo wp_kses_post($text_text_area); ?>
                            </div>
                            <a class="wbdm-collaboration-textarea__email" href="mailto:<?php echo $email_address;?>" target="_blank"><?php echo $email_address;?></a>
                        </div>
                    </div>
                    <div class="col-6 wbdm-collaboration-content-container__col">
                        <div class="wbdm-collaboration-contactarea-container">
                            <h3 class="wbdm-collaboration-contactarea-subtitle"><?php echo $subtitle_contact_area; ?></h3>
                            <?php
                            if ($contact_form) {
                                echo do_shortcode('[contact-form-7 id="' . $contact_form->ID . '"]');
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

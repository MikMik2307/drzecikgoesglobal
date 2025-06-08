<?php
$social_profiles = get_field('social_media_profile');

    $wrapper_attributes = get_block_wrapper_attributes();
?>
<section <?php echo $wrapper_attributes; ?>>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                if ($social_profiles):
                    ?>
                    <div class="wbdm-socialmedia-container">
                        <div class="wbdm-socialmedia-tiles">
                            <?php foreach ($social_profiles as $profile):
                                $image = esc_url($profile['img']);
                                $followers_count  = esc_html($profile['followers_count']);
                                $text  = esc_html($profile['text']);

                                ?>
                                <div class="col-lg-4 col-12">
                                    <div class="wbdm-socialmedia-tile" data-aos="flip-left"  data-aos-delay="200">
                                        <?php if ($image): ?>
                                            <img src="<?php echo $image; ?>" alt="<?php echo $text; ?>" class="wbdm-socialmedia-tile__img" />
                                        <?php endif; ?>

                                        <?php if ($followers_count): ?>
                                            <div class="wbdm-socialmedia-tile-followers-count"><?php echo $followers_count; ?></div>
                                        <?php endif; ?>

                                        <?php if ($text): ?>
                                            <div class="wbdm-socialmedia-tile-text"><?php echo $text; ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
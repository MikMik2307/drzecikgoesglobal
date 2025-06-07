<?php
$title = get_field('title');
$background_img = get_field('background_img');
$logo_carousel = get_field('logo_carousel');

$wrapper_attributes = get_block_wrapper_attributes();
?>
<section <?php echo $wrapper_attributes; ?> <?php if ($background_img) echo 'style="background-image:url(' . esc_url($background_img) . '); background-size:cover; background-repeat: no-repeat; background-position: center;"'; ?>>
    <div class="container-fluid wbdm-featured-companies-container">
        <div class="row">
            <div class="col-12">
                <div class="wbdm-logo-carousel-container">
					<?php if ($title): ?>
                        <div class="wbdm-logo-carousel-title-container">
                            <h2 class="wbdm-logo-carousel-title__text"><?php echo esc_html($title); ?></h2>
                        </div>
					<?php endif; ?>

					<?php if ($logo_carousel): ?>
                        <div class="wbdm-logo-carousel-slider slick-carousel">
							<?php foreach ($logo_carousel as $row):
								$logo_url = $row['logo_img'];
								if (!$logo_url) continue;
								?>
                                <div class="wbdm-logo-carousel-single">
                                    <img src="<?php echo esc_url($logo_url); ?>" alt="Company Logo" style="max-width: 100%; height: auto; object-fit: contain;">
                                </div>
							<?php endforeach; ?>
                        </div>
					<?php else: ?>
                        <p>No logos available.</p>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

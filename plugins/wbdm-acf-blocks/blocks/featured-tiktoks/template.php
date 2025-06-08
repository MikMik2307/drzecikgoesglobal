<?php
$title = get_field('title');
$background_img = get_field('background_img');
$tiktoks = get_field('featured_tiktoks');

$wrapper_attributes = get_block_wrapper_attributes();
?>
<section <?php echo $wrapper_attributes; ?>>
    <div class="container" <?php if($background_img) echo 'style="background-image:url('.esc_url($background_img).'); background-size:100%; background-repeat: no-repeat; background-position: center;"'; ?>>
        <div class="row">
            <div class="col-12">
                <div class="wbdm-featured-tiktoks-container">
                    <?php if ($tiktoks): ?>
                        <div class="wbdm-featured-tiktoks-title-container">
                            <?php if ($title): ?>
                                <h2 class="wbdm-featured-tiktoks-title__text" data-aos="fade-up"><?php echo esc_html($title); ?></h2>
                            <?php endif; ?>
                        </div>
                        <div class="wbdm-featured-tiktoks-thumbnails-container">
                            <div class="tiktok-thumbnails" style="display:flex; gap:20px;" >
	                            <?php
	                            $delay = 0;
	                            $delay_step = 200; // ms between each card
	                            foreach ($tiktoks as $row):
		                            $url = $row['tiktok_link'];
		                            $thumbnail_img = $row['thumbnail'] ?? '';

		                            // Extract video ID from URL
		                            preg_match('/video\/(\d+)/', $url, $matches);
		                            $video_id = $matches[1] ?? null;
		                            if (!$video_id) continue;
		                            ?>
                                    <div class="col-lg-4 col-10 offset-1 offset-lg-0 wbdm-featured-tiktoks-single-tiktok" data-aos="zoom-in" data-aos-delay="<?php echo $delay; ?>">
                                        <div class="tiktok-thumb-wrapper" style="cursor:pointer; max-width: auto; height: 620px" data-video-id="<?php echo esc_attr($video_id); ?>" data-video-url="<?php echo esc_url($url); ?>">
				                            <?php if ($thumbnail_img): ?>
                                                <img src="<?php echo esc_url($thumbnail_img); ?>" alt="TikTok Video Thumbnail" style="width:auto; height: 620px; border-radius: 8px;"/>
				                            <?php else: ?>
                                                <img src="https://cdn-icons-png.flaticon.com/512/3046/3046129.png" alt="TikTok Video Thumbnail" style="width:100%; border-radius: 8px;"/>
				                            <?php endif; ?>
                                        </div>
                                    </div>
		                            <?php
		                            $delay += $delay_step; // Increase delay for next card
	                            endforeach;
	                            ?>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <script>
        (function($){
            $(document).ready(function(){
                $('.tiktok-thumb-wrapper').on('click', function(){
                    var $wrapper = $(this);
                    var videoId = $wrapper.data('video-id');
                    var videoUrl = $wrapper.data('video-url');

                    var embedCode = `
                 <div class="tiktok-embed-wrapper" style="overflow: hidden; max-height: 700px;">
                    <blockquote class="tiktok-embed"
                        cite="${videoUrl}"
                        data-video-id="${videoId}"
                        style="max-width: 605px; min-width: 325px;">
                        <section></section>
                    </blockquote>
                </div>
            `;

                    // Replace the thumbnail with the embed code
                    $wrapper.replaceWith(embedCode);

                    // Wait a short time to ensure DOM is updated
                    setTimeout(function(){
                        // Force reload of TikTok's embed script
                        var script = document.createElement('script');
                        script.src = "https://www.tiktok.com/embed.js?" + new Date().getTime(); // prevent caching
                        script.async = true;
                        document.body.appendChild(script);
                    }, 100);
                });
            });
        })(jQuery);
    </script>
</section>

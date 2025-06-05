<?php
$title = get_field('title');
$background_img = get_field('background_img');
$tiktoks = get_field('featured_tiktoks');

$wrapper_attributes = get_block_wrapper_attributes();
?>
<section <?php echo $wrapper_attributes; ?>>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wbdm-featured-tiktoks-container">
                    <?php if ($tiktoks): ?>
                        <div class="wbdm-featured-tiktoks-title-container">
                            <?php if ($title): ?>
                                <h2 class="wbdm-featured-tiktoks-title__text"><?php echo esc_html($title); ?></h2>
                            <?php endif; ?>
                        </div>
                        <div class="wbdm-featured-tiktoks-thumbnails-container" <?php if($background_img) echo 'style="background-image:url('.esc_url($background_img).'); background-size:100%; background-repeat: no-repeat; background-position: center;"'; ?>>
                            <div class="tiktok-thumbnails" style="display:flex; gap:20px;" >
                                <?php foreach ($tiktoks as $row):
                                    $url = $row['tiktok_link'];
                                    $thumbnail_img = $row['thumbnail'] ?? ''; // get thumbnail from repeater subfield

                                    // Extract video ID from URL
                                    preg_match('/video\/(\d+)/', $url, $matches);
                                    $video_id = $matches[1] ?? null;
                                    if (!$video_id) continue;
                                    ?>
                                    <div class="col-4 wbdm-featured-tiktoks-single-tiktok">
                                        <div class="tiktok-thumb-wrapper" style="cursor:pointer; max-width: auto; height: 500px" data-video-id="<?php echo esc_attr($video_id); ?>" data-video-url="<?php echo esc_url($url); ?>">
                                            <?php if ($thumbnail_img): ?>
                                                <img src="<?php echo esc_url($thumbnail_img); ?>" alt="TikTok Video Thumbnail" style="width:auto; height: 500px; border-radius: 8px;"/>
                                            <?php else: ?>
                                                <img src="https://cdn-icons-png.flaticon.com/512/3046/3046129.png" alt="TikTok Video Thumbnail" style="width:100%; border-radius: 8px;"/>
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
    </div>
    <script>
        (function($){
            $(document).ready(function(){
                $('.tiktok-thumb-wrapper').on('click', function(){
                    var videoId = $(this).data('video-id');
                    var videoUrl = $(this).data('video-url');

                    // Construct the embed code as a string using template literals (backticks)
                    var embedCode = `
                <blockquote class="tiktok-embed"
                    cite="${videoUrl}"
                    data-video-id="${videoId}"
                    style="max-width: 605px; min-width: 325px;">
                    <section></section>
                </blockquote>
            `;

                    // Replace the thumbnail div with the embed code
                    $(this).replaceWith(embedCode);

                    // Reload TikTok embed.js to render new embed
                    $.getScript('https://www.tiktok.com/embed.js');
                });
            });
        })(jQuery);
    </script>

</section>

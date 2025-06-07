<?php
$title = get_field('title');
$background_img = get_field('background_img');
$videos = get_field('featured_videos');

$wrapper_attributes = get_block_wrapper_attributes();
?>
<section <?php echo $wrapper_attributes; ?> <?php if ($background_img) echo 'style="background-image:url(' . esc_url($background_img) . '); background-size:cover; background-repeat: no-repeat; background-position: center;"'; ?>>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wbdm-featured-videos-container">
                    <?php if ($videos): ?>
                        <div class="wbdm-featured-videos-title-container">
                            <?php if ($title): ?>
                                <h2 class="wbdm-featured-videos-title__text"><?php echo esc_html($title); ?></h2>
                            <?php endif; ?>
                        </div>
                        <div class="wbdm-featured-videos-thumbnails-container">
                            <div class="youtube-thumbnails" style="display:flex; gap:20px;">
                                <?php foreach ($videos as $row):
                                    $url = $row['video_link'];

                                    // Extract YouTube video ID from URL
                                    preg_match('/(?:v=|\/)([0-9A-Za-z_-]{11}).*/', $url, $matches);
                                    $video_id = $matches[1] ?? null;
                                    if (!$video_id) continue;

                                    $thumbnail_url = "https://img.youtube.com/vi/{$video_id}/hqdefault.jpg";
                                    ?>
                                    <div class="col-4 wbdm-featured-youtube-single" style="position:relative;">
                                        <div class="youtube-thumb-wrapper"
                                             style="cursor:pointer; height: 250px; overflow:hidden; border-radius:8px; position:relative;"
                                             data-video-id="<?php echo esc_attr($video_id); ?>">
                                            <img src="<?php echo esc_url($thumbnail_url); ?>" alt="YouTube Thumbnail" style="width:100%; height:100%; object-fit:cover; border-radius: 8px;">
                                            <div class="play-button" style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:64px;height:64px;background:url('https://img.icons8.com/ios-filled/100/ffffff/play--v1.png') no-repeat center center;background-size:64px;"></div>
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
</section>

<?php
$title = get_field('title');
$background_img = get_field('background_img');

$api_key = 'AIzaSyARWTQlHVIBKM5pgUEHdYWy_L6vb4ZWINg';
$channel_id = 'UCpkQMzocBFSawUEmNnAWMTg';
$max_results = 100; // Fetch more than 3 in case some are Shorts

// Step 1: Fetch latest videos
$search_url = "https://www.googleapis.com/youtube/v3/search?key=$api_key&channelId=$channel_id&part=snippet,id&order=date&maxResults=$max_results&type=video";
$response = wp_remote_get($search_url);

$raw_videos = [];

if (!is_wp_error($response)) {
	$body = wp_remote_retrieve_body($response);
	$data = json_decode($body, true);

	if (!empty($data['items'])) {
		foreach ($data['items'] as $item) {
			if (isset($item['id']['videoId'])) {
				$raw_videos[] = [
					'video_id' => $item['id']['videoId'],
					'title' => $item['snippet']['title']
				];
			}
		}
	}
}

// Step 2: Filter out Shorts (under 60s)
$filtered_videos = [];

if (!empty($raw_videos)) {
	$video_ids = array_column($raw_videos, 'video_id');
	$ids_param = implode(',', $video_ids);

	$details_url = "https://www.googleapis.com/youtube/v3/videos?key=$api_key&id=$ids_param&part=contentDetails";
	$details_response = wp_remote_get($details_url);

	if (!is_wp_error($details_response)) {
		$details_body = wp_remote_retrieve_body($details_response);
		$details_data = json_decode($details_body, true);

		foreach ($details_data['items'] as $index => $item) {
			$duration_iso = $item['contentDetails']['duration'];
			try {
				$interval = new DateInterval($duration_iso);
				$seconds = ($interval->h * 3600) + ($interval->i * 60) + $interval->s;

				if ($seconds >= 60) {
					$video_id = $item['id'];
					$filtered_videos[] = [
						'video_id' => $video_id,
						'thumbnail' => 'https://img.youtube.com/vi/' . $video_id . '/hqdefault.jpg',
					];
				}
			} catch (Exception $e) {
				continue;
			}

			if (count($filtered_videos) === 3) break; // Stop after 3 valid videos
		}
	}
}

$wrapper_attributes = get_block_wrapper_attributes();
?>

<section <?php echo $wrapper_attributes; ?> <?php if ($background_img) echo 'style="background-image:url(' . esc_url($background_img) . '); background-size:cover; background-repeat:no-repeat; background-position:center;"'; ?>>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wbdm-featured-videos-container">
					<?php if (!empty($filtered_videos)): ?>
                        <div class="wbdm-featured-videos-title-container">
							<?php if ($title): ?>
                                <h2 class="wbdm-featured-videos-title__text" data-aos="fade-up"><?php echo esc_html($title); ?></h2>
							<?php endif; ?>
                        </div>
                        <div class="wbdm-featured-videos-thumbnails-container">
                            <div class="youtube-thumbnails" style="display:flex; gap:20px;">
								<?php
								$delay = 0;
								$delay_step = 200;
								foreach ($filtered_videos as $video):
									?>
                                    <div class="col-12 col-lg-4 wbdm-featured-youtube-single" data-aos="zoom-in" data-aos-delay="<?php echo $delay; ?>" style="position:relative;">
                                        <div class="youtube-thumb-wrapper"
                                             style="cursor:pointer; height: 250px; overflow:hidden; border-radius:8px; position:relative;"
                                             data-video-id="<?php echo esc_attr($video['video_id']); ?>">
                                            <img src="<?php echo esc_url($video['thumbnail']); ?>" alt="YouTube Thumbnail" style="width:100%; height:100%; object-fit:cover; border-radius: 8px;">
                                            <div class="play-button" style="position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);width:64px;height:64px;background:url('https://img.icons8.com/ios-filled/100/ffffff/play--v1.png') no-repeat center center;background-size:64px;"></div>
                                        </div>
                                    </div>
									<?php
									$delay += $delay_step;
								endforeach;
								?>
                            </div>
                        </div>
					<?php else: ?>
                        <p>No long-form videos found.</p>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

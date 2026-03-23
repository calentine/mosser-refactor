<?php

/**
 * Component: Video + Values Section (Manual Group Version)
 */

// 1. Enter the main 'about_video_section' ACF Group container ONCE
if (have_rows('about_video_section')):
    while (have_rows('about_video_section')): the_row();

        // 1. Top Level & Video Fields
        $section_headline = get_sub_field('section_headline') ?: 'Our Core Values';
        $poster           = get_sub_field('video_poster'); // Will handle .webp perfectly
        $video_url        = get_sub_field('video_url');
        $btn_color = get_sub_field('play_btn_color') ?: '#e45a2b';
?>

        <section class="video-values-section">
            <div class="video-values-container">

                <div class="video-side-container">
                    <div class="video-wrapper">
                        <?php if ($video_url): ?>
                            <video id="mosserVideo"
                                poster="<?php echo $poster ? esc_url($poster['url']) : ''; ?>"
                                class="mosser-html5-video">
                                <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
                            </video>

                            <div class="video-overlay-play" onclick="playMosserVideo()">
                                <button class="big-play-button" style="background-color: <?php echo esc_attr($btn_color); ?>;">
                                    <span class="play-triangle"></span>
                                </button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="text-side-container">
                    <h2 class="section-heading"><?php echo esc_html($section_headline); ?></h2>

                    <div class="values-list-wrapper">
                        <?php
                        for ($i = 1; $i <= 5; $i++):
                            $icon = get_sub_field('row_' . $i . '_icon');
                            $text = get_sub_field('row_' . $i . '_text');

                            if (!empty($text)): ?>
                                <div class="value-item">
                                    <?php if (!empty($icon)): ?>
                                        <img src="<?php echo esc_url($icon['url']); ?>"
                                            class="value-list-icon"
                                            alt="<?php echo esc_attr($icon['alt'] ?: $text); ?>">
                                    <?php endif; ?>
                                    <span class="value-list-title"><?php echo esc_html($text); ?></span>
                                </div>
                        <?php endif;
                        endfor; ?>
                    </div>
                </div>

            </div>
        </section>

        <div id="videoModal" class="video-modal">
            <span class="close-modal" onclick="closeMosserVideo()">&times;</span>
            <div class="modal-content">
                <video id="popupVideo" controls>
                    <source src="<?php echo esc_url($video_url); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>

<?php
    endwhile;
endif;
?>
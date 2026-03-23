<?php
// Hero Image Data
$hero_media = get_field('hero_background_media');
$hero_img_url = $hero_media ? esc_url($hero_media['url']) : '';
$hero_img_alt = ($hero_media && $hero_media['alt']) ? esc_attr($hero_media['alt']) : 'Mosser Construction';

// Phrases Logic
$raw_list = get_field('hero_phrases_list');
$phrases_array = $raw_list ? explode(PHP_EOL, $raw_list) : [];
$phrases_array = array_filter(array_map('trim', $phrases_array));
?>

<section class="hero-media-container">
    <?php if ($hero_img_url): ?>
        <img src="<?php echo $hero_img_url; ?>" class="hero-bg-image" alt="<?php echo $hero_img_alt; ?>">
    <?php endif; ?>

    <div class="hero-content-overlay">
        <div class="phrase-container">
            <?php if (!empty($phrases_array)): ?>
                <?php foreach ($phrases_array as $index => $phrase): ?>
                    <h1 class="hero-title-small" data-index="<?php echo $index; ?>">
                        <?php echo esc_html($phrase); ?>
                    </h1>
                <?php endforeach; ?>
            <?php else: ?>
                <h1 class="hero-title-small" data-index="0">Mosser Construction</h1>
            <?php endif; ?>
        </div>
        <div class="orange-accent-line"></div>
    </div>
</section>
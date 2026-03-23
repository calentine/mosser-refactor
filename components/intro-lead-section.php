<?php
$intro = get_field('intro_lead_section');
if ($intro): 
    $small_text = $intro['small_headline'];
    $main_text  = $intro['main_headline'];
    $desc_text  = $intro['description'];
?>
<section class="intro-lead-section">
    <div class="intro-lead-container">
        
        <?php if ($small_text): ?>
            <span class="intro-kicker"><?php echo esc_html($small_text); ?></span>
        <?php endif; ?>

        <div class="intro-main-wrapper">
            <h2 class="intro-main-title"><?php echo esc_html($main_text); ?></h2>
        </div>

        <?php if ($desc_text): ?>
            <p class="intro-description"><?php echo esc_html($desc_text); ?></p>
        <?php endif; ?>

    </div>
</section>
<?php endif; ?>
<section class="values-section">
    <div class="values-container">
        <?php
        // 1. Enter the 'values_section' Group container from your ACF setup
        if (have_rows('values_section')):
            while (have_rows('values_section')): the_row();

                // 2. We define the prefixes to loop through your sub-fields
                $columns = ['industry', 'people', 'community'];

                foreach ($columns as $prefix) :
                    // 3. Fetch sub-fields (Ensure ACF Image is set to "Image Array")
                    $icon    = get_sub_field($prefix . '_icon');
                    $title   = get_sub_field($prefix . '_title');
                    $content = get_sub_field($prefix . '_description');

                    if ($title) :
        ?>
                        <div class="value-card">
                            <div class="reveal-content js-reveal reveal-diagonal">
                                <?php if ($icon && is_array($icon)) : ?>
                                    <img src="<?php echo esc_url($icon['url']); ?>"
                                        class="value-icon"
                                        alt="<?php echo esc_attr($icon['alt']); ?>">
                                <?php endif; ?>

                                <h3><?php echo esc_html($title); ?></h3>
                                <p><?php the_sub_field($prefix . '_description'); ?></p>
                            </div>
                        </div>
        <?php
                    endif;
                endforeach;

            endwhile;
        endif;
        ?>
    </div>
</section>
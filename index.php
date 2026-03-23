<?php 
/**
 * The Front Page Template
 */
get_header();

// Component: Hero Section
get_template_part('components/hero-section');

// Component: Values Section (Industry/People/Community)
get_template_part('components/values-section');

get_template_part('components/video-values-section');

get_template_part('components/intro-lead-section');

get_footer();
?>
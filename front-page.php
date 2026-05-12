<?php
/**
 * Front page template — child override.
 * Mirrors the parent's structure but routes the hero partial to the child
 * theme so we can rebuild it (split layout + ACF hero_image). All other
 * sections still come from the parent partials.
 */
get_header(); ?>

    <!-- HERO -->
    <?php require get_stylesheet_directory() . '/includes/partial/hero.php'; ?>
    <!-- END HERO -->

    <!-- EVENTS -->
    <?php
    $events = function_exists('tribe_get_events') ? tribe_get_events([
        'posts_per_page' => 5,
        'start_date'     => 'now',
    ]) : [];
    if (!empty($events)) :
        require get_template_directory() . '/includes/partial/events-cards.php';
    endif;
    ?>
    <!-- END EVENTS -->

    <!-- MISSION GRID -->
    <?php require get_template_directory() . '/includes/partial/mission-grid.php'; ?>
    <!-- END MISSION GRID -->

    <!-- BANNIERE -->
    <?php require get_template_directory() . '/includes/partial/cta-banner.php'; ?>
    <!-- END BANNIERE -->

    <!-- CTA -->
    <?php require get_template_directory() . '/includes/partial/cta-big.php'; ?>

    <!-- 2 blocks -->
    <?php require get_template_directory() . '/includes/partial/frontpage-two-cards.php'; ?>

    <!-- Actualités -->
    <?php require get_template_directory() . '/includes/partial/news-cards-feed.php'; ?>

    <!-- Composition -->
    <?php require get_template_directory() . '/includes/partial/partners-feed.php'; ?>

<?php get_footer(); ?>

<?php get_header(); ?>
<div class="bg-darkblue breadcrumbs-wrapper">
    <ul class="breadcrumbs container">
        <?php
        if (function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('', '');
        }
        ?>
    </ul>
</div>
<div class="layout layout-2-col container">
    <div class="nav-wrapper">
        <?php get_sidebar('left'); ?>
        <?php
        wp_nav_menu(array(
            'theme_location' => 'menu-lateral-5',
            'items_wrap' => '<nav class="sidebar-nav"><ul>%3$s</ul></nav>',
        )); ?>
    </div>
    <article>
        <?php if (is_user_logged_in()) { ?>
            <header class="page-header">
                <h1 class="page-title left">Tous les contenus du cnp</h1>
                <div class="page-subtitle">
                    <?php the_field('page_excerpt'); ?>
                </div>
            </header>
            <div class="layout-archive">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        include
                            get_template_directory() . '/includes/loops/loop-post-archive.php';
                    } // end while

                } // end if
                ?>
            </div>

            <div class="pagination">
                <?php the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('Page précédente', 'textdomain'),
                    'next_text' => __('Page suivante', 'textdomain'),
                ));
                ?>
            </div>
        <?php
        } else {
            echo '<header class="page-header"><h1 class="page-title left">Contenu restreint</h1></header>';
            echo '<div class="page-content"><p>Vous n&#39;avez pas accès au contenu merci de <a href="/login/">vous connecter</a></p></div>';
        }
        ?>
    </article>
</div>
<?php get_footer(); ?>
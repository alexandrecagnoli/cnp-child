<?php
/*
    Template Name: Menu 5 gauche
    */
?>
<?php get_header(); ?>
<div class="breadcrumbs-wrapper">
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
        <header class="page-header">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <div class="page-subtitle">
                <?php the_field('page_excerpt'); ?>
            </div>
        </header>
        <div class="page-content">
            <?php the_content(); ?>
        </div>
        <?php
        if (have_rows('related_links')) :
            echo '<div class="card card-links">';
            echo '<div class="item-title"><i class="fa-solid fa-file"></i> Liens utiles</div>';
            echo '  <ul class="list-arrow">';
            while (have_rows('related_links')) : the_row();
                $related_link_text = get_sub_field('related_link_text');
                $related_link_url = get_sub_field('related_link_url');
                $is_blank =  get_sub_field('is_blank');
                $target;
                if ($is_blank == 1)
                    $target = 'target="_blank"';
                echo '<li><a href="' . $related_link_url . '" ' . $target . '>' . $related_link_text . '</a></li>';
            endwhile;
            echo '</ul>';
            echo '</div>';
        endif;
        ?>
    </article>
</div>
<?php get_footer(); ?>
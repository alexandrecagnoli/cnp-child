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
<div class="layout layout-2-col-blog container">

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
        if (have_rows('repeateur_files')) :
            echo '<div class="card card-links">';
            echo '<div class="item-title"><i class="fa-solid fa-file"></i>Documents</div>';
            echo '  <ul class="list-arrow">';
            while (have_rows('repeateur_files')) : the_row();
                $file_text = get_sub_field('file_text');
                $file_link = get_sub_field('file_link');
                $file_link_url = $file_link['url'];
                $is_blank =  get_sub_field('is_blank');
                $target;
                if ($is_blank == 1)
                    $target = 'target="_blank"';
                echo '<li><a href="' . $file_link_url . '" target="_blank" >' . $file_text . '</a></li>';
            endwhile;
            echo '</ul>';
            echo '</div>';
        endif;
        ?>
    </article>
    <aside class="sidebar">
        <?php get_sidebar(); ?>
    </aside>
</div>
<?php
/*
    Template Name: Login half
    */

get_header();
$login_bg = get_field('login_bg');

?>
<section class="layout layout-2-col section-login nomargin nopadding" style="background-image: url('<?= $login_bg['url'] ?>');">

    <span class="separator flex-1"></span>
    <article class="section-content main_secondary_lighter flex-1 ">
        <a type="button" class="readmorelink" onclick="history.back();"> Retour </a>
        <div class="bg-white block-login">
            <header class="page-header">
                <h1 class="page-title center"><?php the_title(); ?></h1>
            </header>
            <div class="page-content">
                <?php the_content(); ?>
            </div>
        </div>
    </article>
</section>
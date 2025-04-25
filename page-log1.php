<?php
/*
    Template Name: Login full
    */

get_header();
?>
<section class="layout container section-login">
    <button type="button" class="btn btn-primary" onclick="history.back();"> Retour </button>
    <article class="bg-white block-login">
        <header class="page-header">
            <h1 class="page-title center"><?php the_title(); ?></h1>
        </header>
        <div class="page-content">
            <?php the_content(); ?>
        </div>
    </article>
</section>
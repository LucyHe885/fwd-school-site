<?php
/**
 * Template Name: Generic Page
 * Description: A template for all generic pages on the website.
 */

get_header(); 
?>

<div class="generic-page">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
       
            <h1><?php the_title(); ?></h1>

            <div class="page-content">
                <?php the_content(); ?>
            </div>
            <?php
        endwhile;
    else :
        echo '<p>No content found.</p>';
    endif;
    ?>
</div>

<?php
get_footer(); 
?>
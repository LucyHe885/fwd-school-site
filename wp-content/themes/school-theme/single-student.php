<?php
/**
 * Template Name: Single Student
 */

get_header(); 
?>

<div class="single-student">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <div class="student-image"><?php the_post_thumbnail('student-large'); ?></div>
        <div class="student-content"><?php the_content(); ?></div>
        <div class="student-categories">
            <strong>Speciality:</strong>
            <?php
            $terms = get_the_terms(get_the_ID(), 'student_category');
            if (!empty($terms)) {
                foreach ($terms as $term) {
                    echo '<a href="' . get_term_link($term) . '">' . esc_html($term->name) . '</a> ';
                }
            } else {
                echo 'No category assigned';
            }

            
            ?>
        </div>
    <?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>


<?php
/**
 * Template Name: Single Student
 * Description: A template for displaying individual student posts.
 */
<?php
get_header(); 
?>

<div class="single-student">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            ?>
       
            <h1><?php the_title(); ?></h1>

       
            <div class="student-featured-image">
                <?php the_post_thumbnail('student-large'); ?>
            </div>

       
            <div class="student-content">
                <?php the_content(); ?>
            </div>

   
            <div class="student-categories">
                <?php
                $terms = get_the_terms(get_the_ID(), 'student_category');
                if ($terms && !is_wp_error($terms)) :
                    $term_names = array();
                    foreach ($terms as $term) {
                        $term_names[] = $term->name;
                    }
                    echo 'Categories: ' . implode(', ', $term_names);
                endif;
                ?>
            </div>
            <?php
        endwhile;
    else :
        echo '<p>No student found.</p>';
    endif;
    ?>
</div>

<?php
get_footer(); 
?>
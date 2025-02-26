<?php
/**
 * Template Name: Student Category
 * Description: A template for displaying students by category.
 */
<?php
get_header(); 
?>

<div class="student-category">
    <?php

    $term = get_queried_object();
    if ($term) :
        ?>
        <h1><?php echo $term->name; ?></h1>
        <?php
    endif;

   
    $args = array(
        'post_type' => 'student',
        'tax_query' => array(
            array(
                'taxonomy' => 'student_category',
                'field' => 'slug',
                'terms' => $term->slug,
            ),
        ),
        'posts_per_page' => -1, 
        'orderby' => 'title',
        'order' => 'ASC',
    );
    $students_query = new WP_Query($args);

    if ($students_query->have_posts()) :
        while ($students_query->have_posts()) : $students_query->the_post();
            ?>
            <div class="student-item">
              
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('student-thumbnail'); ?>
                </a>

     
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No students found in this category.</p>';
    endif;
    ?>
</div>

<?php
get_footer();
?>
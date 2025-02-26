<?php
/**
 * Template Name: Students List
 * Description: A template to list all student posts in alphabetical order by their first name.
 */
<?php
get_header(); 
?>

<div class="students-list">
    <?php
 
    $args = array(
        'post_type' => 'student',
        'posts_per_page' => 100, 
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

         
                <div class="student-categories">
                    <?php
                    $terms = get_the_terms(get_the_ID(), 'student_category');
                    if ($terms && !is_wp_error($terms)) :
                        $term_names = array();
                        foreach ($terms as $term) {
                            $term_names[] = $term->name;
                        }
                        echo implode(', ', $term_names);
                    endif;
                    ?>
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No students found.</p>';
    endif;
    ?>
</div>

<?php
get_footer(); 
?>

<?php the_post_thumbnail('student-thumbnail'); ?>
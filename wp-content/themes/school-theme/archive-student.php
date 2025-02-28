<?php
/**
 * Template Name: Students List
 */

get_header();
?>

<div class="students-list">
    <h1>All Students</h1>

    <?php
    $args = array(
        'post_type'      => 'student',
        'posts_per_page' => 100,
        'orderby'        => 'title',
        'order'          => 'ASC',
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            ?>
            <div class="student-item">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('student-medium'); ?>
                </a>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No students found.</p>';
    endif;
    ?>
</div>

<?php get_footer(); ?>

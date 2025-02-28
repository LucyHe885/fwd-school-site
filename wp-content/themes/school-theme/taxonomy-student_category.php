<?php
/**
 * Template Name: Student Category Archive
 */

get_header(); 
$term = get_queried_object();
?>

<div class="student-category">
    <h1><?php echo esc_html($term->name); ?></h1>

    <?php
    $query = new WP_Query(array(
        'post_type'      => 'student',
        'tax_query'      => array(
            array(
                'taxonomy' => 'student_category',
                'field'    => 'slug',
                'terms'    => $term->slug,
            ),
        ),
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
    ));

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            ?>
            <div class="student-item">
                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('student-medium'); ?></a>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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

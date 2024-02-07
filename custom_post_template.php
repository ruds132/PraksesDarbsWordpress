<?php
/*
Template Name: Custom Posts Template
*/
get_header();
?>

<div class="container mt-4 min-vh-100">

    <form method="post" action="">
        <?php
        $terms = get_terms([
            'taxonomy'   => 'Overwatch Heros',
            'hide_empty' => false
        ]);
        foreach ($terms as $term) :
        ?>
            <label>
                <input type="checkbox" name="overwatch_heroes[]" value="<?php echo $term->slug; ?>">
                <?php echo $term->name; ?>
            </label>
        <?php endforeach; ?>
        <button type="submit" name="filter_posts">Apply</button>
    </form>
    <?php
    $args = array(
        'post_type'      => 'custom-post-type',
        'posts_per_page' => -1,
        'orderby' => 'title',
        'order'   => 'ASC',
    );
    if (isset($_POST['filter_posts'])) {
        $selected_heroes = isset($_POST['overwatch_heroes']) ? $_POST['overwatch_heroes'] : array();

        if (!empty($selected_heroes)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'Overwatch Heros',
                    'field'    => 'slug',
                    'terms'    => $selected_heroes,
                ),
            );
        }
    }
    $query = new WP_Query($args);
    ?>
    <div class="row justify-content-center mt-4">
        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb-4">
                    <div class="card">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title_attribute(); ?>" class="card-img-top img-fluid">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                        </div>
                    </div>
                </div>
            <?php endwhile;
        else : ?>
            <div class="col-md-12">
                <p>No posts found</p>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer(); ?>

<?php get_header(); ?>

<div class="container mt-4">
    <div class="row">
        <div class="custom-post-type-posts">
            <?php
            $custom_post_type_query = new WP_Query(array(
                'post_type' => 'custom-post-type',
                'posts_per_page' => -1, // Display all posts
            ));

            while ($custom_post_type_query->have_posts()) : $custom_post_type_query->the_post();
            ?>
                <div class="post-item">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="post-thumbnail">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('thumbnail', array('class' => 'img-fluid'));
                        }
                        ?>
                    </div>
                    <div class="post-content">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

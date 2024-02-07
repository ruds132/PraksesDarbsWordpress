<?php
get_header();
?>
<div class="container mt-4 min-vh-100">
    <div class="row ">
    <?php if (have_posts()) : while (have_posts()) : the_post(); 
     if (is_single()) {
    ?>
    <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail ">
                            <?php the_post_thumbnail('large', array('class' => 'img-fluid mb-3')); ?>
                        </div>
                    <?php endif; ?>
                    <h2><?php the_title(); ?></h2>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } else {
    ?>
    <div class="col-xl-4 col-12 col-lg-6 mb-4">  
        <div class="card rounded shadow border-0 h-100">  
            <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php the_post_thumbnail_url('thumbnail')?>" alt="" class="p-4 rounded card-img-top">
                </a>
            <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title"><?php the_title(); ?></h5>
                <p class="card-text "><?php the_excerpt(); ?></p>
                <p class="card-text"><?php the_category(); ?></p>
                
            </div>
        </div>
    </div>
    <?php
    }
    endwhile; endif; ?>
    </div>
</div>
<?php
get_footer();

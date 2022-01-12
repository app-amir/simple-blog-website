<?php 
get_header(); ?>

<?php  $blog_category = get_queried_object(); 
    
    $category_name = $blog_category->name; ?>

    <h1><?php echo $category_name; ?></h1>

    <div class="blog-wrapper">
        <div class="blog-container">

            <?php $taxonomy = 'category'; 
                $args=array(
                    'tax_query' => array( 
                        array(

                            'taxonomy' => $taxonomy,
                            'field'    => 'id',
                            'terms'    => $blog_category,
                        ),
                    ),
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'order' => 'ASC',
                );

                $my_query = new WP_Query( $args );
                
                if( $my_query->have_posts() ) :
                    
                    while ( $my_query->have_posts() ) :
                        
                        $my_query->the_post();
                                    
                        if ( has_post_thumbnail() ) :
                                        
                            $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium_large' ); ?>

                            <a style="background-image: url('<?php echo esc_url( $backgroundImg[0] ); ?>')" href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>"></a>

                        <?php else: ?>

                            <a style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/img/locations.jpg)" href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>"></a>

                        <?php endif; ?>

                        <a href="<?php the_permalink(); ?>" class="blog-description">
                            <span class="subhead-accent"><?php the_time("M j, Y"); ?></span>
                            <h3><?php the_title(); ?></h3>
                            <div><?php the_excerpt(); ?></div>
                        </a>

                    <?php endwhile;
                    
                endif; 
                
            wp_reset_postdata(); ?>
        
        </div>
    </div>

<?php get_footer();
<?php
/**
 * Template Name: Blog Post
 */
get_header(); ?>

<div class="wrapper">
    <div class="blog-container"><?php
        
        // Pagination Paged
        $page_no = ( get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;

        // WP_Query arguments
        $args = array(
            'post_type'         =>'post',
            'posts_per_page'    => 6,
            'paged'             => $page_no,
        );

        $the_query = new WP_Query( $args );
                
        if( $the_query->have_posts() ) :

            while ( $the_query->have_posts() ) : $the_query->the_post();

            $thumbnail_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' ); 

            if( $thumbnail_img ) :
                $post_thumbnail = $thumbnail_img[0];
            else :
                $post_thumbnail = get_stylesheet_directory_uri(). '/assets/img/default-thumbnail.jpg';
            endif; ?>
            <span style="background-image: url(<?php echo esc_url( $post_thumbnail ); ?>);"> </span>

            <?php $category_name = get_the_category();
                        
            foreach( $category_name as $name ) : ?>

                <a href="<?php echo esc_url( get_category_link( $name ) ); ?>" class="blog-cat-title"><?php echo esc_html( $name->cat_name );?>,</a>
            
            <?php endforeach; ?>

            <a href="<?php the_permalink(); ?>" class="blog-description">

                <span class="subhead-accent"><?php the_time("M j, Y"); ?></span>
                <h3><?php the_title(); ?></h3>
                <div><?php the_excerpt(); ?></div>
                <div><?php //the_content(); ?></div>
            </a>
            <?php endwhile;
        endif; ?>

        <div class="pagination-wrapper">
            <?php 
            // Pagination
            $total_pages = $the_query->max_num_pages;

            if ( $total_pages > 1 ) :

                $current_page = max( 1, get_query_var('paged') );

                echo SWB_paginate_links( array(
                    
                    'mid_size'  => 1,
                    'format'    => 'page/%#%', // Page Formate
                    'current'   => $page_no,
                    'prev_text' => __('<i class="far fa-chevron-left"></i>'),
                    'next_text' => __('<i class="far fa-chevron-right"></i>'),
                    'total'     => $the_query->max_num_pages,
                    'end_size'  => 1
                ) );
                
            endif; ?>
        </div>
        <?php wp_reset_postdata(); ?>

    </div>
</div>

<?php get_footer(); ?>
<?php get_header(); ?>

<div class="wrapper">
    <div class="blog-container">
        <h1><?php esc_html_e( 'This is Blog Tile', 'sbw' )?></h1><h2><?php the_title(); ?></h2>
        <div><h1><?php esc_html_e( 'This is WP_Content!', 'sbw' )?></h1><?php the_content(); ?></div>
        <div><h1><?php esc_html_e( 'This is WP_Excerpt!', 'sbw' )?></h1><?php the_excerpt(); ?></div>
        <?php $thumbnail_img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'medium' ); 

        if( $thumbnail_img ) :
            $post_thumbnail = $thumbnail_img[0];
        else :
            $post_thumbnail = get_stylesheet_directory_uri(). '/assets/img/default-thumbnail.jpg';
        endif; ?>
        <span style="background-image: url(<?php echo esc_url( $post_thumbnail ); ?>);"> </span>

    </div>
</div>

<?php get_footer(); ?>
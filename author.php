<?php get_header(); ?>

<div id="content" class="narrowcolumn">

    <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
    
    <?php //var_dump( $curauth ); ?>

    <h2><?php echo esc_html_e( 'About: ', 'sbw' ) . $curauth->nickname; ?></h2>
    <h6><?php esc_html_e( 'Website: ', 'sbw' ) ?><a href=" <?php echo $curauth->user_url; ?>"> <?php echo $curauth->user_url; ?></a></h6>
    
    <h6><?php echo esc_html_e( 'Profile:', 'sbw' ); ?> <?php echo $curauth->user_description; ?></h6>
    <h5><?php echo esc_html_e( 'Posts by', 'sbw' ) . $curauth->nickname; ?>:</h5>

    <?php if ( have_posts() ) : 
    
        while ( have_posts() ) : the_post(); ?>

        <br><a href="<?php the_permalink() ?>" ><?php the_title(); ?></a>
        <h5><?php the_time('d M Y') . esc_html_e( 'in ', 'sbw' ) . the_category(' & ');?></h5>
        
        <?php endwhile; 
    
    else : ?>
        <h6><?php echo esc_html_e( 'No posts by this author.', 'sbw' )?></h6>

    <?php endif; ?>

</div>
<?php get_footer(); ?>
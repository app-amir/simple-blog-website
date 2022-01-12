<?php
/**
 * Template Name: Authors
 */
get_header();
// Get all users order by amount of posts
$allUsers = get_users('orderby=post_count&order=DESC');
$users = array();

foreach( $allUsers as $currentUser ):
	if( !in_array( 'subscriber', $currentUser->roles ) ) :
		$users[] = $currentUser;
    endif;
endforeach; ?>
<?php get_header(); ?>
    <section class="content" role="main"><?php 
        printf('<h1>%s</h1>', the_title() );
		foreach( $users as $user ) : ?>
            <div class="author">
                <div class="authorAvatar">
                    <?php echo get_avatar( $user->user_email, '128' ); ?>
                </div>
                <div class="authorInfo">
                    <h2 class="authorName"><?php echo $user->display_name; ?></h2>
                    <p class="authorDescription"><?php echo get_user_meta( $user->ID, 'description', true); ?>
                        <p class="authorLinks"><a href="<?php echo get_author_posts_url( $user->ID ); ?>">View Author Links</a>
                            <p class="socialIcons">
                                <ul><?php
                                    $website = $user->user_url;
                                    if( $user->user_url != '' ){
                                        printf('<li><a href="%s">%s</a></li>', $user->user_url, 'Website');
                                    } ?>
                                </ul>
                            </p>
                        </p>
                    </p>

                </div>
            </div><?php
		endforeach; ?>
    </section>
<?php get_footer(); ?>
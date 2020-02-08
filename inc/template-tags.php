<?php
/**
 * Custom template tags for this theme
 *
 * @package WordPress
 * @subpackage EdxStarter
 * @since 1.0.0
 */

if ( ! function_exists( 'edxstarter_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function edxstarter_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published original-date" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="posted-on">%1$s<a href="%2$s" rel="bookmark">%3$s</a></span>',
			'<i class="fas fa-stopwatch"></i>',
			esc_url( get_permalink() ),
			$time_string // phpcs:ignore
		);
	}
endif;

if ( ! function_exists( 'edxstarter_posted_by' ) ) :
	/**
	 * Prints HTML with meta information about theme author.
	 */
	function edxstarter_posted_by() {
		printf(
			/* translators: 1: SVG icon. 2: Post author, only visible to screen readers. 3: Author link. */
			'<span class="byline">%1$s<span class="screen-reader-text">%2$s</span><span class="author vcard"><a class="url fn n" href="%3$s">%4$s</a></span></span>',
			'<i class="fas fa-user-astronaut"></i>',
			esc_html__( 'Posted by', 'edxstarter' ),
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}
endif;

if ( ! function_exists( 'edxstarter_comment_count' ) ) :
	/**
	 * Prints HTML with the comment count for the current post.
	 */
	function edxstarter_comment_count() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			echo '<i class="fas fa-comment-dots"></i>';

			/* translators: %s: Post title. Only visible to screen readers. */
			comments_popup_link( sprintf( __( 'Leave a comment<span class="screen-reader-text"> on %s</span>', 'edxstarter' ), get_the_title() ) );

			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'edxstarter_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function edxstarter_entry_footer() {

		// Hide author, post date, category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			// Posted by.
			if ( ! is_singular() ) {
				edxstarter_posted_by();
			}

			// Edit post link.
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Post title. Only visible to screen readers. */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'edxstarter' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link"><i class="fas fa-pencil-alt"></i>',
				'</span>'
			);

			echo '<br />';

			/* translators: Used between list items, there is a space after the comma. */
			$categories_list = get_the_category_list( __( ', ', 'edxstarter' ) );
			if ( $categories_list ) {
				printf(
					/* translators: 1: SVG icon. 2: Posted in label, only visible to screen readers. 3: List of categories. */
					'<span class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>',
					'<i class="fas fa-archive"></i>',
					__( 'Posted in', 'edxstarter' ),
					$categories_list
				); // WPCS: XSS OK.
			}

			if ( ! is_singular() ) {

				// Posted on.
				edxstarter_posted_on();

				// Comment count.
				edxstarter_comment_count();

			}

			if ( is_singular() ) {

				echo '<br />';

				/* translators: Used between list items, there is a space after the comma. */
				$tags_list = get_the_tag_list( '', __( ', ', 'edxstarter' ) );
				if ( $tags_list ) {
					printf(
						/* translators: 1: SVG icon. 2: Posted in label, only visible to screen readers. 3: List of tags. */
						'<span class="tags-links">%1$s<span class="screen-reader-text">%2$s </span>%3$s</span>',
						'<i class="fas fa-tag"></i>',
						__( 'Tags:', 'edxstarter' ),
						$tags_list
					); // WPCS: XSS OK.
				}
			}

			// Author avatar.
			if ( ! is_singular() ) {
				printf(
					'<span class="author-avatar"><a href="%1$s"><img src="%2$s" /></a></span>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					esc_url( get_avatar_url( get_the_author_meta( 'ID' ) ) )
				);
			}
		}

	}
endif;

if ( ! function_exists( 'edxstarter_sidebar_meta' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function edxstarter_sidebar_meta() {

		// Posted by.
		echo '<span class="pre-byline">' . esc_html__( 'Written by', 'edxstarter' ) . '</span><br />';
		edxstarter_posted_by();
		echo '<br />';

		// Edit post link.
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Post title. Only visible to screen readers. */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'edxstarter' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="edit-link"><i class="fas fa-pencil-alt"></i>',
			'</span>'
		);

		// Author avatar.
		printf(
			'<span class="author-avatar"><a href="%1$s"><img src="%2$s" /></a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_url( get_avatar_url( get_the_author_meta( 'ID' ) ) )
		);

	}

endif;

/**
 * Meta for the top of Single Posts.
 */
function edxstarter_single_top_meta() {

	/* translators: Used between list items, there is a space after the comma. */
	$categories_list = get_the_category_list( __( ', ', 'edxstarter' ) );
	if ( $categories_list ) {
		printf(
			/* translators: 1: SVG icon. 2: Posted in label, only visible to screen readers. 3: List of categories. */
			'<span class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>',
			'<i class="fas fa-archive"></i>',
			__( 'Posted in', 'edxstarter' ),
			$categories_list
		); // WPCS: XSS OK.
	}

	edxstarter_posted_on();

}

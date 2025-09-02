<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
        <h2 class="comments-title">
			<?php
			$ifchor_comment_count = get_comments_number();
			if ( '1' === $ifchor_comment_count ) {
				printf(
				/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'ifchor' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf(
				/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $ifchor_comment_count, 'comments title', 'ifchor' ) ),
					number_format_i18n( $ifchor_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
        </h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

        <ol class="comment-list">
			<?php
			wp_list_comments(
				[
					'style'      => 'ol',
					'short_ping' => false,
					'callback'   => 'ifchor_comment_list',
				]
			);
			?>
        </ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
            <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'ifchor' ); ?></p>
		<?php
		endif;

	endif; // Check for have_comments().

	$ifchor_comment_fields = [];

	$ifchor_comment_fields['author'] = sprintf( '<div class="comment-form-row"><div class="comment-form-field"><label for="author">%s <span class="required">*</span></label><input id="author" name="author" type="text" value="" size="30" maxlength="245" required="required"></div>', __( 'Name', 'ifchor' ) );
	$ifchor_comment_fields['email']  = sprintf( '<div class="comment-form-field"><label for="email">%s <span class="required">*</span></label><input id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" required="required"></div></div>', __( 'Email', 'ifchor' ) );

	$ifchor_comment_form_args = [
		'fields'      => $ifchor_comment_fields,
		'title_reply' => __( 'Leave a comment', 'ifchor' ),
		'class_form'  => esc_attr( 'ifchor-comment-form' ),
	];

	comment_form( $ifchor_comment_form_args );
	?>

</div><!-- #comments -->
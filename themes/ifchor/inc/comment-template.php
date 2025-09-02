<?php

function ifchor_comment_list( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>

    <li id="li-comment-<?php comment_ID(); ?>" <?php comment_class(); ?> >
		<?php if ( $comment->comment_approved == '0' ): ?>
            <em><?php esc_html_e( 'Your comment is awaiting moderation.', 'ifchor' ); ?></em>
		<?php endif; ?>

        <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <div class="ifchor-comment-box">

                <div class="ifchor-comment-box__img">
					<?php echo get_avatar( $comment, 70, '', 'author' ); ?>
                </div>

                <div class="ifchor-comment-box__content">
                    <div class="ifchor-comment-box__meta">
                        <div class="some">
                            <div class="ifchor-comment-box__author">
								<?php echo get_comment_author_link( $comment->comment_ID ); ?>
                            </div>
                            <div class="ifchor-comment-box__time">
								<?php echo get_comment_date( 'F j, Y', $comment->comment_ID ); ?>
                            </div>
                        </div>
                        <div class="some">
							<?php
							comment_reply_link( array_merge( $args, [
									'reply_text' => __( 'Reply', 'ifchor' ),
									'depth'      => $depth,
									'max_depth'  => $args['max_depth']
								]
							) );
							?>
                        </div>
                    </div>
                    <div class="ifchor-comment-box__comment-content">
						<?php comment_text(); ?>
                    </div>
                </div>
            </div>
        </div>
    </li>
<?php }

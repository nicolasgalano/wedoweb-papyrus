<?php
/*
 * Created by Pixel-Mafia
 * www.pixel-mafia.com
*/

if (post_password_required()) {
    return;
}

# Enqueue Comment Reply JS
if (is_singular() && comments_open()) {
    wp_enqueue_script('comment-reply');
}

function vincent_comment_html($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    ?>

<div <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
    <div class="vincent_comment_ava">
        <?php echo get_avatar($comment->comment_author_email, $args['avatar_size']); ?>
        <?php
        comment_reply_link(
            array_merge(
                $args, array(
                    'before' => ' <div class="vincent_comment_reply">',
                    'after' => '</div>',
                    'depth' => $depth,
                    'reply_text' => esc_html__('Reply', 'vincent'),
                    'max_depth' => $args['max_depth']
                )
            )
        );
        edit_comment_link('Edit');
        ?>
    </div>
    <div class="vincent_comment_body">
        <?php
        if ($comment->comment_approved == '0') {
            echo '<p>' . esc_html__('Your comment is awaiting moderation.', 'vincent') . '</p>';
        }
        ?>
        <div class="vincent_comment_text">
            <?php comment_text(); ?>
        </div>
        <?php
        echo '
            <h6 class="innertitle vincent_comment_author">' . get_comment_author() . '</h6>
        ';
        ?>
    </div>
    <?php
}

if (comments_open()) {
    ?>

    <div class="vincent_comments_cont">
        <div class="vincent_comments_wrapper">
            <h5 class="vincent_comments_title">
                <?php echo esc_attr__('Comments on This Post', 'vincent'); ?>
                <span><?php esc_html(comments_number('0', '1', '%') . ''); ?></span>
            </h5>

            <?php
            if (have_comments()) {
                the_comments_navigation();
                ?>

                <div class="vincent_comment_list">
                    <?php
                    wp_list_comments(array(
                        'style' => 'div',
                        'max_depth' => '5',
                        'avatar_size' => 80,
                        'callback' => 'vincent_comment_html'
                    ));
                    ?>
                </div>

                <?php the_comments_navigation();
            }

            $vincent_comments_field_req = get_option('require_name_email');

            comment_form(array(
                'title_reply_before' => '<h5 class="vincent_reply_comment_title">',
                'title_reply_after' => '</h5>',
                'fields' => array(
                    'author' => '<div class="row"><div class="comment-form-author col-md-12"><input placeholder="'.esc_attr__('Your Name', 'vincent') . ($vincent_comments_field_req ? ' *' : '').'" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30" /></div>',
                    'email' => '<div class="comment-form-email col-md-12"><input placeholder="'.esc_attr__('Your Email', 'vincent') . ($vincent_comments_field_req ? ' *' : '').'" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" /></div></div>',
                ),
                'comment_field' => '<div class="row"><div class="comment-form-comment col-md-12"><textarea name="comment" cols="45" rows="5" placeholder="' . esc_html__('Your Message', 'vincent') . '" id="comment-message" class="form-field"></textarea></div></div>',
                'label_submit' => esc_html__('Send Message', 'vincent'),
            ));
            ?>
        </div>
    </div>

    <?php
}
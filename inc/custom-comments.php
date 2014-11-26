<?php
/**
 * Custom Comments
 *
 * @package WordPress
 * @subpackage Custom Comments
 * @since 1.0.0
 */

/**
 * Extend the Walker class
 *
 * @since 3.0.0
 * @uses Walker
 */
class AK_walker_comment extends Walker_Comment {
     
    // init classwide variables
    var $tree_type = 'comment';
    var $db_fields = array( 'parent' => 'comment_parent', 'id' => 'comment_ID' );
 
    /** CONSTRUCTOR
     * You'll have to use this if you plan to get to the top of the comments list, as
     * start_lvl() only goes as high as 1 deep nested comments */
    function __construct() { ?>
         
        <ul class="comment-list">
         
    <?php }
     
    /** START_LVL 
     * Starts the list before the CHILD elements are added. */
    function start_lvl( &$output, $depth = 0, $args = array() ) {       
        $GLOBALS['comment_depth'] = $depth + 1; ?>
 
                <ul class="children">
    <?php }
 
    /** END_LVL 
     * Ends the children list of after the elements are added. */
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $GLOBALS['comment_depth'] = $depth + 1; ?>
 
        </ul><!-- /.children -->
         
    <?php }
     
    /** START_EL */
    function start_el( &$output, $comment, $depth, $args, $id = 0 ) {
        $depth++;
        $GLOBALS['comment_depth'] = $depth;
        $GLOBALS['comment'] = $comment; 
        $parent_class = ( empty( $args['has_children'] ) ? '' : 'parent' ); ?>
         
        <li <?php comment_class( $parent_class ); ?> id="comment-<?php comment_ID() ?>">
            <div id="comment-body-<?php comment_ID() ?>" class="comment-body">
             
                <div class="comment-author vcard author">
                     <cite class="comment-author-name"><?php echo get_comment_author_link(); ?> </cite>
                    <span class="comment-timestamp"> <?php comment_date(); ?> at <?php comment_time(); ?></span>
                </div><!-- /.comment-author -->
 
                <div id="comment-content-<?php comment_ID(); ?>" class="comment-content">
                    <div class="avatar-wrapper"><?php echo ( $args['avatar_size'] != 0 ? get_avatar( $comment, $args['avatar_size'] ) :'' ); ?></div>
                    <?php if( !$comment->comment_approved ) : ?>
                    <em class="comment-awaiting-moderation">Your comment is awaiting moderation.</em>
                     
                    <?php else: comment_text(); ?>
                    <?php endif; ?>

                </div><!-- /.comment-content -->
 
                <div class="reply">
                    <?php $reply_args = array(
                        'add_below' => $add_below, 
                        'depth' => $depth,
                        'max_depth' => $args['max_depth'] );
     
                    comment_reply_link( array_merge( $args, $reply_args ) );  ?>
                </div><!-- /.reply -->
                 <?php edit_comment_link(__('Edit Comment'), '<span class="edit-comment-link">', '</span>'); ?>
            </div><!-- /.comment-body -->
 
    <?php }
 
    function end_el(&$output, $comment, $depth = 0, $args = array() ) { ?>
         
        </li><!-- /#comment-' . get_comment_ID() . ' -->
         
    <?php }
     
    /** DESTRUCTOR
     * I'm just using this since we needed to use the constructor to reach the top 
     * of the comments list, just seems to balance out nicely:) */
    function __destruct() { ?>
     
    </ul><!-- /#comment-list -->
 
    <?php }
}
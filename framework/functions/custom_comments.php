<?php
//Comments Function
if ( ! function_exists( 'tography_lite_comment' ) ){
	function tography_lite_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   
     <div id="comment-<?php comment_ID(); ?>" class="comment">

      <div class="row">

      <div class="comment-author vcard col-md-2 col-sm-3">
      	<div class="inner-gravatar">
          <div></div>
        	<?php echo get_avatar($comment,$size='60'); ?>
        </div><!-- /inner-gravatar -->
         <div class="clearfix"></div>

         <?php echo '<cite class="fn">'.get_comment_author_link().'</cite>'; ?>
      
      </div><!-- /comment-author vcard-->
      
      
      



      <div class="comment_wrap col-md-10 col-sm-9">
		        <?php if ($comment->comment_approved == '0') : ?>
             <em><?php _e('Your comment is awaiting moderation.', 'tography-lite') ?></em>
             <br />
            <?php endif; ?>
            <div class="comment-entry">
                <div class="inner-comment">
                <?php comment_text() ?>
                <span class="arrow_comment"></span>
                </div><!-- /inner-comment-->
            </div><!-- /comment-entry -->
            
            
            
            <div class="comment-meta commentmetadata">
                <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
                <time datetime="<?php echo get_comment_date('c') ?>" pubdate><?php printf(__('%1$s at %2$s', 'tography-lite'), get_comment_date(),  get_comment_time()) ?></time>
                </a>
                <?php edit_comment_link(__('(Edit)', 'tography-lite'),'  ','') ?>
              </div>
    
          <div class="reply">
             <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
          </div><!-- /reply-->
          <div class="clearfix"></div>
      </div><!-- /comment_wrap -->

      </div><!-- /row -->
     </div><!-- /comment-->
   </li>
<?php
        }
      }//end function_exists
	//End Comment Function

?>
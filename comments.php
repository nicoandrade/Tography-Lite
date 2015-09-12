
	<?php
    
        if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
            die( esc_html__( 'Please do not load this page directly. Thanks!', 'tography-lite' ) );
    
        if ( post_password_required() ) { 
            esc_html_e("This post is password protected. Enter the password to view comments.", 'tography-lite');
       
            return;
        }
    ?>
    
    <?php if ( have_comments() ) : ?>
    	<div id="comments">
        
	        <h3 class=""><?php comments_number(esc_attr__('No Responses', 'tography-lite'), esc_attr__('One Response', 'tography-lite'), esc_attr__('% Responses', 'tography-lite') );?></h3>
	    
	        <div class="navigation">
	            <div class="next-posts"><?php previous_comments_link() ?></div>
	            <div class="prev-posts"><?php next_comments_link() ?></div>
	        </div>
	    
	        <ol class="commentlist">
	            <?php wp_list_comments('type=comment&callback=tography_lite_comment');; ?>
	        </ol><!-- /commentlist-->
	    
	        <div class="navigation">
	            <div class="next-posts"><?php previous_comments_link() ?></div>
	            <div class="prev-posts"><?php next_comments_link() ?></div>
	        </div>
        </div><!-- /comments-->
        
     <?php endif; ?>
    
        <?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<div id="comments">
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'tography-lite' ); ?></p>
		</div><!-- /comments-->
	<?php endif; ?>
    
    







<?php if ( comments_open() ) : ?>




	<?php 
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? " aria-required='true'" : '' );

	$comments_args = array(
	        // remove "Text or HTML to be displayed after the set of comment fields"
	        'comment_notes_after' => '',
	        
	        // redefine your own textarea (the comment body)
	        'comment_field' => '<div class="input-wrap textarea clearfix">
							      <label class="control-label" for="comment">'. esc_html__("Comment", 'tography-lite') .'</label>
							      <div class="controls-wrap">
									    <textarea class="input-xlarge" name="comment" id="comment" tabindex="4" rows="3"></textarea>
							      </div>
								</div>',

			'id_submit' => 'submit-respond',

			'fields' => apply_filters( 'comment_form_default_fields', array(


						'author' =>	'<div class="input-wrap">
								      <label class="control-label" for="author">'. esc_html__("Name",'tography-lite').''. ( $req ? ' (*)' : '' ).'</label>
								      <div class="controls-wrap">
									      	<i class="fa fa-user"></i>
										    <input class="input-xlarge" type="text" name="author" id="author" value="'.  esc_attr($comment_author) .'" size="22" tabindex="1" ' . $aria_req . ' />
											
								      </div>
								    </div>',
						
						'email' =>	'<div class="input-wrap">
								      <label class="control-label" for="email">'. esc_html__("Email",'tography-lite') .''. ( $req ? ' (*)' : '' ).'</label>
								      <div class="controls-wrap">
									      	<i class="fa fa-envelope"></i>
										    <input class="input-xlarge" type="text" name="email" id="email" value="'.  esc_attr($commenter['comment_author_email']).'" size="22" tabindex="2" ' . $aria_req . ' />
								      </div>
								    </div>',


						'url' =>	'<div class="input-wrap">
								      <label class="control-label" for="url">'. esc_html__("Website",'tography-lite').'</label>
								      <div class="controls-wrap">
									      	<i class="fa fa-link"></i>
										    <input class="input-xlarge" type="text" name="url" id="url" value="'.  esc_attr($commenter['comment_author_url']).'" size="22" tabindex="3" />
								      </div>
								    </div>'
						)
			)

	);

	comment_form($comments_args); 

	?> 




<div class="clearfix"></div> 

<?php endif; ?>
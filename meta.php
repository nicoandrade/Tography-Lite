<div class="metadata">
	<ul>
        <?php
        //Get the Portfolio Category
        $portfolio_category = get_theme_mod( 'portfolio_category' );
        //If this is a portfolio post, don't show all the meta.
        if ( ! has_category( $portfolio_category ) ) {
            $args['category_name'] = $portfolio_category;
        ?>
		<li class="meta_date"><i class="fa fa-clock-o"></i> <time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_time( 'F j, Y' ); ?></a></time></li>
		<li class="meta_comments"><i class="fa fa-comment-o"></i> <?php comments_popup_link( esc_attr__( 'No Comments', 'tography-lite' ), esc_attr__( '1 Comment', 'tography-lite' ), esc_attr__('% Comments', 'tography-lite')); ?></li>
        <li class="meta_author"><i class="fa fa-pencil"></i> <?php the_author() ?></li>
        <?php
        }
        ?>
        <li class="meta_category"><i class="fa fa-folder-open-o"></i> <?php the_category(', ') ?></li>
        <?php if( get_the_tags() && !is_home() ){ ?>
            <li class="meta_tags"><i class="fa fa-tag"></i> <?php the_tags('', ', ', ''); ?></li>
        <?php } ?>
    </ul>
    <div class="clearfix"></div>
</div><!-- /metadata -->
			            	
			            		
        <aside id="sidebar" class="col-md-3 col-sm-12">
            <div class="row">

                <?php 		
				if ( is_active_sidebar( 'Sidebar Widgets' ) ) {
    				if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'Sidebar Widgets' ) ) : else : ?>
                        
                    <?php endif; ?>
                <?php }//if is_active_sidebar ?>                    
                        
                <div class="clearfix"></div>
            </div><!-- /row -->
		</aside>
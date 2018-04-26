<?php

// enqueue the child theme stylesheet

function wp_schools_enqueue_scripts() {
	/* begin fontawesome */
	wp_register_style( 'fontawesome', get_stylesheet_directory_uri() . '/web-fonts-with-css/css/fontawesome-all.min.css' ,array(),false,'all' );
	wp_enqueue_style( 'fontawesome' );
	/* end fontawesome */
	/* begin owlcarousel */
	wp_register_style( 'owlcarousel_css', get_stylesheet_directory_uri() . '/owlcarousel/assets/owl.carousel.min.css' ,array(),false,'all' );
	wp_enqueue_style( 'owlcarousel_css' );
	wp_register_script('owlcarousel_js',get_stylesheet_directory_uri() . '/owlcarousel/owl.carousel.min.js',array(),false,false);
	wp_enqueue_script('owlcarousel_js');
	/* end owlcarousel */
	/* begin bootstrap */
	wp_register_style( 'bootstrap_css', get_stylesheet_directory_uri() . '/bootstrap/bootstrap.css' ,array(),false,'all' );
	wp_enqueue_style( 'bootstrap_css' );
	wp_register_script('bootstrap_js',get_stylesheet_directory_uri() . '/bootstrap/bootstrap.js',array(),false,false);
	wp_enqueue_script('bootstrap_js');
	/* end bootstrap */
	/* begin elevatezoom */
	wp_register_script('elevatezoom',get_stylesheet_directory_uri() . '/js/jquery.elevatezoom-3.0.8.min.js',array(),false,false);
	wp_enqueue_script('elevatezoom');	
	/* end elevatezoom */
	/* begin youtube */	
	wp_register_script('jquery_modal_video',get_stylesheet_directory_uri() . '/youtube/jquery-modal-video.min.js',array(),false,false);
	wp_enqueue_script('jquery_modal_video');
	wp_register_script('modal_video_js',get_stylesheet_directory_uri() . '/youtube/modal-video.min.js',array(),false,false);
	wp_enqueue_script('modal_video_js');
	wp_register_style( 'modal_video_css', get_stylesheet_directory_uri() . '/youtube/modal-video.min.css' ,array(),false,'all'  );
	wp_enqueue_style( 'modal_video_css' );
	/* end youtube */
	/* begin tab */
	wp_register_style( 'tab_css', get_stylesheet_directory_uri() . '/css/tab.css' ,array(),false,'all'  );
	wp_enqueue_style( 'tab_css' );
	/* end tab */	
	/* begin custom js */
	wp_register_script('customy_js',get_stylesheet_directory_uri() . '/js/custom.js',array(),false,false);
	wp_enqueue_script('customy_js');
	/* end custom js */
	/* begin style */
	wp_register_style( 'childstyle', get_stylesheet_directory_uri() . '/style.css',array(),false,'all'   );
	wp_enqueue_style( 'childstyle' );
	/* end style */	
}
function do_output_buffer(){
		ob_start();
}
add_action( 'wp_enqueue_scripts', 'wp_schools_enqueue_scripts', 11);
add_action('init', 'do_output_buffer');
/* begin ẩn menu */
function vnkings_admin_menus() {   
   remove_menu_page( 'edit.php?post_type=portfolio_page' ); 
   remove_menu_page( 'edit.php?post_type=testimonials' ); 
   remove_menu_page( 'edit.php?post_type=slides' ); 
   remove_menu_page( 'edit.php?post_type=carousels' ); 
   remove_menu_page( 'edit.php?post_type=masonry_gallery' ); 
   remove_menu_page( 'edit-comments.php' ); 
   remove_menu_page( 'tools.php' );     
   remove_menu_page( 'edit.php?post_type=acf' );   
   remove_menu_page( 'vc-general' );    
}
add_action( 'admin_menu', 'vnkings_admin_menus' );
/* end ẩn menu */
/* begin bản lề */
add_shortcode( 'bang_le', 'showBanLe' );
function showBanLe($atts){
	$att = shortcode_atts( array(
		'icon' => '',
		'slogan'=>''        
	), $atts );	 	
	$icon=trim($att['icon']);
	$slogan=trim($att['slogan']);
	?>
	<div class="mmm">
		<div class="bo-tron">
			<i class="<?php echo $icon; ?>"></i>					
		</div>	
		<div class="slogan-bo-tron">
			<?php echo $slogan; ?>			
		</div>	
	</div>
	<?php 
}
/* end bản lề */

/* begin dịch vụ sản phẩm */
add_shortcode( 'dich_vu_san_pham', 'loadDichVuSanPham' );
function loadDichVuSanPham(){
	$arg = array(
		'post_type' => 'product',  
		'orderby' => 'date',
		'order'   => 'DESC',  
		'posts_per_page' => 100,        										
	); 	
	$the_query = new WP_Query( $arg );
	if($the_query->have_posts()){
		?>
		<div class="box-product-service">
			<script type="text/javascript" language="javascript">				
				jQuery(document).ready(function(){
					jQuery(".product-service").owlCarousel({
						autoplay:false,                    
						loop:true,
						margin:25,                        
						nav:true,            
						mouseDrag: false,
						touchDrag: false,                                
						responsiveClass:true,
						responsive:{
							0:{
								items:1
							},
							600:{
								items:1
							},
							1000:{
								items:1
							}
						}
					});
					var chevron_left='<i class="fas fa-angle-left"></i>';
					var chevron_right='<i class="fas fa-angle-right"></i>';
					jQuery("div.product-service div.owl-prev").html(chevron_left);
					jQuery("div.product-service div.owl-next").html(chevron_right);
				});                
			</script>
			<div class="owl-carousel product-service owl-theme margin-top-10">
				<?php 
				while ($the_query->have_posts()){
					$the_query->the_post();		
					$post_id=$the_query->post->ID;			
					$fullname=get_the_title($post_id);				
					$permalink=get_the_permalink($post_id);		
					$thumbnail_img=get_the_post_thumbnail_url($post_id, 'full');
					?>
					<div class="relative">
						<div><img src="<?php echo $thumbnail_img; ?>"></div>
						<div class="product-service-title"><?php echo $fullname; ?></div>
						<div class="product-service-title-bg"></div>
					</div>
					<?php
				}
				wp_reset_postdata();  
				?>
			</div>
		</div>
		<?php
	}
}
/* end dịch vụ sản phẩm */
/* begin các câu hỏi thường gặp */
add_shortcode( 'cac_cau_hoi', 'showQuestions' );
function showQuestions(){
	$args = array(
		'post_type' => 'faq_item',  
		'orderby' => 'date',
		'order'   => 'DESC',  
		'posts_per_page' => 5     										
	);    	
	$the_query=new WP_Query($args);		
	if($the_query->have_posts()){
		?>
		<div id="accordion">
			<?php 
			$k=1;
			while ($the_query->have_posts()) {
				$the_query->the_post();		
				$post_id=$the_query->post->ID;			
				$fullname=get_the_title($post_id);				
				$content=get_the_content($post_id);
				$chuoi_so='';
				switch ($k) {
					case 1:
						$chuoi_so='One';
						break;
					case 2:
						$chuoi_so='Two';
						break;
					case 3:
						$chuoi_so='Three';
						break;
					case 4:
						$chuoi_so='Four';
						break;
					case 5:
						$chuoi_so='Five';
						break;					
				}
				?>
				<div class="card">
					<div class="card-header" id="heading<?php echo $chuoi_so; ?>">
						<h5 class="mb-0">
							<div class="xnmil"><?php echo $k; ?></div>
							<button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $chuoi_so; ?>" aria-expanded="true" aria-controls="collapseOne">
								<?php echo $fullname; ?>
							</button>
						</h5>
					</div>
					<div id="collapse<?php echo $chuoi_so; ?>" class="collapse show" aria-labelledby="heading<?php echo $chuoi_so; ?>" data-parent="#accordion">
						<div class="card-body justify">
							<?php echo $content; ?>
						</div>
					</div>
				</div>
				<?php
				$k++;
			}
			wp_reset_postdata();
			?>
		</div>
		<?php		
	}	
}
/* end các câu hỏi thường gặp */
/* begin hiển thị icon */
add_shortcode( 'hien_thi_icon', 'showIcon' );
function showIcon($atts){
	$att = shortcode_atts( array(
		'icon' => '',        
	), $atts );	 
	$icon=trim($att['icon']);
	?>	
	<div class="bo-tron-2">
		<i class="<?php echo $icon; ?>"></i>				
	</div>				
	<?php 
}
/* end hiển thị icon */
/* begin dịch vụ sản phẩm */
add_shortcode( 'san_pham', 'loadProduct' );
function loadProduct(){
	$args = array(
		'post_type' => 'product',  
		'orderby' => 'date',
		'order'   => 'DESC'											
	); 	
	$the_query = new WP_Query( $args );
	if($the_query->have_posts()){
		
		while ($the_query->have_posts()){
			$the_query->the_post();		
			$post_id=$the_query->post->ID;			
			$fullname=get_the_title($post_id);				
			$permalink=get_the_permalink($post_id);		
			$thumbnail_img=get_the_post_thumbnail_url($post_id, 'full');				
			$intro=get_post_meta($post_id,"intro",true);
			$technical_detail=get_post_meta($post_id,"technical_detail",true);
			$function_detail=get_post_meta($post_id,"function_detail",true);
			$accessories_detail=get_post_meta($post_id,"accessories_detail",true);
			$science_detail=get_post_meta($post_id,"science_detail",true);
			?>
			<div class="margin-top-45">
				<div>
					<div class="vc_col-sm-6"><img src="<?php echo $thumbnail_img; ?>" /></div>
					<div class="vc_col-sm-6">
						<div class="product-title"><?php echo $fullname; ?></div>
						<div class="product-intro margin-top-10"><?php echo $intro; ?></div>
						<div class="product-technical margin-top-10"><?php echo $technical_detail; ?></div>
					</div>
					<div class="clr"></div>
				</div>
				<div>
					<script type="text/javascript" language="javascript">
						function openCity_<?php echo $post_id ?>(evt, cityName) {    
							var i, tabcontent, tablinks;
							tabcontent = document.getElementsByClassName("tabcontent_<?php echo $post_id; ?>");
							for (i = 0; i < tabcontent.length; i++) {
								tabcontent[i].style.display = "none";
							}   
							tablinks = document.getElementsByClassName("tablinks_<?php echo $post_id; ?>");
							for (i = 0; i < tablinks.length; i++) {
								tablinks[i].className = tablinks[i].className.replace(" active", "");
							}   
							document.getElementById(cityName).style.display = "block";
							evt.currentTarget.className += " active";
						}
						jQuery(document).ready(function(){
							jQuery("#function_detail_<?php echo $post_id; ?>").show();
							jQuery("div.tab_<?php echo $post_id; ?> > button.tablinks_<?php echo $post_id; ?>:first-child").addClass('active');
						});
					</script>       
					<div class="tab_<?php echo $post_id; ?> tab">
						<button class="tablinks_<?php echo $post_id; ?> h-title" onclick="openCity_<?php echo $post_id; ?>(event, 'function_detail_<?php echo $post_id; ?>')">Tính năng</button>
						<button class="tablinks_<?php echo $post_id; ?> h-title" onclick="openCity_<?php echo $post_id; ?>(event, 'accessories_detail_<?php echo $post_id; ?>')">Linh kiện</button>               
						<button class="tablinks_<?php echo $post_id; ?> h-title" onclick="openCity_<?php echo $post_id; ?>(event, 'science_detail_<?php echo $post_id; ?>')">Công nghệ</button>							
						<div class="clr"></div>           
					</div>
					<div id="function_detail_<?php echo $post_id; ?>" class="tabcontent_<?php echo $post_id; ?> tabcontent">
						<div class="margin-top-15 justify">
							<?php 
							if(!empty($function_detail)){
								echo $function_detail;
							}
							?>               
						</div>
					</div>
					<div id="accessories_detail_<?php echo $post_id; ?>" class="tabcontent_<?php echo $post_id; ?> tabcontent">
						<div class="margin-top-15 justify">
							<?php 
							if(!empty($accessories_detail)){
								echo $accessories_detail;
							}
							?>  

						</div>
					</div>          
					<div id="science_detail_<?php echo $post_id; ?>" class="tabcontent_<?php echo $post_id; ?> tabcontent">
						<div class="margin-top-15 justify">
							<?php 
							if(!empty($science_detail)){
								echo $science_detail;
							}
							?> 
						</div> 
					</div>                						   
				</div>					
			</div>
			<?php
		}
		wp_reset_postdata();  
		
	}
}
/* end dịch vụ sản phẩm */
/* begin lấy danh sách video */
add_shortcode( 'list_video', 'loadListVideo' );
function loadListVideo(){	
	global $zController,$zendvn_sp_settings;    
	$vHtml=new HtmlControl();
	$productModel=$zController->getModel("/frontend","ProductModel"); 
	$args = array(
		'post_type' => 'zavideo',  
		'orderby' => 'date',
		'order'   => 'DESC'     										
	);  
	$the_query = new WP_Query( $args );
	$totalItemsPerPage=0;
	$pageRange=10;
	$currentPage=1; 
	$totalItemsPerPage=9;
	if(!empty(@$_POST["filter_page"]))          {
		$currentPage=@$_POST["filter_page"];  
	}
	$productModel->setWpQuery($the_query);   
	$productModel->setPerpage($totalItemsPerPage);        
	$productModel->prepare_items();               
	$totalItems= $productModel->getTotalItems();               
	$arrPagination=array(
		"totalItems"=>$totalItems,
		"totalItemsPerPage"=>$totalItemsPerPage,
		"pageRange"=>$pageRange,
		"currentPage"=>$currentPage   
	);    
	$pagination=$zController->getPagination("Pagination",$arrPagination); 
	?>
	<form  method="post"  class="frm" name="frm">
		<input type="hidden" name="filter_page" value="1" />
		<?php 
		if($the_query->have_posts()){
			$k=1  ; 
			while ($the_query->have_posts()){
				$the_query->the_post();     
				$post_id=$the_query->post->ID;                          				
				$title=get_the_title($post_id);
				$video_id=get_post_meta($post_id,"video_id",true);													
				?>															
				<div class="wpb_column vc_column_container vc_col-sm-4">
					<div class="margin-right-15 margin-top-25">
						<div class="relative liverpool">
							<div><center><img src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" /></center></div>			
							<div class="youtube"></div>		
							<div class="youtube-img" >
								<div><a class="js-modal-btn" data-video-id="<?php echo $video_id; ?>" href="javascript:void(0);"><img src="<?php echo site_url('wp-content/uploads/youtube.png',null); ?>"></a></div>		
							</div>	

						</div>
						<div>						
							<div><?php echo $title; ?></div>													
						</div>
					</div>					
				</div>															
				<?php
				if($k%3 ==0 || $k==$the_query->post_count){
					echo '<div class="clr"></div>';
				}
				$k++;
			}
			wp_reset_postdata();
			?>
			<div>
				<?php echo $pagination->showPagination();            ?>				
			</div>
			<?php
		}
		?>	
		<script type="text/javascript" language="javascript">
			jQuery(document).ready(function(){
				jQuery(".js-modal-btn").modalVideo();
			})
		</script>
	</form>
	<?php
}
/* end lấy danh sách video */
/* begin lấy danh sách bài viết theo category */
add_shortcode( 'list_article', 'loadListArticleByCategory' );
function loadListArticleByCategory($atts){	
	$att = shortcode_atts( array(
		'category' => '',        
	), $atts );	 
	$category=trim($att['category']);
	global $zController,$zendvn_sp_settings;    
	$vHtml=new HtmlControl();
	$productModel=$zController->getModel("/frontend","ProductModel"); 
	$args = array(		
		'orderby' => 'date',
		'order'   => 'DESC',
		'category_name' => $category     										
	);  
	$the_query = new WP_Query( $args );
	$totalItemsPerPage=0;
	$pageRange=10;
	$currentPage=1; 
	$totalItemsPerPage=get_option( 'posts_per_page' );    
	if(!empty(@$_POST["filter_page"]))          {
		$currentPage=@$_POST["filter_page"];  
	}
	$productModel->setWpQuery($the_query);   
	$productModel->setPerpage($totalItemsPerPage);        
	$productModel->prepare_items();               
	$totalItems= $productModel->getTotalItems();               
	$arrPagination=array(
		"totalItems"=>$totalItems,
		"totalItemsPerPage"=>$totalItemsPerPage,
		"pageRange"=>$pageRange,
		"currentPage"=>$currentPage   
	);    
	$pagination=$zController->getPagination("Pagination",$arrPagination); 
	?>
	<div class="full_width padding-bottom-15">
		<div class="full_width_inner">
			<div class="vc_row wpb_row section vc_row-fluid grid_section">
				<div class="section_inner clearfix">
					<form  method="post"  class="frm" name="frm">
						<input type="hidden" name="filter_page" value="1" />
						<?php 
						if($the_query->have_posts()){
							while ($the_query->have_posts()){
								$the_query->the_post();     
								$post_id=$the_query->post->ID;                          
								$permalink=get_the_permalink($post_id);
								$title=get_the_title($post_id);
								$excerpt=get_post_meta($post_id,"intro",true);			
								$content=get_the_content($post_id);									
								?>											
								<div class="section_inner_margin clearfix">
									<div class="margin-top-15">
										<div class="wpb_column vc_column_container vc_col-sm-4"><figure><a href="<?php echo $permalink; ?>"><img src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" /></a></figure></div>
										<div class="wpb_column vc_column_container vc_col-sm-8">
											<div class="margin-left-15">
												<div class="kksausdkj"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></div>						
												<div class="justify margin-top-5"><?php echo $excerpt; ?></div>
												<div class="jkakjfswn"><a href="<?php echo $permalink; ?>">Xem thêm</a></div>
											</div>					
										</div>
									</div>				
								</div>										
								<?php
							}
							wp_reset_postdata();
							?>
							<div class="section_inner_margin clearfix">
								<div class="wpb_column vc_column_container vc_col-sm-12"><?php echo $pagination->showPagination();            ?></div>							
							</div>
							<?php
						}
						?>	
					</form>			
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" language="javascript">
		jQuery(document).ready(function(){
			jQuery('.content').addClass('content_top_margin_none');
		});
	</script>
	<?php
}
/* end lấy danh sách bài viết theo category */
<?php get_header();?>
<div class="container">
	<?php 
	$term=array();
	if(have_posts()){
		while (have_posts()) {
			the_post();                     
			$post_id= get_the_id();        
			$title=get_the_title($post_id);                
			$excerpt=get_post_meta($post_id,"intro",true);        
			$content=get_the_content($post_id);    
			$term = wp_get_object_terms( $post_id,  'category' );    				
			?>
			<h1 class="jahfcxxbxxz"><?php echo $title; ?></h1>
			<div class="margin-top-15 justify"><b><?php echo $excerpt; ?></b></div>
			<div class="margin-top-15 justify"><?php echo $content; ?></div>
			<?php
		}
		wp_reset_postdata();    
	}
	?>
	<hr class="duong-ngang">
	<div class="margin-top-10">
		<div class="related-news">
			<b>Tin liên quan</b>
		</div>
		<div class="related-news-right">
			<?php 
			$arrID=array(); 
			if(count($term) > 0){
				foreach ($term as $key => $value) {
					$arrID[]=$value->term_id;
				}
			}    
			$args = array(
				'post_type' => 'post',  
				'orderby' => 'date',
				'order'   => 'DESC',  
				'posts_per_page' => 10,        
				'post__not_in'=>array($post_id),
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field'    => 'term_id',
						'terms'    => $arrID,                   
					),
				),
			);     
			$the_query=new WP_Query($args);  
			if($the_query->have_posts()){
				?>
				<ul class="related-articles">
					<?php 
					while ($the_query->have_posts()){
						$the_query->the_post();
						$postID=$the_query->post->ID;
						$title=get_the_title($postID);
						$permalink=get_the_permalink($postID);
						$featureImg=get_the_post_thumbnail_url($postID, 'full');
						?>
						<li>                                              
							<a href="<?php echo $permalink; ?>"><?php echo $title; ?></a>
						</li>
						<?php
					}
					?>
				</ul>
				<?php					
			}
			?>
		</div>
		<div class="clr"></div>
	</div>
</div>
<?php get_footer();?>

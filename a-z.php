<?php /* Template name: A-Z */
get_header(); ?>
       
	<div id="main-area">
		<div class="wrapper">
			<div <?php post_class(); ?>>
			
			<?php 
			$filter_args = array
			(
				'post_type' => 'post',
				'posts_per_page' => -1,
				'category_name' => 'tutorial',
			);
			$tutorial_posts = new WP_Query($filter_args);
			$posts_array = array();

			// Get all posts
			while ( $tutorial_posts->have_posts() ) : $tutorial_posts->the_post(); 
				$posts_array[] = strtolower(get_the_title()[0]);
			endwhile; ?>
				
				
			<?php // ?>
			<ul id="a-z">
				<?php 
				$alphabet_array = range('a', 'z');
				$number_array = range(0, 9); 
				//$build_li = '';
				
				// Check if number
				if(count(array_intersect($posts_array, $number_array)) > 0){
					echo "<li class=\"active\" data-letter=\"#\">#</li>";
				}
				else 
				{
					echo "<li data-letter=\"#\">#</li>";
				}
				//echo "<li $build_li>" . '#' . '</li>';
				
				foreach ($alphabet_array as $letter)
				{
					if (in_array($letter, $posts_array)) 
					{	
						echo "<li class=\"active\" data-letter=".$letter.">$letter</li>";
					}
					else 
					{
						echo "<li data-letter=".$letter.">$letter</li>";
					}
				} 
				?>
			</ul>
				
			<div id="title-status">
				<p>Showing: <span></span></p>
				<p id="show-all">Show all posts</p>
			</div>
				
			<?php 
			$i = -1;
			?>
				
			<ul id="posts-results">
			<?php while ( $tutorial_posts->have_posts() ) : $tutorial_posts->the_post(); 
				$i++;
				
				if(is_numeric($posts_array[$i])) 
				{
					echo "<li data-letter=\"#\">";
						echo "<a href=".get_the_permalink().">";
							echo get_the_title();
						echo "</a>";
					echo "</li>";
				}
				else 
				{
					echo "<li data-letter=".$posts_array[$i].">";
						echo "<a href=".get_the_permalink().">";
							echo get_the_title();
						echo "</a>";
					echo "</li>";
				} ?>
				
			<?php endwhile; ?>
			</ul>
			 
			</div>
			
		</div>
	</div>
    
<?php get_footer(); ?>

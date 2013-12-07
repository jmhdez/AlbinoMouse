<?php
/**
 * Template Name: All posts
 * @package AlbinoMouse
 */


get_header(); ?>

<?php $options = get_option( 'albinomouse' ); ?>

<div id="content" class="site-archive" role="main">

	<div class="row">
		<div class="span12">Aquí va la presentación de quién soy</div>
	</div>

	ESTOY INTENTADO ARREGLAR ESTO PARA QUE SALGAN LAS COLUMNAS COMO QUIERO. FALLA PORQUE ALBINO NO USA BOOTSTRAP. AYS!

	<div class="row">
		<div class="three_fourth_col">
			<ul id="archives-posts">
				<?php
					global $post;
					$args = array( 'orderby' => 'post_date', 'order' => 'DESC', 'numberposts' => '10000' );
					$myposts = get_posts( $args );

					foreach( $myposts as $post ) : setup_postdata($post); ?>
					<li>
          	<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br/><small><?php the_date(); ?></small></p>
        	</li>
					<?php endforeach; ?>
			</ul>
		</div>
		<div class="one_forth_column">
			<ul id="archives-tags">
				<?php 
					$tags = get_tags();
					foreach ($tags as $tag) {
						echo '<li><a href="' . get_tag_link($tag->term_id) . '" title="Posts sobre ' . $tag->name . '">' . $tag->name . '</a></li>' ;
					}
				?>
			</ul>
		</div>
	</div>

</div><!-- #content .site-archive -->

<?php if( $options['sidebar-layout'] == '2c-r' ) {
	get_sidebar(); 
} ?>

<?php get_footer(); ?>
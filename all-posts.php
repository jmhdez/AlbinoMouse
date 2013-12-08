<?php
/**
 * Template Name: All posts
 * @package AlbinoMouse
 */


get_header(); ?>

<?php $options = get_option( 'albinomouse' ); ?>

<div id="content" class="site-archive" role="main">

	<div class="intro">

		<h1>Hola, soy Juan María Hernández y éste es mi blog</h1>
		
		<p>Me dedico a desarrollar software desde hace unos cuantos años y me encanta aprender cosas nuevas. 
		Como creo que la mejor forma de aprender algo es tratar de enseñárselo a los demas, escribo este blog
		donde podrás encontrar información sobre desarrollo de software en general.</p>

		<p>Si quieres saber más sobre mi (enlace a quien soy), ver mis cosas online, etc.</p>
		
	</div>

	<div class="three_fourth_col">

		<h2>Todos mis artículos</h2>
1
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

		<h2>Temas que he tratado</h2>

		<ul id="archives-tags">
			<?php 
				$tags = get_tags();
				foreach ($tags as $tag) {
					echo '<li><a href="' . get_tag_link($tag->term_id) . '" title="Posts sobre ' . $tag->name . '">' . $tag->name . '</a></li>' ;
				}
			?>
		</ul>
	</div>

</div><!-- #content .site-archive -->

<?php if( $options['sidebar-layout'] == '2c-r' ) {
	get_sidebar(); 
} ?>

<?php get_footer(); ?>
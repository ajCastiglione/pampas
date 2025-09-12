<?php
/**
 * Blog Archive.
 *
 * @package Minerva Web Development
 */

get_header();
global $wp_query;

?>

<div id="content">

	<main id="main" role="main">

		<?php
		get_template_part(
			'template-parts/single-header',
			null,
			array(
				'title'     => 'explore our blog',
				'subtitle'  => 'Real Talk. Practical Tips. <br/> <span class="text-accent font-extralight">Zero Tech Headaches.</span>',
				'body_text' => "Whether you're trying to make sense of your tech, stay ahead of the latest trends, or just want to learn something new without the jargon, you're in the right place. Our blog is full of clear, helpful insights from the team that makes IT feel easy.",
			)
		);
		?>

		<div class="relative container py-12">
			<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8 mb-12">
				<?php
				if ( have_posts() ) :
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/card' );
					endwhile;
					wp_reset_postdata();
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>
			<div>
				<?php mwd_pagination( $wp_query ); ?>
			</div>

			<div class="hidden lg:block top-0 -left-4 border-l-2 border-accent w-1 h-[70%] absolute"></div>
			<div class="hidden lg:block top-[75%] -left-[4.5rem] absolute -rotate-90 font-semibold">Making IT Easy</div>
		</div>

	</main>

</div>


<?php get_footer(); ?>

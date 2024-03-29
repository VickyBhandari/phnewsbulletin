<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package phnewsbulletin
 */

get_header();
?>

	<main id="primary" class="site-main <?php do_action('phnewsbulletin_primary_width_class') ?>">

		<?php if ( have_posts() ) : ?>

			<header class="page-header page-entry-header">
				<h1 class="page-title"><span>
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'ph-news-bulletin' ), '<span>' . get_search_query() . '</span>' );
					?>
				</span></h1>
			</header><!-- .page-header -->

			<?php
			do_action( 'phnewsbulletin_before_loop' );
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				do_action('phnewsbulletin_blog_layout'); 

			endwhile;
			do_action( 'phnewsbulletin_after_loop' );

			the_posts_pagination( apply_filters( 'phnewsbulletin_posts_pagination_args', array(
				'class'	=>	'phnewsbulletin-pagination',
				'prev_text'	=> '<i class="fa fa-angle-left"></i>',
				'next_text'	=> '<i class="fa fa-angle-right"></i>'
			) ) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

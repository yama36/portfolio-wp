<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<?php get_header(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<header id="header">
		<?php get_template_part('template-parts/header'); ?>
	</header>

	<main>
		<div class="single-container">
			<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
				<div class="breadcrumbs-container">
					<?php if (function_exists('bcn_display')) {
						bcn_display();
					} ?>
				</div>
			</div>
			<h1 class="news__title"><?php the_title(); ?></h1>
			<?php the_content(); ?>
			<?php get_template_part('template-parts/contact'); ?>
		</div>
	</main>

	<footer id="footer">
		<?php get_template_part('template-parts/footer'); ?>
	</footer>

	<?php get_footer(); ?>

</body>

</html>
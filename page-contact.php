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
		<?php get_template_part('template-parts/top'); ?>
		<div class="contact-container">
			<?php echo do_shortcode('[mwform_formkey key="2162"]'); ?>
		</div>
		<?php get_template_part('template-parts/contact'); ?>
	</main>

	<footer id="footer">
		<?php get_template_part('template-parts/footer'); ?>
	</footer>

	<?php get_footer(); ?>

</body>

</html>
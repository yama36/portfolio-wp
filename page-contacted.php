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
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
			<div class="breadcrumbs-container">
				<?php if (function_exists('bcn_display')) {
					bcn_display();
				} ?>
			</div>
		</div>
		<div class="contacted-container">
			<div class="message">
				<p>お問い合わせいただきありがとうございます</p>
				<p>内容を確認した後、担当者よりご連絡いたします</p>
			</div>
      <a href="<?php echo esc_url(home_url()); ?>">ホームへ戻る</a>
		</div>

		<?php get_template_part('template-parts/contact'); ?>
	</main>

	<footer id="footer">
		<?php get_template_part('template-parts/footer'); ?>
	</footer>

	<?php get_footer(); ?>

</body>

</html>
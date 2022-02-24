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
		<?php get_queried_object()->labels->name = "お知らせ" ?>
		<?php get_template_part('template-parts/top'); ?>

		<div class="news-container">
			<h2 class="news__title">お知らせ一覧</h2>
			<ul class="news__list">

				<?php while (have_posts()) : the_post(); ?>
					<li class="news__item">
						<div class="news__item__time">
							<?php the_time('Y-m-d'); ?>
						</div>
						<div class="news__item__title">
							<?php
							$title = get_the_title();
							$length = 12;
							if (mb_strlen($title) >= $length) :
							?>
								<a href="<?php the_permalink(); ?>">
									<?php echo mb_substr($title, 0, $length) . "..."; ?>
								</a>
							<?php else : ?>
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
							<?php endif; ?>
						</div>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>

		<?php get_template_part('template-parts/pagination'); ?>

		<?php get_template_part('template-parts/contact'); ?>
	</main>

	<footer id="footer">
		<?php get_template_part('template-parts/footer'); ?>
	</footer>

	<?php get_footer(); ?>

</body>

</html>
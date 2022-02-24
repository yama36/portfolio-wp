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

		<div class="blog-container">
			<h2 class="blog__title">
				<?php $term_name = single_term_title('', false); ?>
				<?php echo $term_name; ?>一覧
			</h2>
			<ul class="blog__list">

				<?php while (have_posts()) : the_post(); ?>
					<li class="blog__item">
						<?php if (has_post_thumbnail()) : ?>
							<div class="blog__item__imgs" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)">
								<div class="blog__item__category">
									<?php for ($i = 0; $i <= 2; $i++) :
										if (get_the_category()[$i]) :
											echo get_the_category()[$i]->name; ?>
											<br>
										<?php endif; ?>
									<?php endfor; ?>
								</div>
							</div>
						<?php else : ?>
							<div class="blog__item__imgs" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/sample4.jpg)">
								<div class="blog__item__category">
									<?php category_etc(0); ?>
								</div>
							</div>
						<?php endif ?>
						<div class="blog__item__text">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<h4 class="blog__item__title">
									<?php
									if (mb_strlen($post->post_title) > 20) {
										$title = mb_substr($post->post_title, 0, 20);
										echo $title . '...';
									} else {
										echo $post->post_title;
									}
									?> </h4>
							</a>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php the_excerpt(); ?>
							</a>
							<p class="blog__item__day"><?php the_time('Y-m-d'); ?></p>
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
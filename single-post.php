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

		<div id="blog-container">
			<div class="blog-container">
				<div class="blog__category"><?php category_etc(2) ?></div>
				<div class="blog__title"><?php the_title(); ?></div>
				<div class="blog__time"><?php the_time('Y-m-d'); ?></div>
				<?php wp_social_bookmarking_light_output_e(null, get_permalink(), the_title("", "", false)); ?>
				<div class="blog__img">
					<?php
					if (has_post_thumbnail()) :
						the_post_thumbnail();
					else : ?>
						<div class="blog__img__thumbnail" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/sample4.jpg)"></div>
					<?php endif; ?>
				</div>
				<?php the_content(); ?>
			</div>
			<div class="pickup">
				<blog class="pickup-container">
					<h2 class="pickup__title">おすすめの記事</h2>
					<ul class="pickup__list">
						<?php
						$cat_posts = get_posts(array(
							'post_type' => 'post', // 投稿タイプ
							'tag' => 'pickup', // カテゴリをスラッグで指定する場合
							'posts_per_page' => 3, // 表示件数
							'orderby' => 'date', // 表示順の基準
							'order' => 'DESC' // 昇順・降順
						));
						global $post;
						if ($cat_posts) : foreach ($cat_posts as $post) : setup_postdata($post); ?>


								<!-- ループはじめ -->
								<li class="pickup__item">
									<?php if (has_post_thumbnail()) : ?>
										<div class="pickup__item__imgs" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)">
											<div class="pickup__item__category">
												<?php category_etc(0); ?>
											</div>
										</div>
									<?php else : ?>
										<div class="pickup__item__imgs" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/sample4.jpg)">
											<div class="pickup__item__category">
												<?php category_etc(0); ?>
											</div>
										</div>
									<?php endif ?>
									<div class="pickup__item__text">
										<p class="pickup__item__day"><?php the_time('Y-m-d'); ?></p>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<h4 class="pickup__item__title">
												<?php the_title(); ?>
											</h4>
										</a>
									</div>
								</li>
								<!-- ループおわり -->

						<?php endforeach;
						endif;
						wp_reset_postdata(); ?>

					</ul>
				</blog>
			</div>
			<?php get_template_part('template-parts/sidebar'); ?>
		</div>

		<?php get_template_part('template-parts/contact'); ?>
	</main>

	<footer id="footer">
		<?php get_template_part('template-parts/footer'); ?>
	</footer>

	<?php get_footer(); ?>

	<script src="<?php echo get_template_directory_uri(); ?>/js/modules/height.js"></script>
</body>

</html>
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

		<section id="price">
			<div class="price-container">
				<div class="price__overview">
					<h2>料金体系</h2>
					<div class="price__figure">
						<div>入会金 39,800円</div>
						<span>+</span>
						<div>月額費用</div>
					</div>
					<p>Engressのカリキュラムは完全オーダーメイドのため、カリキュラム内のサポート内容によって料金が変動します。おすすめのスタンダードプランでは、進学先に合わせたサポートまで包括的に行います。</p>
				</div>
				<div id="swiper" class="swiper">
					<div class="swiper-wrapper">

						<?php
						$args = [
							'post_type' => 'price-setting', // カスタム投稿名
							'order' => 'ASC', // 投稿の順番を逆にする
							'posts_per_page' => 5, // 表示する数
						];
						$my_query = new WP_Query($args); ?>

						<?php if ($my_query->have_posts()) : // 投稿がある場合
						?>

							<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

								<!-- ▽ ループ開始 ▽ -->
								<div class="swiper-slide price__list">
									<ul class="success__list">
										<?php if (get_field('suggest') == 'suggest') : ?>
											<div class="price__item suggest">
												<h4 class="price__item__title suggest">
													<p>おすすめ</p><?php the_field('plan'); ?>
												</h4>
												<div class="price__item__price">
													<p class="suggest-price"><?php echo esc_html(number_format(get_field('price'))); ?>円〜</p>
													<p>*月額（税抜価格）</p>
												</div>
												<ul class="price__item__features">
											<?php else : ?>
												<div class="price__item">
													<h4 class="price__item__title"><?php the_field('plan'); ?></h4>
													<div class="price__item__price">
														<p><?php echo esc_html(number_format(get_field('price'))); ?>円〜</p>
														<p>*月額（税抜価格）</p>
													</div>
													<ul class="price__item__features">
												<?php endif; ?>
													<?php $strength = 'strengths'; ?>
													<?php for ($i = 1; $i <= 5; $i++) : ?>
														<?php if (get_field($strength . $i) !== "") : ?>
															<li>
																<?php if (get_field('checkmark')) : ?>
																	<i class="fas fa-check"></i>
																<?php endif; ?>
																<p><?php the_field($strength . $i); ?></p>
															</li>
														<?php endif; ?>
													<?php endfor; ?>
												</ul>
												</div>
									</ul>
								</div>
								<!-- △ ループ終了 △ -->

							<?php endwhile; ?>


						<?php
						else : // 投稿がない場合
						?>

							<p>まだ投稿がありません。</p>

						<?php
						endif;
						wp_reset_postdata();
						?>

					</div>
				</div>
			</div>
		</section>


		<?php get_template_part('template-parts/contact'); ?>
	</main>

	<footer id="footer">
		<?php get_template_part('template-parts/footer'); ?>
	</footer>

	<?php get_footer(); ?>

</body>

</html>
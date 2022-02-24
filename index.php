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

	<section id="top">
		<div class="top-container">
			<h2>TOEFL対策はEngress</h2>
			<p>日本人へのTOEFL指導歴豊かな講師陣の</p>
			<p>コーチング型TOEFLスクール</p>
			<a href="<?php echo esc_url(home_url('/contact/')); ?>"><button class="btn top__request">資料請求</button></a>
			<a class="top__contact" href="<?php echo esc_url(home_url('/contact/')); ?>">お問い合わせ</a>
		</div>
		<img class="top__img" src="<?php echo get_template_directory_uri(); ?>/img/fv.jpg" alt="トップの画像">
	</section>

	<main>
		<section id="consept">
			<div class="consept-container">
				<div class="consept__1">
					<h3>TOEFL学習でこんな悩みありませんか？</h3>
					<div class="consept__text">
						<p>・勉強の習慣が身についていない</p>
						<p>・勉強しているはずなのに点数が伸びない</p>
						<p>・正しい勉強方法がわからない</p>
					</div>
				</div>
				<div class="consept__2-container">
					<div class="consept__2">
						<h2>Engressは<br><u>TOEFLに特化したスクール</u>です</h2>
						<p>完全オーダーメイドで、</p>
						<p>１人１人の悩みに合わせた最適な指導で</p>
						<p>TOEFLの苦手分野を克服します。</p>
					</div>
				</div>
			</div>
		</section>
		<section id="strengths">
			<div class="strengths-container">
				<h2 class="strengths__title">TOEFL対策に特化したEngress3つの強み</h2>
				<ul class="strengths__list">
					<li class="strengths__item">
						<div class="strengths-background" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/feature01.jpg);"></div>
						<div class="strengths__item-container">
							<div class="strengths__btn-container">
								<button class="strengths__item__1" href="">特徴 １</button>
							</div>
							<div class="strengths__item__sub">
								<h3>TOEFLに最適化された<br>無駄のないカリキュラム</h3>
								<p>TOEFLではビジネス英語には登場しない数多くの学術的内容が出題されます。そのため、ベースとなる知識も必要になります。Engressでは過去1000題を分析し、最適なカリキュラムを組んでいます。</p>
							</div>
						</div>
					</li>
					<li class="strengths__item">
						<div class="strengths-background" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/feature02.jpg);"></div>
						<div class="strengths__item-container">
							<div class="strengths__btn-container">
								<button class="strengths__item__1" href="">特徴 ２</button>
							</div>
							<div class="strengths__item__sub">
								<h3>日本人指導歴10年以上の<br>経験豊富な講師陣</h3>
								<p>Engressの講師陣は、もともと日本人向けにTOEFLを教えていた人が大多数です。また全メンバーがTESOL(英語教授法)を取得しており、知識と経験を兼ね備えている教育のプロフェッショナルです。</p>
							</div>
						</div>
					</li>
					<li class="strengths__item">
						<div class="strengths-background" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/feature03.jpg);"></div>
						<div class="strengths__item-container">
							<div class="strengths__btn-container">
								<button class="strengths__item__1" href="">特徴 ３</button>
							</div>
							<div class="strengths__item__sub">
								<h3>平均３ヶ月で<br>TOEFL iBT20点アップ</h3>
								<p>Engressは高校生からサラリーマンまで様々な年齢層の方々が通われていますが、完全オーダーメイドのカリキュラムで柔軟に対応しているため、平均3ヶ月でTOEFLスコアを20点アップさせています。</p>
							</div>
						</div>
					</li>
				</ul>
				<div class="strengths__plan">
					<img src="<?php echo get_template_directory_uri(); ?>/img/price.png">
					<h3><span>Engressの</span><span>料金プランはこちら</span></h3>
					<a href="<?php echo esc_url(home_url('/price/')); ?>"><button class="btn">料金を見てみる</button></a>
				</div>
			</div>
		</section>
		<section id="success">
			<div class="success-container">
				<h2>TOEFLE成功事例</h2>

				<?php
				$args = [
					'post_type' => 'success', // カスタム投稿名
					'order' => 'ASC', // 投稿の順番を逆にする
					'posts_per_page' => 3, // 表示する数
				];
				$my_query = new WP_Query($args); ?>

				<?php if ($my_query->have_posts()) : // 投稿がある場合
				?>

					<ul class="success__list">

						<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

							<!-- ▽ ループ開始 ▽ -->
							<li class="success__item">
								<h4><?php the_field('catch'); ?></h4>
								<div class="success__item-container">

									<img class="success__item__img" src="<?php the_field('img'); ?>" alt="">
									<div class="success__item__subcontainer">
										<div class="success__item__position"><?php the_field('job'); ?></div>
										<div class="success__item__name"><?php the_field('name'); ?></div>
										<div class="success__item__achievement"><?php the_field('achievement'); ?></div>
									</div>
								</div>
							</li>
							<!-- △ ループ終了 △ -->

						<?php endwhile; ?>

					</ul>

				<?php
				else : // 投稿がない場合
				?>

					<p>まだ投稿がありません。</p>

				<?php
				endif;
				wp_reset_postdata();
				?>
			</div>

		</section>
		<section id="howto">
			<div class="howto-container">
				<h2 class="howto__title">ご利用の流れ</h2>
				<ul class="howto__list">
					<li class="howto__item">
						<div class="howto__item__number">01</div>
						<div class="howto__item__text">
							<h4>お問い合わせ</h4>
							<p>まずはフォームまたはお電話からお申し込みください。</p>
						</div>
					</li>
					<li class="howto__item">
						<div class="howto__item__number">02</div>
						<div class="howto__item__text">
							<h4>ヒアリング</h4>
							<p>現在の学習状況やTOEFLスコア、目標のスコアをお聞きします。</p>
						</div>
					</li>
					<li class="howto__item">
						<div class="howto__item__number">03</div>
						<div class="howto__item__text">
							<h4>学習プランのご提供</h4>
							<p>目標達成のために最適な学習プランをご提案致します。</p>
						</div>
					</li>
					<li class="howto__item">
						<div class="howto__item__number">04</div>
						<div class="howto__item__text">
							<h4>ご入会</h4>
							<p>お申込み完了後、レッスンがスタートします。</p>
						</div>
					</li>
				</ul>
			</div>

		</section>
		<section id="FAQ">
			<h2 class="FAQ__title">よくある質問</h2>
			<div class="FAQ-container">
				<ul class="FAQ__list">
					<li class="FAQ__item">
						<div class="FAQ__F-container">
							<div class="FAQ__F">Engressはサラリーマンでも学習を続けられるでしょうか？</div>
							<button class="FAQ__btn HBbtn">
								<span></span>
								<span></span>
							</button>
						</div>
						<div class="FAQ__A-container HBinner">
							<div class="FAQ__A sub">Engressは各個人に最適な学習プランをご提供しております。サラリーマンの方でも継続できます。</div>
						</div>
					</li>
					<li class="FAQ__item">
						<div class="FAQ__F-container">
							<div class="FAQ__F">教材はオリジナルのものを使用しているのでしょうか？</div>
							<button class="FAQ__btn HBbtn">
								<span></span>
								<span></span>
							</button>
						</div>
						<div class="FAQ__A-container HBinner">
							<div class="FAQ__A sub">オリジナルのものを使用しています。</div>
						</div>
					</li>
					<li class="FAQ__item">
						<div class="FAQ__F-container">
							<div class="FAQ__F">講師に日本人はいますか？</div>
							<button class="FAQ__btn HBbtn">
								<span></span>
								<span></span>
							</button>
						</div>
						<div class="FAQ__A-container HBinner">
							<div class="FAQ__A sub">もちろんいます。</div>
						</div>
					</li>
					<li class="FAQ__item">
						<div class="FAQ__F-container">
							<div class="FAQ__F">TOEFL以外の海外大学合格のサポートもしてもらえるのでしょうか？</div>
							<button class="FAQ__btn HBbtn">
								<span></span>
								<span></span>
							</button>
						</div>
						<div class="FAQ__A-container HBinner">
							<div class="FAQ__A sub">サポートします。</div>
						</div>
					</li>
				</ul>
			</div>

		</section>
		<div class="blog-news-container">
			<section id="blog">
				<blog class="blog-container">
					<h2 class="blog__title">ブログ</h2>
					<ul class="blog__list">
						<?php while (have_posts()) : the_post(); ?>
							<li class="blog__item">
								<?php if (has_post_thumbnail()) : ?>
									<div class="blog__item__imgs" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)">
										<div class="blog__item__category">
											<?php category_etc(0); ?>
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
									<?php
									$title = get_the_title();
									$length = 20;
									if (mb_strlen($title) >= $length) : ?>
										<a href="<?php the_permalink(); ?>">
											<?php echo mb_substr($title, 0, $length) . "..."; ?>
										</a>
									<?php else : ?>
										<a href=”<?php the_permalink(); ?>” title=”<?php the_title(); ?>”><?php the_title(); ?></a>
									<?php endif; ?>
									<p class="blog__item__day"><?php the_time('Y-m-d'); ?></p>
								</div>
							</li>
						<?php endwhile; ?>
					</ul>
				</blog>
			</section>
			<section id="news">
				<div class="news-container">
					<h2 class="news__title">お知らせ</h2>
					<?php
					$args = [
						'post_type' => 'news', // カスタム投稿名
						'posts_per_page' => 3, // 表示する数
					];
					$my_query = new WP_Query($args); ?>

					<?php if ($my_query->have_posts()) : // 投稿がある場合
					?>

						<ul class="news__list">

							<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

								<!-- ▽ ループ開始 ▽ -->

								<?php
								$length = 15;
								if (mb_strlen($post->post_title, 'UTF-8') > $length) :
									$title = mb_substr($post->post_title, 0, $length, 'UTF-8'); ?>
									<li class="news__item">
										<p class="news__item__day"><?php the_time('Y-m-d') ?></p>
										<p class="news__item__title"><a href="<?php the_permalink(); ?>"><?php echo $title . '…'; ?></a></p>
									</li>
								<?php else : ?>
									<li class="news__item">
										<p class="news__item__day"><?php the_time('Y-m-d') ?></p>
										<p class="news__item__title"><a href="<?php the_permalink(); ?>"><?php echo $post->post_title; ?></a></p>
									</li>
								<?php endif ?>

								<!-- △ ループ終了 △ -->

							<?php endwhile; ?>

						</ul>

					<?php
					else : // 投稿がない場合
					?>

						<p>まだ投稿がありません。</p>

					<?php
					endif;
					wp_reset_postdata();
					?>
				</div>
			</section>
		</div>
		<?php get_template_part('template-parts/contact'); ?>
	</main>

	<footer id="footer">
		<?php get_template_part('template-parts/footer'); ?>
	</footer>

	<?php get_footer(); ?>
</body>

</html>
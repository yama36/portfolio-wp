<div class="header-container">
	<div class="header__left-content">
		<div class="header__headding">
			<a href="<?php echo esc_url(home_url()); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/img/hedding-img.png" alt="見出し">
			</a>
		</div>
		<nav class="header__nav">

			<?php
			// メニューIDを取得する
			$menu_name = 'global_nav';
			$locations = get_nav_menu_locations();
			$menu = wp_get_nav_menu_object($locations[$menu_name]);

			$menu_items = wp_get_nav_menu_items($menu->term_id);
			?>

			<ul class="header__nav-container">
				<?php foreach ($menu_items as $item) : ?>
					<li class="nav-item">
						<a class="nav-link" href="<?php echo esc_attr($item->url); ?>"><?php echo esc_html($item->title); ?></a>
					</li>
				<?php endforeach ?>
			</ul>
		</nav>
	</div>
	<div class="header__right-content">
		<div class="header__ex-container">
			<div class="header__time">平日08:00〜20:00</div>
			<div class="header__phone">
				<img class="header__phone__img" src="<?php echo get_template_directory_uri(); ?>/img/phone-img.png" alt="電話アイコン">
				<p class="header__phone__number">0123-456-7890</p>
			</div>
		</div>
		<a href="<?php echo esc_url(home_url('/contact/')); ?>">
			<button class="header__request btn orange">資料請求</button>
		</a>
		<a href="<?php echo home_url('/contact/'); ?>">
			<button class="header__contact btn indigo">お問い合わせ</button>
		</a>
	</div>
	<div class="header__mobile-content">
		<div class="header__headding">
			<a href="<?php echo esc_url(home_url()); ?>">
				<img src="<?php echo get_template_directory_uri(); ?>/img/hedding-img.png" alt="見出し">
			</a>
		</div>
		<div class="header__menu-btn hamburger">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<nav class="globalMenuSp">
		<ul>
			<?php foreach ($menu_items as $item) : ?>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo esc_attr($item->url); ?>"><?php echo esc_html($item->title); ?></a>
				</li>
			<?php endforeach ?>
			<li>
				<a href="<?php echo esc_url(home_url('/contact/')); ?>">
					<button class="header__request btn orange">資料請求</button>
				</a>
				<a href="<?php echo esc_url(home_url('/contact/')); ?>">
					<button class="header__contact btn indigo">お問い合わせ</button>
				</a>
			</li>
		</ul>
	</nav>
	<div class="menuBackGround"></div>
</div>
<section id="singletop">
	<div class="singletop-container">
		<h1>
			<?php
			if (is_archive()) :
				echo get_queried_object()->labels->name;
				if (is_category()) :
					echo "ブログ";
				endif;
				if (is_tag()) :
					echo "ブログ";
				endif;
			else :
				the_title();
			endif;
			?>
		</h1>
		<?php if (is_archive()) : ?>
			<?php if (is_category()) : ?>
				<img class="singletop__img" src="<?php echo get_template_directory_uri(); ?>/img/posttop.png" alt="トップの画像">
			<?php else : ?>
				<img class="singletop__img" src="<?php echo get_template_directory_uri(); ?>/img/<?php echo get_queried_object()->name; ?>top.png" alt="トップの画像">
			<?php endif;
		else : ?>
			<img class="singletop__img" src="<?php echo get_template_directory_uri(); ?>/img/<?php echo esc_html(get_post(get_the_ID())->post_name); ?>top.png" alt="トップの画像">
		<?php endif; ?>
	</div>
</section>
<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
	<div class="breadcrumbs-container">
		<?php if (function_exists('bcn_display')) {
			bcn_display();
		} ?>
	</div>
</div>
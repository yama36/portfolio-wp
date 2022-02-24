<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Engress</title>
<meta name="description" content="日本人へのTOEFL指導歴豊かな講師陣のコーチング型TOEFLスクール" />
<meta name="robots" content="noindex" />
<!--css-->
<?php if (is_home()) : ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css" />
<?php elseif (is_archive() || is_page()) : ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/sub.css" />
<?php elseif (is_single()) : ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/single.css" />
<?php endif; ?>
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/modules/scroll-hint.css">
<!--script-->
<script src="//code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://kit.fontawesome.com/7f6a5aa382.js" crossorigin="anonymous"></script>

<?php wp_head(); ?>
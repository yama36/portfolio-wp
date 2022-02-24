<div class="footer-container">
  <nav class="footer__nav">
    <ul class="footer__nav-container">
      <?php
      // メニューIDを取得する
      $menu_name = 'global_nav';
      $locations = get_nav_menu_locations();
      $menu = wp_get_nav_menu_object($locations[$menu_name]);

      $menu_items = wp_get_nav_menu_items($menu->term_id);
      ?>

      <?php foreach ($menu_items as $item) : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo esc_attr($item->url); ?>"><?php echo esc_html($item->title); ?></a>
        </li>

        <?php if (next($menu_items)) : ?>
          <span>|</span>
        <?php endif ?>
      <?php endforeach ?>

    </ul>
  </nav>
  <div class="footer__address-container">
    <div class="footer__img-container">
      <a href="<?php echo esc_url(home_url()); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/img/hedding-img.png" alt="見出し">
      </a>
    </div>
    <div class="footer__address">
      <p><img class="header__phone__img" src="<?php echo get_template_directory_uri(); ?>/img/telw.png" alt="電話アイコン"> 0123-456-7890</p>
      <p>平日 08:00〜20:00</p>
    </div>
  </div>

</div>
<div class="copyright">
  <small>&copy;2020 Engress</small>
</div>
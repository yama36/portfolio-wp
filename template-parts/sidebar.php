<section id="sidebar">
  <div class="sidebar__post">
    <h3 class="sidebar__title">関連記事</h3>
    <?php
    foreach ((get_the_category()) as $cat) {
      $catid = $cat->cat_ID;
      break;
    }

    $get_posts_parm = 'numberposts=10&category=' . $catid;
    ?>
    <ul>
      <?php $posts = get_posts($get_posts_parm); ?>
      <?php
      for ($i = 0; $i <= 3; $i++) :
        $counts[$i] = $i;
      endfor;
      $end = end($counts);
      $count = 0; ?>
      <?php foreach ($posts as $post) : ?>
        <?php if ($count !== $end) : ?>
          <li>
            <?php if (has_post_thumbnail()) : ?>
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail(); ?>
              </a>
            <?php else : ?>
              <a href="<?php the_permalink(); ?>">
                <img class="sidebar__img__thumbnail" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/sample4.jpg)">
              </a>
            <?php endif; ?>
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
          </li>
          <?php $count++ ?>
        <?php else :
          break;
        endif; ?>
      <?php endforeach; ?>
    </ul>
  </div>

  <?php dynamic_sidebar('sidebar-1'); ?>
</section>
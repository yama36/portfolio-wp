<script src="<?php echo get_template_directory_uri(); ?>/js/modules/HBmenu.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/modules/accordion.js"></script>
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/modules/swiper.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/modules/breadcrumbs.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/modules/scroll-hint.min.js" type="text/javascript"></script>
<script>
window.addEventListener('DOMContentLoaded', function(){
  new ScrollHint('.js-scrollable', {
    i18n: {
      scrollable: 'スクロールします',
    },
    remainingTime: 3000,
  });
});
</script>

<?php wp_footer(); ?>
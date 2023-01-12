<?php get_header(); ?>

<style>
<?php include 'css/components/hero-templates/hero-template.css';
include 'css/components/another-equipments.css';
include 'css/page-templates/404.css';
?>
</style>

<?php get_template_part('templates/components/hero-section/template-part-head-press'); ?>
<!-- <div class="container dmbs-container"> -->
<?php
  global $title_icon_class;
  global $anatol_cat_title;
  $anatol_cat_title = '404';
  $title_icon_class = 'default';
 ?>
<!-- </div> -->

<div class="container page404--wrapper">
    <div class="page404">
        <h2>404</h2>
        <h3>Page not found</h3>
    </div>
    <div class="page404_txt">
        <p>The link is broken or the page has been moved.<br> Try these pages instead:</p>
        <ul>
            <li><a target="_blank" href="https://flash.anatol.com/">Flash</a></li>
            <li><a target="_blank" href="https://volt.anatol.com/">Volt</a></li>
            <li><a target="_blank" href="https://infinity.anatol.com/">Infinity</a></li>
            <li><a target="_blank" href="https://aries2.anatol.com/">Aries 2 Simulator</a></li>
        </ul>
    </div>
</div>
<!-- end content container -->
<?php get_template_part('templates/components/section-templates/another-equipments'); ?>
</div>
</div>


<?php get_footer(); ?>
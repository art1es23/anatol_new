
<h3 class="tab_item_title"><?php the_field('specifications_title'); ?></h3>
<!--<div class="row">
  <div class="col">
    <ul class="nav nav-pills mb-3 w-100">
      <li class="dropdown">
        <button type="button" class="btn btn-secondary dropdown-toggle" id="specifiations-dropdown" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
          Select a model
</button>
        <div class="dropdown-menu" aria-labelledby="specifiations-dropdown">
          <?php
          $i = 1;
          while (have_rows('specifications')) : the_row();
            ?>
            <a class="dropdown-item" id="specification-model-tab-<?php echo $i; ?>" data-toggle="tab" aria-selected="<?php echo ($i == 1) ? 'true' : 'false'; ?>" href="#specification-model-content-<?php echo $i; ?>"><?php the_sub_field('model'); ?></a>
            <?php $i++;
          endwhile;
          ?>
        </div>
      </li>
    </ul>
  </div>
</div>-->
<div class="row">
  <div class="col">
    <?php
    if (have_rows('specifications')) :
      $i = 1;
      $class = ''; ?>
      <div class="tab-content specifications-wrap" id="specifications-tab-content">
        <?php
        while (have_rows('specifications')) : the_row();
          $class = ($i == 1) ? 'active show' : '';
          ?>
          <div class="tab-pane fade <?php echo $class; ?>" id="specification-model-content-<?php echo $i; ?>" role="tabpanel" aria-labelledby="specification-model-tab-<?php echo $i; ?>">
            <div class="h-3 title">
              <?php the_sub_field('model'); ?>
            </div>
            <?php the_sub_field('table'); ?>
          </div>
          <?php
          $i++;
        endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</div>
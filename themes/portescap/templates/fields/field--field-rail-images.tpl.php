<div class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="field-items"<?php print $content_attributes; ?>>
    <?php
    $n = 0;
    foreach ($items as $delta => $item):
    $n++;
    ?>
      <div class="field-list-item <?php print $delta % 2 ? 'odd' : 'even'; ?>"<?php print $item_attributes[$delta]; ?>>
      	<h3><?php print t('Figure '); echo $n; ?></h3>
      	<?php print render($item); ?>
      </div>
    <?php endforeach;
    $n = 0;
    ?>
  </div>
</div>

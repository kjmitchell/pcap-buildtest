<?php
  // print '<pre>'; print_r($user); print '</pre>'; exit;
  $preview_image = base_path()."sites/all/themes/portescap/images/fpo-catalog-preview.jpg";
  $gear_image = base_path()."sites/all/themes/catalogbuilder/images/settings.png";
?>
<header class="main-header">
  <nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span> 
          <span class="icon-bar"></span>
        </button>
        <a title="<?php print t('Portescap Catalog Builder'); ?>" rel="home" id="logo" class="navbar-brand" href="<?php print base_path(); ?>catalogbuilder/catalogs-by-user">
          <span>Portescap</span><span>Catalog</span><span>Builder</span>
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="menu">
        <ul class="nav navbar-nav">
          <?php if($user->uid != 0 ) { ?>
          <li class="catalogs active"><a href="<?php echo base_path();?>catalogbuilder/catalogs-by-user">my catalogs</a></li>
          <li class="new-catalog"><a href="<?php echo base_path();?>catalogbuilder/catalogcreation">+ new catalog</a></li>
          <li class="user-settings">
            <a href="#"><img src="<?php echo $gear_image; ?>"><?php echo $user->name ?></a>
            <ul>
              <li class="change-password"><a class="overlay-exclude" href="#overlay=catalogbuilder/user/edit">change password</a></li>
              <li class="sign-out"><a href="<?php echo base_path();?>user/logout?destination=catalogbuilder/user">sign out</a></li>
            </ul>
          </li>
        
          <li class="help">
            <a href="#overlay=catalogbuilder/help">Help</a>
          </li>
        </ul>
        <?php } ?>

      </div>
    </div>
  </nav>
</header>
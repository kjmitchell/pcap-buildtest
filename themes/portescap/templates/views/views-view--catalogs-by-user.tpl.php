
<?php $preview_image = "sites/all/themes/portescap/images/fpo-catalog-preview.jpg";?>
<div id="catalog-page-by-user" class="row catalogs-page my-catalogs">

  <section class="col-xs-12">
    <div class="catalog-settings">
      <div class="container">
        <div class="settings-content row">
          <div class="setting-box col-xs-12">
            <a href="<?php echo base_path();?>catalogbuilder/catalogs-by-user#overlay=node/add/-add-a-catalog" class="btn btn-primary back" data-modal data-target="#add-section">+ NEW CATALOG</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="col-xs-12">
    <div class="row">
      <div class="container">
        <sidebar class="col-sm-3">
          <h4>Build Your Catalog</h4>
          <p>Welcome to the Portescap Catalog Builder, a special site that allows you to create custom product catalog PDFs that can be sent to your clients for their specific products design needs.</p>
          <div class="adobe-link">
            <p>Catalogs are produced as PDFs and will require Adobe Acrobat Reader. If you do not have Adobe Acrobat Reader, please download it here.</p>
            <a href="#">Adobe Reader</a>
          </div>
        </sidebar>

        <section class="main-content col-sm-9">
          <div class="row">
            <div class="col-xs-12">
              <h3>My Catalogs</h3>
            </div>
            <nav class="col-xs-12">
              <ul class="catalog-list">
              <?php foreach($view->result as $item) { ?>
                <li>
                  <header>
                    <time class="pull-left"><?php echo $item->node_title; ?></time>
                    <a href="#" class="delete pull-right">Delete</a>
                  </header>
                  <div class="body text-center">
                    <img src="<?php echo $preview_image; ?>" alt="preview-catalog" />
                  </div>
                  <footer class="text-center">
                    <div class="dropdown">
                      <button class="btn btn-dropdown dropdown-toggle" type="button" data-toggle="dropdown">MANAGE<span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li class="text-left"><a href="#">view</a></li>
                        <li class="text-left"><a href="#">rename</a></li>
                        <li class="text-left"><a href="#">download</a></li>
                        <li class="text-left"><a href="#">delete</a></li>
                      </ul>
                    </div>
                  </footer>
                </li>
              <?php } ?>
                <li class="add-new">
                  <a href="/section-page-by-user#overlay=node/add/section" class="overlay">+NEW</a>
                  <header>&nbsp;</header>
                  <div class="body text-center">
                    <img src="<?php echo $preview_image; ?>" alt="preview-catalog" />
                  </div>
                  <footer>&nbsp;</footer>
                </li>
              </ul>
            </nav>
            <p class="disclaimer col-xs-12">Catalogs are stored for 14 days, then deleted. Expired catalogs are not archived and can not be retrieved.</p>
          </div>
        </section>
      </div>
    </div>

  </section>


  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

</div>


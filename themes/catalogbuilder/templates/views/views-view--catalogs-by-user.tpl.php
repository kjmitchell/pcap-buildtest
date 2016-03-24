
<?php

global $user;
    $_SESSION["catalogbuilder"]['page'] = "catalog";

if ( !$user->uid ) {
    header('location:'.base_path().'catalogbuilder/user');
}

  $preview_image = base_path()."sites/all/themes/portescap/images/fpo-catalog-preview.jpg";
?>
<div id="catalog-page-by-user" class="row catalogs-page my-catalogs">

  <section class="col-xs-12">
    <div class="catalog-settings">
      <div class="container">
        <div class="settings-content row">
          <div class="setting-box col-xs-12">
            <a href="<?php echo base_path();?>catalogbuilder/catalogcreation" class="btn btn-primary back" data-modal data-target="#add-section">+ NEW CATALOG</a>
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
          <p>Welcome to the Portescap Catalog Builder, a special site that allows you to create custom product catalog PDFs that can be sent to your customers for their specific products design needs.</p>
          <div class="adobe-link">
            <p>Catalogs are produced as PDFs and will require Adobe Acrobat Reader. If you do not have Adobe Acrobat Reader, please download it here.</p>
            <a href="https://get.adobe.com/reader/" target="_blank">Adobe Reader</a>
          </div>
        </sidebar>

        <section class="main-content col-sm-9">
          <div class="row">
            <div class="col-xs-12">
              <h3>My Catalogs</h3>
            </div>
            <nav class="col-xs-12">
              <ul class="catalog-list">
              <?php foreach($view->result as $item) { 

                if($user->uid == $item->node_uid){

                   $main_catalog_name = str_replace(' ','_', $item->node_title);
                   $main_catalog_name = str_replace('-','_', $main_catalog_name);
                   $main_catalog_name = str_replace(':','_', $main_catalog_name);
                   $main_catalog_name = str_replace('|','_', $main_catalog_name);
                   $main_catalog_name = str_replace('___','_', $main_catalog_name);

                   $pdf_file = $main_catalog_name."_".$item->nid.".pdf";  
                  //$pdf_file = 'catalog_'.$item->nid.'.pdf';
                ?>
                <li>
                  <header>
                    <a href="<?php echo base_path().'catalogbuilder/sections-by?catalog='.$item->nid; ?>" class="pull-left"><?php echo $item->node_title; ?></a>
                    <a href="<?php echo base_path().'catalogbuilder/catalogs-by-user#overlay=node/'.$item->nid.'/delete%3Fdestination%3Dcatalogbuilder/catalogs-by-user' ?>" class="delete pull-right">Delete</a>
                  </header>

                  <a href="<?php echo base_path().'catalogbuilder/sections-by?catalog='.$item->nid; ?>" class="body text-center">
                    <span class=""><?php echo $item->_field_data['nid']['entity']->field_specs_quantity['und'][0]['value']; ?>pp</span>

                    <img src="<?php echo $preview_image; ?>" alt="preview-catalog" />
                  </a>

                  <footer class="text-center">
                    <div class="dropdown">
                      <button class="btn btn-dropdown dropdown-toggle" type="button" data-toggle="dropdown">MANAGE<span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <?php $actual_link = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>
                        <li class="text-left"><a href="<?php echo base_path().'catalogbuilder/sections-by?catalog='.$item->nid; ?>">view</a></li>
                        <li class="text-left"><a href="<?php echo base_path().'catalogbuilder/catalogs-by-user#overlay=node/'.$item->nid.'/edit%3Fdestination%3Dcatalogbuilder/catalogs-by-user';?>">Rename</a></li>
                        <li class="text-left"><a href="<?php echo base_path().'download/catalog?ref='.$actual_link.'&pdf='.$pdf_file;?>">Download</a></li>
                        <li class="text-left"><a href="" data-print-pdf="<?php echo 'http://'.$_SERVER['HTTP_HOST'].base_path().'sites/default/files/'.$pdf_file;?>"
>Print</a></li>

                        <li class="text-left"><a href="<?php echo base_path().'catalogbuilder/catalogs-by-user#overlay=node/'.$item->nid.'/delete%3Fdestination%3Dcatalogbuilder/catalogs-by-user' ?>">Delete</a></li>
                      </ul>
                    </div>
                  </footer>
                </li>
              <?php }
            } ?>
                <li class="add-new">
                  <a href="<?php echo base_path();?>catalogbuilder/catalogcreation" class="overlay">+NEW</a>
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


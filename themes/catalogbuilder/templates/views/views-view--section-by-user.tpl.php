
<?php


global $user;

if ( !$user->uid ) {
    header('location:'.base_path().'catalogbuilder/user');
}

if(isset($_GET['catalog']) && $_GET['catalog']!=2){
  $catalog_id = $_GET['catalog']; 
  $catalog = node_load($catalog_id);

  if($_GET['catalog']!=1){
    $_SESSION["catalogbuilder"]['catalog_id'] = $catalog_id;
        $_SESSION["catalogbuilder"]['page'] = "sections";
  }

  if($catalog){
    //$main_catalog_name = 'catalog_'.$catalog->nid.'.pdf';

    $main_catalog_name = str_replace(' ','_', $catalog->title);
    $main_catalog_name = str_replace('-','_', $main_catalog_name);
    $main_catalog_name = str_replace(':','_', $main_catalog_name);
    $main_catalog_name = str_replace('|','_', $main_catalog_name);
    $main_catalog_name = str_replace('___','_', $main_catalog_name);

    $main_catalog_name = $main_catalog_name."_".$catalog->nid.".pdf";

  }
}else if($_GET['catalog']==2){//comes from redirect after save

  $catalog_id = $_SESSION["catalogbuilder"]['catalog_id']; 
  $catalog = node_load($catalog_id);

  if($catalog){
    //$main_catalog_name = 'catalog_'.$catalog->nid.'.pdf';

    $main_catalog_name = str_replace(' ','_', $catalog->title);
    $main_catalog_name = str_replace('-','_', $main_catalog_name);
    $main_catalog_name = str_replace(':','_', $main_catalog_name);
    $main_catalog_name = str_replace('|','_', $main_catalog_name);
    $main_catalog_name = str_replace('___','_', $main_catalog_name);

    $main_catalog_name = $main_catalog_name."_".$catalog->nid.".pdf";
  }
}

  if(isset($catalog->field_include_pdf_brand['und'][0]['value'])){
    $brand = $catalog->field_include_pdf_brand['und'][0]['value'];
  }

  if(isset($catalog->field_include_pdf_covers['und'][0]['value'])){
    $cover = $catalog->field_include_pdf_covers['und'][0]['value'];
  }

  if(isset($catalog->field_include_pdf_appendix['und'][0]['value'])){
    $appendix = $catalog->field_include_pdf_appendix['und'][0]['value'];
  }

  $path = str_replace("index.php","",$_SERVER['ORIG_PATH_INFO']);
  $path = $path.'sites/default/files/';
  $root = $_SERVER['DOCUMENT_ROOT'].$path; 
  $url_path = $_SERVER['SERVER_NAME'].$path;

  if($user->uid == $catalog->uid){

?>


<div id="section-page-by-user" class="row catalogs-page new-catalogs">

  <section class="col-xs-12">
    <div class="catalog-settings">
      <div class="container">
        <div class="settings-content row">
          <div class="setting-box col-sm-6">
            <a href="<?php echo base_path().'catalogbuilder/catalogs-by-user';?>" class="btn btn-primary back">BACK</a>
            <a href="sections-by?catalog=<?php echo $catalog_id; ?>#overlay=node/add/catalog-b-sections/<?php echo $catalog_id; ?>" class="btn btn-primary back" data-modal data-target="#add-section">ADD A SECTION</a>
          </div>
          <div class="setting-box col-sm-6">
            <div class="pull-right">
              <?php $actual_link = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"; ?>
              <?php if(isset($main_catalog_name)){?>
              <a href="<?php echo base_path().'download/catalog?ref='. $actual_link .'&pdf='.$main_catalog_name;?>" class="actions download">
                  Download
              </a>
              <a href="#" data-print-pdf="<?php echo 'http://'.$_SERVER['HTTP_HOST'].base_path().'sites/default/files/'.$main_catalog_name;?>" class="actions print">
                  Print
              </a>
              <a href="<?php echo base_path().'catalogbuilder/catalogs-by-user#overlay=node/'.$catalog_id.'/delete%3Fdestination%3Dcatalogbuilder/catalogs-by-user' ?>" class="actions delete" data-modal data-target="#delete-catalog">
                  Delete
              </a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="time-box col-xs-12">
    <div class="container">
      <time datetime="<?php echo isset($catalog->created)?$catalog->created:'';?>">
        <span class="date"><?php echo isset($catalog->title)?$catalog->title:'';?></span>
      </time>
      <a href="<?php echo'#overlay=node/'.$catalog_id.'/edit%3Fdestination%3Dcatalogbuilder/sections-by';?>" class="rename secondary-link" data-modal data-target="#rename-catalog">rename</a>
    </div>
  </section>

  <section class="col-xs-12">
    <div class="row">
      <div class="container">
        <sidebar class="left-preview-colum col-sm-3">

          <div class="sidebar-wrapper">
            <div class="preview-catalog">
              <img src="/sites/all/themes/portescap/images/fpo-catalog-preview.jpg" alt="catalog preview">
            </div>
            <div class="frm preview-form">
              <div class="form-group pc-checkbox">
                <input type="checkbox" class="catalog-covers" value="cover" id="covers" name="covers" <?php print(isset($cover) ? ($cover == '1' ? 'checked' : '') : 'checked') ?> data-service="http://<?php echo $_SERVER['HTTP_HOST'].base_path();?>catalogbuilder/addcoverpdf?catalog=<?php echo $catalog_id; ?>"/>
                <label for="covers">Include Covers</label>
              </div>
              <div class="form-group pc-checkbox">
                <input type="checkbox" class="catalog-covers" value="brand" id="brand" name="brand" <?php print(isset($brand) ? ($brand == '1' ? 'checked' : '') : 'checked') ?> data-service="http://<?php echo $_SERVER['HTTP_HOST'].base_path();?>catalogbuilder/addcoverpdf?catalog=<?php echo $catalog_id; ?>"/>
                <label for="brand">Include Portescap Content Chapter</label>
              </div>
              <div class="form-group pc-checkbox">
                <input type="checkbox" class="catalog-covers" value="appendix" id="appendix" name="appendix" <?php print(isset($appendix) ? ($appendix == '1' ? 'checked' : '') : 'checked') ?> data-service="http://<?php echo $_SERVER['HTTP_HOST'].base_path();?>catalogbuilder/addcoverpdf?catalog=<?php echo $catalog_id; ?>"/>
                <label for="appendix">Include Engineer's Appendix</label>
              </div>
            </div>
          </div>
        </sidebar>

        <section class="col-sm-9">
          <?php

            $total_qp = new COM("DebenuPDFLibraryAX1212.PDFLibrary");
            $validKey = $total_qp->UnlockKey("j68sm7gm81x7gu36n5sm6x35y");
            $total_qp->ClearFileList('total_pdf_list');
            
            $specs_quantity = 0;            

            if(isset($cover) && $cover==1){
              $total_result1 = $total_qp->AddToFileList('total_pdf_list', $root."portescap_catalog_front_cover.pdf");
              $specs_quantity++;        
            }

            if(isset($brand) && $brand==1){
              $total_result1 = $total_qp->AddToFileList('total_pdf_list', $root."portescap_catalog_brand_pages.pdf");
              $specs_quantity++;
            }         

            foreach($view->result as $item) {

            if($user->uid == $item->node_uid){
 
                $technology_chapter = $item->_field_data['nid']['entity']->field_add_technology_chapter['und'][0]['value'];

                $qp = new COM("DebenuPDFLibraryAX1212.PDFLibrary");
                $validKey = $qp->UnlockKey("j68sm7gm81x7gu36n5sm6x35y");

          
            //$qp->ClearFileList('pdf_list'); 
          ?>
          <div class="catalog-section">
            <div class="item-box">
              <header>
                <img width="70" src="<?php  echo $GLOBALS['base_url']."/sites/default/files/".$item->field_field_products_and_specs[0]['raw']['entity']->field_image['und'][0]['filename']; ?>" alt="" class="item-thumbnail pull-left" />
                <h3 class="pull-left"><?php echo $item->node_title; ?></h3>

              </header>

              <div class="form-group pc-checkbox">
                  <input type="checkbox" class="technology-covers" value="technology" id="technology-<?php echo $item->nid; ?>" name="technology" <?php print(isset($technology_chapter) ? ($technology_chapter == '1' ? 'checked' : '') : 'checked') ?> data-service="http://<?php echo $_SERVER['HTTP_HOST'].base_path();?>catalogbuilder/addtechnology?catalog=<?php echo $catalog_id; ?>&section=<?php echo $item->nid; ?>"/>
                  <label for="technology-<?php echo $item->nid; ?>">Include Technology Chapter</label>
              </div>

              <div class="body">
                <nav>
                  <ul>
                  <?php 

                  $pdf_file_name = "section_".$item->nid."_".$item->node_created.".pdf";
                  $specs_pdf = array();
                  //echo "<br>";



                  foreach ($item->field_field_specs_from_products as $key => $value) { ?>
                    <li class="pull-left"><?php echo $value['raw']['entity']->title ?></li>
                    <?php 
                    $specs_quantity++;
                    if(isset($value['raw']['entity']->field_specification_sheet['und'][0]['nid'])){
                      $specs_pdf[] = $value['raw']['entity']->field_specification_sheet['und'][0]['nid'];
                    }
                  } 

                  $nodes_info=node_load_multiple($specs_pdf);

                  if(isset($technology_chapter) && $technology_chapter==1){
                    $product_pdf = "";
                    switch ($item->node_title) {
                        case "Related Products":
                            $product_pdf = "gearhead_encoders";
                            break;
                        case "Application Specific Motor Solutions":
                            $product_pdf = "motors_surgical_applications";
                            break;
                        case "Can Stack Linear Actuators":
                            $product_pdf = "can_stack_linear_actuators";
                            break;
                        case "Disc Magnet Motors":
                            $product_pdf = "disc_magnet_motors";
                            break;
                        case "Can Stack Motors":
                            $product_pdf = "can_stack_motors";
                            break;
                        case "Brushless DC Motors":
                            $product_pdf = "brushless_dc_motors";
                            break;
                        case "Brush DC Motors":
                            $product_pdf = "brush_dc_motors";
                            break;
                    }
                    //$result1 = $qp->AddToFileList('pdf_list', $root.$product_pdf.".pdf");
                    $total_result1 = $total_qp->AddToFileList('total_pdf_list', $root.$product_pdf.".pdf");
                    $specs_quantity++;
                  }
                  
                  foreach ($nodes_info as $node) {
                    if(isset($node->field_file['und'][0]['uri'])){
                      $file = str_replace("public://",'',$node->field_file['und'][0]['uri']);
                      //$result1 = $qp->AddToFileList('pdf_list', $root.$node->field_file['und'][0]['filename']);
                      $total_result1 = $total_qp->AddToFileList('total_pdf_list', $root.$file);
                    }
                  }

                $fileName = $root.$pdf_file_name; 

                $qp =null;
                ?>
                  </ul>
                </nav>
              </div>
              <footer class="text-center">
                <div class="dropdown">
                  <button class="btn btn-dropdown dropdown-toggle" type="button" data-toggle="dropdown">MANAGE<span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li class="text-left"><a href="<?php echo base_path().'catalogbuilder/sections-by?catalog='.$catalog_id.'#overlay=node/'.$item->nid.'/edit';?>">Edit</a></li>
                    <li class="text-left"><a href="<?php echo base_path().'catalogbuilder/sections-by?catalog='.$catalog_id.'#overlay=node/'.$item->nid.'/delete%3Fdestination%3Dcatalogbuilder/sections-by'; ?>">Delete</a></li>   
                  </ul>
                </div>
              </footer>
            </div>
          </div>
          <?php }
        }

          if(isset($main_catalog_name)){
            if(isset($appendix) && $appendix==1){
              $total_result1 = $total_qp->AddToFileList('total_pdf_list', $root."portescap_catalog_engineer_appendix.pdf");
              $specs_quantity++;
            }
            if(isset($cover) && $cover==1){
              $total_result1 = $total_qp->AddToFileList('total_pdf_list', $root."portescap_catalog_back_cover.pdf");
              $specs_quantity++;
            }

            if(isset($specs_quantity)){ 
                $catalog_data = node_load($catalog_id);
                $catalog_data->field_specs_quantity['und'][0]['value'] = $specs_quantity;
                $update_catalog = node_save($catalog_data);
            }           
            $result = $total_qp->MergeFileListFast('total_pdf_list', $root.$main_catalog_name);
          }
          $total_qp =null;

           ?>

          <div class="catalog-section add-section text-center">
            <a href="sections-by?catalog=<?php echo $catalog_id; ?>#overlay=node/add/catalog-b-sections/<?php echo $catalog_id; ?>" data-modal data-target="#add-section">+ add a section</a>
          </div>
        </section>
      </div>
    </div>

  </section>


  <?php 
  }
  else{
?>
    <div id="messages">
      <div class="section clearfix">
        <p>You are not allow to display this catalog info.</p>
      </div>
  </div>
  <?php } 

  if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

</div>


<?php require_once('./config.php'); ?>
 <!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
<style>


    </style>
    <?php require_once('inc/header.php') ?>
    <body class="layout-top-nav layout-fixed layout-navbar-fixed" style="height: auto;">
    <div class="wrapper">
     <?php $page = isset($_GET['page']) ? $_GET['page'] : 'home';  ?>
     <?php require_once('inc/topBarNav.php') ?>
     <?php if($_settings->chk_flashdata('success')): ?>
     <script>
     alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
     </script>
     <?php endif;?>    

        <?php if($page == "home"): ?>
        
            
        <?php endif; ?>

        <section class="content">
          <div class="container">
            <?php 
              if(!file_exists($page.".php") && !is_dir($page)){
                 include $page.'/about.php';
              }else{
                if(is_dir($page))
                  include $page.'/index.php';
                else
                  include $page.'.php';

              }
            ?>
      </div>
      </section>
      <div class="modal fade" id="confirm_modal" role='dialog'>
      <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
      <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-success" id='confirm' onclick="">Continue</button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-right"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
      <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
      <img src="" alt="">
      </div>
      </div>
      </div>
      </div>
      <?php require_once('inc/footer.php') ?>
  </body>
  </html>

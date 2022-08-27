<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">
<div id="wrapper">
  <div id="content-wrapper">
    <div class="container-fluid">
      <body class="bg-dark">
        <div class="container">
          <div class="card card-login mx-auto mt-5">
            <div class="card-header">Login</div>
            <div class="card-body">
              <form action="<?php echo base_url('login/aksi_login'); ?>" method="post">  
                <div class="form-group">
                  <div>
                    <input type="text" name="username" class="form-control" placeholder="username" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <div>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="remember-me">
                      Remember Password
                    </label>
                  </div>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Login">
              </form>
              <div class="text-center">
                User : admin <br>
                Pass : admin 
              </div>
            </div>
          </div>
        </div>
        <?php $this->load->view("admin/_partials/scrolltop.php") ?>
    <?php $this->load->view("admin/_partials/modal.php") ?>
    <?php $this->load->view("admin/_partials/js.php") ?>
        
    </body>
</html>
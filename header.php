<!DOCTYPE html>
<html>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <head>
      <?php wp_head(); ?>
    </head>
<body>
<script>
    function changeFontSize(Procentage) {
        document.body.style.fontSize = Procentage + "%";
    }
</script>
<div class="container-fluid p-0 nav">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/image.png" width="80" height="80"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="navbarNav" aria-labelledby="navbarNavLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="navbarNavLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="nav justify-content-center">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo home_url(); ?>">Sakums<span class="visually-hidden"></span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Kategorija
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php
              $categories = get_categories();
              foreach ($categories as $category) {
                echo '<a class="dropdown-item" href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>';
              }
              ?>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="check" href="<?php echo home_url('index.php/lapins'); ?>">Lapa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo home_url('index.php/Overwatch'); ?>">Galerija</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="float-end pr-3">
      <button class="btn btn-outline-success me-2" type="button" onclick="changeFontSize(100)">100%</button>
      <button class="btn btn-outline-success" type="button" onclick="changeFontSize(200)">200%</button>
    </div>
  </nav>
</div>
</body>
</html>
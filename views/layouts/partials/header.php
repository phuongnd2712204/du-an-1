<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="<?php BASE_URL?>" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1><?= $GLOBALS['settings']['logo'] ?? null ?></h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="<?php BASE_URL ?>">Trang chủ</a></li>
          <li class="dropdown"><a href="<?php BASE_URL?>">
            <span>Danh mục</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <?php foreach($categoriesForMenu as $item) :?>
              <li><a href="<?php BASE_URL?> ?act=category&id=<?=$item['id']?>"><?= $item['name']?></a></li>
            <?php endforeach;?>
            </ul>
          </li>

          <li><a href="about.html">About</a></li>
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="position-relative">
        <a href="" class="mx-2"><span class="bi-facebook"></span></a>
        <a href="<?= $GLOBALS['settings']['logo'] ?? null ?>" class="mx-2"><span class="bi-twitter"></span></a>
        <a href="<?= $GLOBALS['settings']['logo'] ?? null ?>" class="mx-2"><span class="bi-instagram"></span></a>

        <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">
          <form action="search-result.html" class="search-form">
            <span class="icon bi-search"></span>
            <input type="text" placeholder="Search" class="form-control">
            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->

      </div>

    </div>

  </header><!-- End Header -->

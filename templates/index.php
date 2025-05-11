

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Coffee - Free Bootstrap 4 Template by Colorlib</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">


  <link rel="stylesheet" href="/css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="/css/owl.carousel.min.css">
  <link rel="stylesheet" href="/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="/css/magnific-popup.css">
  <link rel="stylesheet" href="/css/animate.css">
  <link rel="stylesheet" href="/css/aos.css">
  <link rel="stylesheet" href="/css/ionicons.min.css">
  <link rel="stylesheet" href="/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="/css/jquery.timepicker.css">
  <link rel="stylesheet" href="/css/flaticon.css">
  <link rel="stylesheet" href="/css/icomoon.css">
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="/">Coffee <small>Blend</small></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="/admin/uj-etel" class="nav-link">Admin</a></li>
      </ul>
    </div>
  </div>
</nav>


<section class="home-slider owl-carousel">
  <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row slider-text justify-content-center align-items-center">
        <div class="col-md-7 col-sm-12 text-center ftco-animate">
         
        </div>
      </div>
    </div>
  </div>
</section>


<section class="ftco-section">
  <div class="container">
    <div class="row">
      <?php foreach ($types as $type): ?>
      <div class="col-md-6 mb-5 pb-3">
        <h3 class="mb-5 heading-pricing ftco-animate"><?= htmlspecialchars($type['name']) ?></h3>
        <?php if (empty($firstFive[$type['id']])): ?>
          <p class="ftco-animate"><em>Nincs elérhető étel ebben a kategóriában.</em></p>
        <?php else: ?>
          <?php foreach ($firstFive[$type['id']] as $dish): ?>
          <div class="pricing-entry d-flex ftco-animate mb-3">
            <div class="desc pl-3">
              <div class="d-flex justify-content-between align-items-center">
                <h3><span><?= htmlspecialchars($dish['name']) ?></span></h3>
                <span class="price">$<?= number_format($dish['price'], 2) ?></span>
              </div>
              <div class="d-block">
                <p><?= nl2br(htmlspecialchars($dish['description'])) ?></p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- Full menu: tabbed by type -->
<section class="ftco-menu mb-5 pb-5">
  <div class="container">
    <div class="row d-md-flex">
      <div class="col-lg-12 ftco-animate p-md-5">
        <div class="row">
          <!-- Tab links -->
          <div class="col-md-12 nav-link-wrap mb-5">
            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist">
              <?php foreach ($types as $i => $type): ?>
              <a
                class="nav-link <?= $i === 0 ? 'active' : '' ?>"
                id="v-pills-<?= $i ?>-tab"
                data-toggle="pill"
                href="#v-pills-<?= $i ?>"
                role="tab"
                aria-controls="v-pills-<?= $i ?>"
                aria-selected="<?= $i === 0 ? 'true' : 'false' ?>"
              >
                <?= htmlspecialchars($type['name']) ?>
              </a>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- Tab content panes -->
          <div class="col-md-12 d-flex align-items-center">
            <div class="tab-content ftco-animate" id="v-pills-tabContent">
              <?php foreach ($types as $i => $type): ?>
              <div
                class="tab-pane fade <?= $i === 0 ? 'show active' : '' ?>"
                id="v-pills-<?= $i ?>"
                role="tabpanel"
                aria-labelledby="v-pills-<?= $i ?>-tab"
              >
                <div class="row">
                  <?php if (empty($fullList[$type['id']])): ?>
                    <div class="col-12"><em>Nincs elérhető étel ebben a kategóriában.</em></div>
                  <?php else: ?>
                    <?php foreach ($fullList[$type['id']] as $dish): ?>
                    <div class="col-md-4 text-center mb-4">
                      <div class="menu-wrap">
                        <div class="text">
                          <h3><a href="#"><?= htmlspecialchars($dish['name']) ?></a></h3>
                          <p><?= nl2br(htmlspecialchars($dish['description'])) ?></p>
                          <p class="price"><span>$<?= number_format($dish['price'], 2) ?></span></p>
                        </div>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="ftco-footer ftco-section img">
  <div class="overlay"></div>
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">About Us</h2>
          <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the
             blind texts.</p>
          <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4">
          <h2 class="ftco-heading-2">Recent Blog</h2>
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
            <div class="text">
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
              </div>
            </div>
          </div>
          <div class="block-21 mb-4 d-flex">
            <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
            <div class="text">
              <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
              <div class="meta">
                <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                <div><a href="#"><span class="icon-chat"></span> 19</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
        <div class="ftco-footer-widget mb-4 ml-md-4">
          <h2 class="ftco-heading-2">Services</h2>
          <ul class="list-unstyled">
            <li><a href="#" class="py-2 d-block">Cooked</a></li>
            <li><a href="#" class="py-2 d-block">Deliver</a></li>
            <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
            <li><a href="#" class="py-2 d-block">Mixed</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <p>
          Copyright &copy;
          <script>document.write(new Date().getFullYear());</script>
          All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by 
          <a href="https://colorlib.com" target="_blank">Colorlib</a>
        </p>
      </div>
    </div>
  </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
  <svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
  </svg>
</div>

<!-- JS -->
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery-migrate-3.0.1.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.easing.1.3.js"></script>
<script src="/js/jquery.waypoints.min.js"></script>
<script src="/js/jquery.stellar.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/aos.js"></script>
<script src="/js/jquery.animateNumber.min.js"></script>
<script src="/js/bootstrap-datepicker.js"></script>
<script src="/js/jquery.timepicker.min.js"></script>
<script src="/js/scrollax.min.js"></script>
<script src="/js/main.js"></script>

</body>
</html>

<?php
 
  $isEdit     = isset($type);
  $action     = $isEdit
                ? "/admin/etel-tipusok?id={$type['id']}"
                : "/admin/etel-tipusok";
  $submitLabel = $isEdit ? "Mentés" : "Létrehozás";
?>
<!DOCTYPE html>
<html lang="hu">
<head>
  <title>Admin – Étel típusok</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">

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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light">
  <div class="container">
    <a class="navbar-brand" href="/admin/uj-etel-tipus">Admin – Étel típusok</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="/admin/uj-etel" class="nav-link">Ételek</a></li>
        <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
      </ul>
    </div>
  </div>
</nav>


<section class="ftco-section">
  <div class="container">
    <div class="row">

      
      <div class="col-md-6 mb-5 pb-3">
        <h3><?= $isEdit ? "Típus szerkesztése" : "Új típus" ?></h3>
        <form method="post" action="<?= $action ?>">
          <?php if($isEdit): ?>
            <input type="hidden" name="id" value="<?= htmlspecialchars($type['id']) ?>">
          <?php endif ?>

          <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Név</label>
            <div class="col-sm-10">
              <input
                type="text"
                class="form-control"
                id="inputName"
                name="name"
                required
                value="<?= $isEdit ? htmlspecialchars($type['name']) : '' ?>"
              >
            </div>
          </div>

          <div class="form-group row">
            <label for="inputDesc" class="col-sm-2 col-form-label">Leírás</label>
            <div class="col-sm-10">
              <textarea
                class="form-control"
                id="inputDesc"
                name="description"
                rows="3"
              ><?= $isEdit ? htmlspecialchars($type['description']) : '' ?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary"><?= $submitLabel ?></button>
              <?php if($isEdit): ?>
                <a href="/admin/uj-etel-tipus" class="btn btn-secondary">Mégse</a>
              <?php endif ?>
            </div>
          </div>
        </form>
      </div>

     
      <div class="col-md-6" style="max-height: calc(100vh - 200px); overflow-y:auto;">
        <?php foreach($types as $t): ?>
          <div class="row mb-4">
            <div class="d-flex ftco-animate">
              <div class="desc pl-3 flex-grow-1">
                <div class="d-flex justify-content-between align-items-center">
                  <h3><span><?= htmlspecialchars($t['name']) ?></span></h3>
                </div>
                <div class="d-block mb-2">
                  <p><?= nl2br(htmlspecialchars($t['description'])) ?></p>
                </div>
                <div class="btn-group">
                  <a
                    href="/admin/etel-tipusok?id=<?= $t['id'] ?>"
                    class="btn btn-sm btn-outline-warning"
                  >Szerkesztés</a>
                  <form
                    method="post"
                    action="/admin/etel-tipusok/delete"
                    style="display:inline;"
                    onsubmit="return confirm('Biztos törlöd a típust?');"
                  >
                    <input type="hidden" name="id" value="<?= $t['id'] ?>">
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                      Törlés
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div>

    </div>
  </div>
</section>


<div id="ftco-loader" class="show fullscreen">
  <svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
  </svg>
</div>

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

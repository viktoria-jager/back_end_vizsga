<?php
 
  $isEdit = isset($dish);

  $action   = $isEdit ? "/admin/etelek?id={$dish['id']}" : "/admin/etelek";
  $submitLabel = $isEdit ? "Mentés" : "Létrehozás";
?>
<!DOCTYPE html>
<html lang="hu">
<head>
  <title>Admin – Ételek</title>
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
    <a class="navbar-brand" href="/admin/uj-etel">Admin – Ételek</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="/admin/uj-etel-tipus" class="nav-link">Étel típusok</a></li>
      </ul>
    </div>
  </div>
</nav>


<section class="ftco-section">
  <div class="container">
    <div class="row">
      
      <div class="col-md-6 mb-5 pb-3">
        <h3><?= $isEdit ? "Étel szerkesztése" : "Új étel" ?></h3>
        <form method="post" action="<?= $action ?>">
          <?php if($isEdit): ?>
            
            <input type="hidden" name="id" value="<?= htmlspecialchars($dish['id']) ?>">
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
                value="<?= $isEdit ? htmlspecialchars($dish['name']) : '' ?>"
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
              ><?= $isEdit ? htmlspecialchars($dish['description']) : '' ?></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputPrice" class="col-sm-2 col-form-label">Ár</label>
            <div class="col-sm-10">
              <input
                type="number"
                class="form-control"
                id="inputPrice"
                name="price"
                required
                value="<?= $isEdit ? htmlspecialchars($dish['price']) : '' ?>"
              >
            </div>
          </div>

          <div class="form-group row">
            <label for="inputType" class="col-sm-2 col-form-label">Típus</label>
            <div class="col-sm-10">
              <select
                name="dishTypeId"
                id="inputType"
                class="form-control"
                required
              >
                <option value="">– válassz –</option>
                <?php foreach($types as $type): ?>
                  <option
                    value="<?= $type['id'] ?>"
                    <?= $isEdit && $dish['dishTypeId']==$type['id'] ? 'selected' : '' ?>
                  >
                    <?= htmlspecialchars($type['name']) ?>
                  </option>
                <?php endforeach ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-2">Elérhető</div>
            <div class="col-sm-10">
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  id="gridCheck1"
                  name="isActive"
                  value="1"
                  <?= $isEdit && $dish['isActive'] ? 'checked' : '' ?>
                >
              </div>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary"><?= $submitLabel ?></button>
              <?php if($isEdit): ?>
                <a href="/admin/uj-etel" class="btn btn-secondary">Mégse</a>
              <?php endif ?>
            </div>
          </div>
        </form>
      </div>

      
      <div class="col-md-6" style="max-height: calc(100vh - 200px); overflow-y:auto;">
        <?php foreach($dishes as $d): ?>
          <div class="pricing-entry d-flex ftco-animate mb-3">
            <div class="desc pl-3 flex-grow-1">
              <div class="d-flex justify-content-between align-items-center">
                <h3><span><?= htmlspecialchars($d['name']) ?></span></h3>
                <span class="price">$<?= number_format($d['price'], 2) ?></span>
              </div>
              <div class="d-block mb-2">
                <small><?= htmlspecialchars($d['typeName']) ?></small>
                <p><?= nl2br(htmlspecialchars($d['description'])) ?></p>
              </div>
              <div class="btn-group">
                <a
                  href="/admin/etelek?id=<?= $d['id'] ?>"
                  class="btn btn-sm btn-outline-warning"
                >
                  Szerkesztés
                </a>
                <form
                  method="post"
                  action="/admin/etelek/delete"
                  style="display:inline;"
                  onsubmit="return confirm('Biztos törlöd az ételt?');"
                >
                  <input type="hidden" name="id" value="<?= $d['id'] ?>">
                  <button type="submit" class="btn btn-sm btn-outline-danger">
                    Törlés
                  </button>
                </form>
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

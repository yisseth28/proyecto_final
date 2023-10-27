<?php
require_once "class/User.php";
require_once "layout/header.php";
User::auth();
?>
  <div class="container-scroller">
    <?php include_once "layout/topbar.php"; ?>
    <div class="container-fluid page-body-wrapper">
      <?php include_once "layout/sidebar.php"; ?>
      <div class="main-panel">
        <div class="content-wrapper">
            <h1>Dashboard</h1>
        </div>
        <?php include_once "partials/footer.php"; ?>
      </div>
    </div>
  </div>
  <?php require_once "layout/footer.php"?>

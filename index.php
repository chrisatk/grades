<?php
require_once( __DIR__ . '/common_functions.php' );
/** PHPExcel_IOFactory */
require_once ( __DIR__ . '/Classes/vendor/autoload.php' );
require_once( __DIR__ . '/Classes/MyClasses/autoloader.php' );
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Request form for TI Teacher Software.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Grade Analyzer</title>

    <link rel="icon" href="images/icon.png">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-red.min.css">
    <!--<link rel='stylesheet' href='https://cdn.rawgit.com/kybarg/mdl-selectfield/mdl-menu-implementation/mdl-selectfield.min.css'> -->
    <link rel="stylesheet" href="css/mdl-selectfield.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
    #view-source {
      position: fixed;
      display: block;
      right: 0;
      bottom: 0;
      margin-right: 40px;
      margin-bottom: 40px;
      z-index: 900;
    }
    </style>
  </head>
  <body>
    <div class="demo-layout mdl-layout mdl-layout--fixed-header mdl-js-layout mdl-color--grey-100">
      <header class="demo-header mdl-layout__header mdl-layout__header--scroll mdl-color--grey-100 mdl-color-text--grey-800">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title">Awards Calculator</span>
          <div class="mdl-layout-spacer"></div>
        </div>
      </header>
      <div class="demo-ribbon"></div>
      <main class="demo-main mdl-layout__content">
        <div class="demo-container mdl-grid">
          <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
          <div class="demo-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--8-col">
            <h3>Options</h3>

                <div>
                  <a href="honour-roll.php"><button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
                    Honour Roll
                  </button></a>
                </div>

                <br />

                <div>
                  <a href="task2.php"><button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
                    Task 2
                  </button></a>
                </div>

                <br />

          </div>
        </div>

        <footer class="demo-footer mdl-mini-footer">
          <div class="mdl-mini-footer--left-section">
            <ul class="mdl-mini-footer--link-list">
              <li><a href="mailto:chris.atkinson@ocsb.ca">Help</a></li>
              <li><a href="#">Privacy and Terms</a></li>
            </ul>
          </div>
        </footer>
      </main>
    </div>
    <!-- <a href="https://github.com/google/material-design-lite/blob/mdl-1.x/templates/article/" target="_blank" id="view-source" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast">View Source</a> -->
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <!--<script src='https://cdn.rawgit.com/kybarg/mdl-selectfield/mdl-menu-implementation/mdl-selectfield.min.js'></script>-->
    <script src='js/mdl-selectfield.min.js'></script>
  </body>
</html>

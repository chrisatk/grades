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

    <link rel="icon" href="/images/icon.png">

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
            <h3>Honour Roll List</h3>



            <?php if ( $_POST ) {

              /** Error reporting */
              error_reporting(E_ALL);
              ini_set('display_errors', TRUE);
              ini_set('display_startup_errors', TRUE);

              if ($_FILES["file"]["error"] > 0) {
                echo "Error: " . $_FILES["file"]["error"] . "<br>";
              }

              $inputFileName = $_FILES['file']['tmp_name'];
              $objPHPExcel = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);
              $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
              $rowCount = $objPHPExcel->getActiveSheet()->getHighestRow();

              $student_number_index = array_search("StdntNo",$sheetData[1]);
              $course_index = array_search("Course",$sheetData[1]);
              $grade_index = array_search("Gr",$sheetData[1]);

              $student_list = array();

              for ($i = 2; $i < (count($sheetData)+1); $i++) {
                $student_number = $sheetData[$i][$student_number_index];
                $course = $sheetData[$i][$course_index];
                $grade = $sheetData[$i][$grade_index];

                // If the student does not yet exist, then create a new one
                $student = "";
                if ( !isset( $student_list[$student_number] ) ) {
                  $student = new Student( $student_number, $grade );
                }
// This line doesn't work yet.
//                $student_list[$student_number]->addCourse($course,$section,$mark);

                echo "<p>".$student_number." - ".$course."</p>\n";
              }


            } else {

              echo "<form action=". $_SERVER['PHP_SELF']. " name=add method=POST enctype=\"multipart/form-data\">\n\n";

              echo "<p>Please upload the spreadsheet of data.</p>\n\n";

              echo "<p><label for=\"file\">Filename:</label>\n";
              echo "<input type=\"file\" name=\"file\" id=\"file\" accept=\"text/csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel\" runat=\"server\" /></p>\n\n";

              echo "<br /><br />\n";
              echo "<div><button class=\"mdl-button mdl-js-button mdl-button--raised mdl-button--accent\" name=\"submit\" type=\"submit\">Submit</button></div>\n";
              echo "</form>\n";

            }

            ?>


            <br /><br />

            <div>
              <a href="index.php"><button class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent">
                Return to Menu
              </button></a>
            </div>


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

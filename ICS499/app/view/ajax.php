<?php

session_start();

include '../config/database.php';
include '../includes/autoLoader.php';

// (A) INVALID AJAX REQUEST
if (!isset($_POST["req"])) {
  exit("INVALID REQUEST");
}

require "../config/cal-core.php";

switch ($_POST["req"]) {
    // (B) DRAW CALENDAR FOR MONTH
  case "draw":
    // (B1) DATE RANGE CALCULATIONS
    // NUMBER OF DAYS IN MONTH
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $_POST["month"], $_POST["year"]);
    // FIRST & LAST DAY OF MONTH
    $dateFirst = "{$_POST["year"]}-{$_POST["month"]}-01";
    $dateLast = "{$_POST["year"]}-{$_POST["month"]}-{$daysInMonth}";
    // DAY OF WEEK - NOTE 0 IS SUNDAY
    $dayFirst = (new DateTime($dateFirst))->format("w");
    $dayLast = (new DateTime($dateLast))->format("w");

    // (B2) DAY NAMES
    $sunFirst = true; // CHANGE THIS IF YOU WANT MON FIRST
    $days = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    if ($sunFirst) {
      array_unshift($days, "Sunday");
    } else {
      $days[] = "Sunday";
    }
    foreach ($days as $d) {
      echo "<div class='calsq head bg-gradient bg-primary text-white'>$d</div>";
    }
    unset($days);

    // (B3) PAD EMPTY SQUARES BEFORE FIRST DAY OF MONTH
    if ($sunFirst) {
      $pad = $dayFirst;
    } else {
      $pad = $dayFirst == 0 ? 6 : $dayFirst - 1;
    }
    for ($i = 0; $i < $pad; $i++) {
      echo "<div class='calsq blank'></div>";
    }

    // (B4) DRAW DAYS IN MONTH
    $events = $_CAL->get($_POST["month"], $_POST["year"]);

    $nowMonth = date("n");
    $nowYear = date("Y");
    $nowDay = ($nowMonth == $_POST["month"] && $nowYear == $_POST["year"]) ? date("j") : 0;
    for ($day = 1; $day <= $daysInMonth; $day++) { ?>
      <div class="calsq day<?= $day == $nowDay ? " today" : "" ?>" data-day="<?= $day ?>">
        <div class="calnum"><?= $day ?></div>
        <div>
          <?php if (isset($events["d"][$day])) {
            foreach ($events["d"][$day] as $eid) {
              $employeeContr = new EmployeeContr();
              $employee = $employeeContr->selectEmployee($events["e"][$eid]["employee_id"]);

              if ($_SESSION['valid_user'] == $events["e"][$eid]["employee_id"] || $_SESSION['role'] == "Admin") {
          ?>
                <div class="calevt " data-eid="<?= $eid ?>" style="background:<?= $events["e"][$eid]["leave_color"] ?>">
                  <?= $events["e"][$eid]["leave_reason"] . " - " . $employee[0]['first_name'] . " " . $employee[0]['last_name'] ?>
                </div>
          <?php if ($day == $events["e"][$eid]["first"]) {
                  echo "<div id='evt$eid' class='calninja'>" . json_encode($events['e'][$eid]) . "</div>";
                }
              }
            }
          } ?>
        </div>
      </div>
<?php }

    // (B5) PAD EMPTY SQUARES AFTER LAST DAY OF MONTH
    if ($sunFirst) {
      $pad = $dayLast == 0 ? 6 : 6 - $dayLast;
    } else {
      $pad = $dayLast == 0 ? 0 : 7 - $dayLast;
    }
    for ($i = 0; $i < $pad; $i++) {
      echo "<div class='calsq blank'></div>";
    }
    break;

    // (C) SAVE EVENT
  case "save":
    if (!is_numeric($_POST["eid"])) {
      $_POST["eid"] = null;
    }
    echo $_CAL->save(
      $_POST["start"],
      $_POST["end"],
      $_POST["txt"],
      $_POST["employeeID"],
      isset($_POST["eid"]) ? $_POST["eid"] : null
    ) ? "OK" : $_CAL->error;
    break;

    // (D) DELETE EVENT
  case "del":
    echo $_CAL->del($_POST["eid"], $_POST["employeeID"],  $_POST["start"], $_POST["end"]) ? "OK" : $_CAL->error;
    break;
}

?>
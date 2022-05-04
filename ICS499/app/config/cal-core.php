<?php

class Calendar {
  // (A) CONSTRUCTOR - CONNECT TO DATABASE
  private $pdo = null;
  private $stmt = null;

  public $error = "";
  function __construct() {
    try {
      $this->pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET,
        DB_USER,
        DB_PASSWORD,
        [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
      );
    } catch (Exception $ex) {
      exit($ex->getMessage());
    }
  }

  // (B) DESTRUCTOR - CLOSE DATABASE CONNECTION
  function __destruct() {
    if ($this->stmt !== null) {
      $this->stmt = null;
    }
    if ($this->pdo !== null) {
      $this->pdo = null;
    }
  }

  // (C) HELPER - EXECUTE SQL QUERY
  function exec($sql, $data = null) {
    try {
      $this->stmt = $this->pdo->prepare($sql);
      $this->stmt->execute($data);
      return true;
    } catch (Exception $ex) {
      $this->error = $ex->getMessage();
      return false;
    }

  }

  // (D) SAVE EVENT
  function save($start, $end, $txt, $employeeID, $id = null) {
    // (D1) START & END DATE QUICK CHECK
    $uStart = strtotime($start);
    $uEnd = strtotime($end);
    if ($uEnd < $uStart) {
      $this->error = "End date cannot be earlier than start date";
      return false;
    }

    // (D2) SQL - INSERT OR UPDATE
    if ($id == null) {
      $sql = "INSERT INTO `emp_leave` (`leave_start`, `leave_end`, `leave_reason`, `leave_color`, `employee_id`) VALUES (?,?,?,?,?)";
      $color = "#e4edff";
      
      $data = [$start, $end, $txt, $color, $employeeID];
    } else {
      if ($_SESSION['role'] == 'Admin') {
        $mailContr = new MailContr();
        $employeeContr = new EmployeeContr();
        $employee = $employeeContr->selectEmployee($employeeID);

        $color = "#90EE90";
        $email = $employee[0]['email_address'];
        $status = "Approved!";
        $startDate = date('M j, Y', strtotime($start));
        $endDate = date('M j, Y', strtotime($end));

        $mailContr->createMessage($email, $status, $startDate, $endDate);

        $employeeContr = new EmployeeContr();
        $employee = $employeeContr->selectEmployee($employeeID);
        $num = $employee[0]['num_leave'] + 1;   
        $employeeContr->updateEmpNumLeave($employeeID, $num);
      } else {
        $color = "#e4edff";
      }
      $sql = "UPDATE `emp_leave` SET `leave_start`=?, `leave_end`=?, `leave_reason`=?, `leave_color`=?, `employee_id`=? WHERE `leave_id`=?";
      $data = [$start, $end, $txt, $color, $employeeID, $id];
    }

    // (D3) EXECUTE
    return $this->exec($sql, $data);
  }

  // (E) DELETE EVENT
  function del($id, $employeeID, $start, $end) {
    $mailContr = new MailContr();
    $employeeContr = new EmployeeContr();
    $employee = $employeeContr->selectEmployee($employeeID);

    $email = $employee[0]['email_address'];
    $status = "Denied!";
    $startDate = date('M j, Y', strtotime($start));
    $endDate = date('M j, Y', strtotime($end));

    $mailContr->createMessage($email, $status, $startDate, $endDate);
    return $this->exec("DELETE FROM `emp_leave` WHERE `leave_id`=?", [$id]);
  }

  // (F) GET emp_leave FOR SELECTED MONTH
  function get($month, $year) {
    // (F1) FIST & LAST DAY OF MONTH
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $dayFirst = "{$year}-{$month}-01 00:00:00";
    $dayLast = "{$year}-{$month}-{$daysInMonth} 23:59:59";

    // (F2) GET emp_leave
    if (!$this->exec(
      "SELECT * FROM `emp_leave` WHERE (
        (`leave_start` BETWEEN ? AND ?)
        OR (`leave_end` BETWEEN ? AND ?)
        OR (`leave_start` <= ? AND `leave_end` >= ?)
      )",
      [$dayFirst, $dayLast, $dayFirst, $dayLast, $dayFirst, $dayLast]
    )) {
      return false;
    }

    // $emp_leave = [
    //  "e" => [ EVENT ID => [DATA], EVENT ID => [DATA], ... ],
    //  "d" => [ DAY => [EVENT IDS], DAY => [EVENT IDS], ... ]
    // ]
    $emp_leave = ["e" => [], "d" => []];
    while ($row = $this->stmt->fetch()) {
      $eStartMonth = substr($row["leave_start"], 5, 2);
      $eEndMonth = substr($row["leave_end"], 5, 2);
      $eStartDay = $eStartMonth == $month
        ? (int)substr($row["leave_start"], 8, 2) : 1;
      $eEndDay = $eEndMonth == $month
        ? (int)substr($row["leave_end"], 8, 2) : $daysInMonth;
      for ($d = $eStartDay; $d <= $eEndDay; $d++) {
        if (!isset($emp_leave["d"][$d])) {
          $emp_leave["d"][$d] = [];
        }
        $emp_leave["d"][$d][] = $row["leave_id"];
      }
      $emp_leave["e"][$row["leave_id"]] = $row;
      $emp_leave["e"][$row["leave_id"]]["first"] = $eStartDay;
    }

    return $emp_leave;
  }

}

// (G) DATABASE SETTINGS - CHANGE TO YOUR OWN!
define("DB_HOST", "localhost");
define("DB_NAME", "emp_management");
define("DB_CHARSET", "utf8");
define("DB_USER", "root");
define("DB_PASSWORD", "");

// (H) NEW CALENDAR OBJECT
$_CAL = new Calendar();

?>

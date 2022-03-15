<?php  

$employeeContr = new EmployeeContr();
$departmentContr = new DepartmentContr();
$leaveContr = new LeaveContr();
$attendanceContr = new AttendanceContr();

$totalEmp = $employeeContr->showTotalEmployeeNum();
$totalDept = $departmentContr->showTotalDeptNum();
$totalLeave = $leaveContr->showTotalLeaveByStatus("pending");
$totalActive= $attendanceContr->showTotalAttendanceByStatus("active");

?>
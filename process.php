<?php
session_start();

if (!isset($_SESSION['payroll'])) {
    $_SESSION['payroll'] = array();
}

$employee = array(
    'employee_id'      => $_POST['employee_id'],
    'full_name'        => $_POST['full_name'],
    'email'            => $_POST['email'],
    'contact'          => $_POST['contact'],
    'department'       => $_POST['department'],
    'position'         => $_POST['position'],
    'employment_type'  => $_POST['employment_type'],
    'basic_salary'     => $_POST['basic_salary'],
    'working_days'     => $_POST['working_days'],
    'overtime_hours'   => $_POST['overtime_hours']
);

$_SESSION['payroll'][] = $employee;

header("Location: admin.php");
exit();
?>

<?php
session_start();

if (isset($_GET['delete'])) {
    $index = $_GET['delete'];
    if (isset($_SESSION['payroll'][$index])) {
        unset($_SESSION['payroll'][$index]);
        $_SESSION['payroll'] = array_values($_SESSION['payroll']); // reindex
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payroll Management Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
        }
        header {
            background-color: #996666;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        nav {
            background-color: #CC9999;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: #fff;
            margin-right: 20px;
            text-decoration: none;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .container {
            padding: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #996666;
            color: #fff;
        }
        .delete-btn {
            background-color: #c0392b;
            color: #fff;
            border: none;
            padding: 6px 10px;
            cursor: pointer;
            text-decoration: none;
        }
        .delete-btn:hover {
            background-color: #922b21;
        }
    </style>
</head>
<body>

<header>
    <h1>Payroll Management Dashboard</h1>
</header>

<nav>
    <a href="index.php">Back to Home</a>
    <a href="admin.php">Dashboard</a>
</nav>

<div class="container">
    <h2>Payroll Records</h2>

    <table>
        <tr>
            <th>Employee No.</th>
            <th>Employee ID</th>
            <th>Full Name</th>
            <th>Email Address</th>
            <th>Department</th>
            <th>Position</th>
            <th>Employment Type</th>
            <th>Basic Salary</th>
            <th>Working Days</th>
            <th>Overtime Hours</th>
            <th>Action</th>
        </tr>

        <?php if (!empty($_SESSION['payroll'])): ?>
            <?php foreach ($_SESSION['payroll'] as $index => $record): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo $record['employee_id']; ?></td>
                    <td><?php echo $record['full_name']; ?></td>
                    <td><?php echo $record['email']; ?></td>
                    <td><?php echo $record['department']; ?></td>
                    <td><?php echo $record['position']; ?></td>
                    <td><?php echo $record['employment_type']; ?></td>
                    <td>₱ <?php echo number_format($record['basic_salary'], 2); ?></td>
                    <td><?php echo $record['working_days']; ?></td>
                    <td><?php echo $record['overtime_hours']; ?></td>
                    <td>
                        <a href="delete.php?id=<?= $row['id']; ?>" 
   class="delete-btn"
   data-id="<?= $row['id']; ?>">
   Delete
</a>

                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="11">No payroll records found.</td>
            </tr>
        <?php endif; ?>

    </table>
</div>

</body>
</html>

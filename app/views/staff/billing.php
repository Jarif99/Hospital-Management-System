<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Staff Billing</title>

    <link rel="stylesheet" href="../../css/staff.css">

</head>

<body>

<div class="sidebar">

    <h2>Staff</h2>

    <a href="StaffController.php?page=dashboard">
        Dashboard
    </a>

    <a href="StaffController.php?page=appointment">
        Appointments
    </a>

    <a href="StaffController.php?page=patient_list">
        Patient List
    </a>

    <a href="StaffController.php?page=billing">
        Billing
    </a>

    <a href="StaffController.php?page=upload_report">
        Upload Report
    </a>

    <a href="../../auth/logout.php">
        Logout
    </a>

</div>

<div class="main">

    <h1>
        All Bills
    </h1>

    <table border="1" width="100%">

        <tr>

            <th>Patient Name</th>

            <th>Amount</th>

            <th>Status</th>

            <th>Date</th>

        </tr>

        <?php if (!empty($bills)) { ?>

            <?php foreach ($bills as $bill) { ?>

                <tr>

                    <td>
                        <?= htmlspecialchars($bill['patient_name']); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($bill['amount']); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($bill['payment_status']); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($bill['bill_date']); ?>
                    </td>

                </tr>

            <?php } ?>

        <?php } else { ?>

            <tr>

                <td colspan="4">
                    No bills found.
                </td>

            </tr>

        <?php } ?>

    </table>

</div>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Staff Appointments</title>

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
        All Appointments
    </h1>

    <table border="1" width="100%">

        <tr>

            <th>Patient</th>

            <th>Doctor</th>

            <th>Date</th>

            <th>Time</th>

            <th>Status</th>

        </tr>

        <?php if (!empty($appointments)) { ?>

            <?php foreach ($appointments as $appointment) { ?>

                <tr>

                    <td>
                        <?= htmlspecialchars($appointment['patient_name']); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($appointment['doctor_name']); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($appointment['appointment_date']); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($appointment['appointment_time']); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($appointment['status']); ?>
                    </td>

                </tr>

            <?php } ?>

        <?php } else { ?>

            <tr>

                <td colspan="5">
                    No appointments found.
                </td>

            </tr>

        <?php } ?>

    </table>

</div>

</body>

</html>
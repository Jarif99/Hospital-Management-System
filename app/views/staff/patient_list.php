<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Patient List</title>

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
        Patients
    </h1>

    <table border="1" width="100%">

        <tr>

            <th>Name</th>

            <th>Email</th>

            <th>Status</th>

        </tr>

        <?php if (!empty($patients)) { ?>

            <?php foreach ($patients as $patient) { ?>

                <tr>

                    <td>
                        <?= htmlspecialchars($patient['full_name']); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($patient['email']); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($patient['status']); ?>
                    </td>

                </tr>

            <?php } ?>

        <?php } else { ?>

            <tr>

                <td colspan="3">
                    No patients found.
                </td>

            </tr>

        <?php } ?>

    </table>

</div>

</body>

</html>
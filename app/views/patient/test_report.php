<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>My Test Reports</title>

    <link rel="stylesheet" href="../../css/patient.css">

</head>

<body>

<div class="sidebar">

    <h2>Patient</h2>

    <a href="PatientController.php?page=dashboard">
        Dashboard
    </a>

    <a href="PatientController.php?page=appointment">
        Appointment
    </a>

    <a href="PatientController.php?page=prescription">
        Prescription
    </a>

    <a href="PatientController.php?page=billing">
        Billing
    </a>

    <a href="PatientController.php?page=test_report">
        Test Report
    </a>

    <a href="PatientController.php?page=profile">
        Profile
    </a>

    <a href="../../auth/logout.php">
        Logout
    </a>

</div>

<div class="main">

    <h1>My Test Reports</h1>

    <table border="1">

        <tr>

            <th>Report Name</th>

            <th>Date</th>

            <th>Download</th>

        </tr>

        <?php if (!empty($reports)) { ?>

            <?php foreach ($reports as $report) { ?>

                <tr>

                    <td>
                        <?= htmlspecialchars($report['report_title']); ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($report['test_date']); ?>
                    </td>

                    <td>

                        <a href="../../uploads/<?= htmlspecialchars($report['report_file']); ?>"
                           target="_blank">
                            View Report
                        </a>

                    </td>

                </tr>

            <?php } ?>

        <?php } else { ?>

            <tr>

                <td colspan="3">
                    No test reports found.
                </td>

            </tr>

        <?php } ?>

    </table>

</div>

</body>

</html>
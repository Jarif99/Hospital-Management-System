<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>My Profile</title>

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

    <h1>My Profile</h1>


    <?php if (!empty($patient)) { ?>

        <p>
            <strong>Name:</strong>
            <?= htmlspecialchars($patient['full_name']); ?>
        </p>


        <p>
            <strong>Email:</strong>
            <?= htmlspecialchars($patient['email']); ?>
        </p>


        <p>
            <strong>Role:</strong>
            <?= htmlspecialchars($patient['role']); ?>
        </p>


    <?php } else { ?>

        <p>
            Patient information not found.
        </p>

    <?php } ?>


</div>

</body>

</html>
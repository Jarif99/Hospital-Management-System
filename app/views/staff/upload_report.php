<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <title>Upload Test Report</title>

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
        Upload Test Report
    </h1>

    <form action="StaffController.php?page=upload_report"
          method="POST"
          enctype="multipart/form-data">

        <input type="hidden"
               name="upload_report"
               value="1">

        <label>
            Patient
        </label>

        <br>

        <select name="patient_id" required>

            <option value="">
                Select Patient
            </option>

            <?php if (!empty($patients)) { ?>

                <?php foreach ($patients as $patient) { ?>

                    <option value="<?= htmlspecialchars($patient['id']); ?>">

                        <?= htmlspecialchars($patient['full_name']); ?>

                    </option>

                <?php } ?>

            <?php } ?>

        </select>

        <br><br>

        <label>
            Report Title
        </label>

        <br>

        <input type="text"
               name="title"
               required>

        <br><br>

        <label>
            Test Date
        </label>

        <br>

        <input type="date"
               name="test_date"
               required>

        <br><br>

        <label>
            Upload File
        </label>

        <br>

        <input type="file"
               name="file"
               required>

        <br><br>

        <button type="submit">
            Upload
        </button>

    </form>

</div>

</body>

</html>
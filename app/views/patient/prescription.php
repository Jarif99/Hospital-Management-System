<!DOCTYPE html>
<html>


<head>

<title>My Prescription</title>

<link rel="stylesheet" href="../../../css/patient.css">

</head>



<body>



<div class="sidebar">


<h2>
Patient
</h2>



<a href="../../controllers/PatientController.php?page=dashboard">
Dashboard
</a>


<a href="../../controllers/PatientController.php?page=appointment">
Appointment
</a>


<a href="../../controllers/PatientController.php?page=prescription">
Prescription
</a>


<a href="../../controllers/PatientController.php?page=billing">
Billing
</a>


<a href="../../controllers/PatientController.php?page=test_report">
Test Report
</a>


<a href="../../controllers/PatientController.php?page=profile">
Profile
</a>


<a href="../../auth/logout.php">
Logout
</a>


</div>





<div class="main">


<h1>
My Prescription
</h1>




<table border="1" width="100%">


<tr>

<th>Doctor</th>

<th>Diagnosis</th>

<th>Medicine</th>

<th>Advice</th>

</tr>




<?php foreach($prescriptions as $row){ ?>

<tr>


<td>
<?= $row['doctor_name']; ?>
</td>


<td>
<?= $row['diagnosis']; ?>
</td>


<td>
<?= $row['medicine']; ?>
</td>


<td>
<?= $row['advice']; ?>
</td>


</tr>


<?php } ?>



</table>



</div>



</body>


</html>
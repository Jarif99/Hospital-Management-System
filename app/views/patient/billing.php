<!DOCTYPE html>
<html>


<head>

<title>My Bills</title>

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
My Bills
</h1>



<table border="1">


<tr>

<th>Service</th>

<th>Amount</th>

<th>Status</th>

<th>Date</th>

</tr>




<?php foreach($bills as $bill){ ?>


<tr>


<td>
<?= $bill['service_name']; ?>
</td>


<td>
৳ <?= $bill['amount']; ?>
</td>


<td>
<?= $bill['payment_status']; ?>
</td>


<td>
<?= $bill['bill_date']; ?>
</td>


</tr>



<?php } ?>



</table>



</div>



</body>


</html>
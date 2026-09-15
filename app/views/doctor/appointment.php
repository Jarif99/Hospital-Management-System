<!DOCTYPE html>
<html>

<head>

<title>Doctor Appointment</title>

<link rel="stylesheet" href="../../../css/doctor.css">

</head>


<body>


<div class="main">


<h1>
Appointments
</h1>



<table border="1" width="100%">


<tr>

<th>
Patient Name
</th>

<th>
Date
</th>

<th>
Time
</th>

<th>
Status
</th>

</tr>




<?php foreach($appointments as $appointment){ ?>


<tr>


<td>
<?= $appointment['patient_name']; ?>
</td>


<td>
<?= $appointment['appointment_date']; ?>
</td>


<td>
<?= $appointment['appointment_time']; ?>
</td>


<td>
<?= $appointment['status']; ?>
</td>



</tr>


<?php } ?>



</table>



</div>



</body>

</html>
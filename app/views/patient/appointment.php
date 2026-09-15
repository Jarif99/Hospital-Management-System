<!DOCTYPE html>
<html>


<head>

<title>Book Appointment</title>

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
Book Appointment
</h1>



<form action="../../controllers/PatientController.php" method="POST">


<input type="hidden" name="book_appointment" value="1">



<label>
Select Doctor
</label>


<br>


<select name="doctor_id" required>


<option value="">
Choose Doctor
</option>



<?php foreach($doctors as $doctor){ ?>


<option value="<?= $doctor['id']; ?>">

<?= $doctor['full_name']; ?>

</option>


<?php } ?>


</select>



<br><br>


<label>
Appointment Date
</label>


<br>


<input 
type="date"
name="appointment_date"
required>



<br><br>


<label>
Appointment Time
</label>


<br>


<input 
type="time"
name="appointment_time"
required>



<br><br>


<button type="submit">

Book Appointment

</button>



</form>



</div>



</body>

</html>
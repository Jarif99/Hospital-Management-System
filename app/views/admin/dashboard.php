<!DOCTYPE html>
<html>

<head>

<title>Admin Dashboard</title>

<link rel="stylesheet" href="../../../css/admin.css">

</head>


<body>


<div class="main">


<h1>
Admin Dashboard
</h1>



<div class="cards">



<div class="card">

<h3>
Total Doctors
</h3>

<h2>
<?= $totalDoctor; ?>
</h2>

</div>




<div class="card">

<h3>
Total Patients
</h3>

<h2>
<?= $totalPatient; ?>
</h2>

</div>




<div class="card">

<h3>
Total Staff
</h3>

<h2>
<?= $totalStaff; ?>
</h2>

</div>




<div class="card">

<h3>
Total Appointment
</h3>

<h2>
<?= $totalAppointment; ?>
</h2>

</div>




<div class="card">

<h3>
Total Revenue
</h3>

<h2>
৳ <?= $totalRevenue; ?>
</h2>

</div>




</div>



</div>



</body>

</html>
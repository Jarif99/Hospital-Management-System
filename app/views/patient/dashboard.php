<!DOCTYPE html>
<html>


<head>

<title>Patient Dashboard</title>

<link rel="stylesheet" href="../../../css/patient.css">

<link 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
rel="stylesheet">

</head>



<body>



<div class="sidebar">


<h2>

<i class="fa-solid fa-hospital-user"></i>

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

Welcome Patient 👋

</h1>


<p>

Manage your healthcare easily

</p>



<div class="cards">



<div class="card">

<i class="fa-solid fa-calendar-check"></i>

<h3>
Appointments
</h3>

<h2>
5
</h2>

</div>




<div class="card">

<i class="fa-solid fa-user-doctor"></i>

<h3>
Upcoming Visit
</h3>

<h2>
2
</h2>

</div>




<div class="card">

<i class="fa-solid fa-file-medical"></i>

<h3>
Test Reports
</h3>

<h2>
3
</h2>

</div>



</div>



</div>



</body>

</html>
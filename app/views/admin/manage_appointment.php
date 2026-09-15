<?php
// Session check, DB connection and the appointment query now live in
// AdminController.php, which already loads this file with $result ready.
?>


<!DOCTYPE html>
<html>

<head>


<title>Manage Appointment</title>


<link rel="stylesheet" href="../css/admin.css">


<link 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
rel="stylesheet">


</head>



<body>




<!-- Sidebar -->


<div class="sidebar">


<h2>

<i class="fa-solid fa-hospital"></i>

Admin

</h2>




<a href="dashboard.php">

<i class="fa-solid fa-house"></i>

Dashboard

</a>





<a href="manage_doctor.php">

<i class="fa-solid fa-user-doctor"></i>

Manage Doctor

</a>





<a href="manage_patient.php">

<i class="fa-solid fa-user-group"></i>

Manage Patient

</a>





<a href="manage_appointment.php">

<i class="fa-solid fa-calendar-check"></i>

Manage Appointment

</a>





<a href="manage_staff.php">

<i class="fa-solid fa-user-tie"></i>

Manage Staff

</a>





<a href="billing.php">

<i class="fa-solid fa-money-bill"></i>

Billing

</a>





<a href="../auth/logout.php">

<i class="fa-solid fa-right-from-bracket"></i>

Logout

</a>




</div>







<!-- Main -->


<div class="main">



<h1>

Manage Appointment

</h1>






<table border="1" width="100%">



<tr>


<th>ID</th>

<th>Patient</th>

<th>Doctor</th>

<th>Date</th>

<th>Time</th>

<th>Status</th>

<th>Action</th>


</tr>







<?php


foreach($result as $row)

{


?>



<tr>



<td>

<?php echo $row['id']; ?>

</td>





<td>

<?php echo $row['patient_name']; ?>

</td>





<td>

<?php echo $row['doctor_name']; ?>

</td>





<td>

<?php echo $row['appointment_date']; ?>

</td>





<td>

<?php echo $row['appointment_time']; ?>

</td>





<td>

<?php echo $row['status']; ?>

</td>







<td>





<?php

if($row['status']=="pending")

{


?>



<a href="approve_appointment.php?id=<?php echo $row['id']; ?>">

<button>

Approve

</button>

</a>





<a href="cancel_appointment.php?id=<?php echo $row['id']; ?>">

<button>

Cancel

</button>

</a>



<?php


}

else

{

echo "No Action";

}


?>






</td>





</tr>






<?php


}


?>




</table>





</div>






</body>

</html>
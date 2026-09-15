<!DOCTYPE html>
<html>


<head>

<title>Billing</title>


<link rel="stylesheet" href="../../../css/admin.css">


<link 
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" 
rel="stylesheet">


</head>




<body>



<div class="sidebar">


<h2>

<i class="fa-solid fa-hospital"></i>

Admin

</h2>




<a href="../controllers/AdminController.php?page=dashboard">

Dashboard

</a>




<a href="../controllers/AdminController.php?page=manage_doctor">

Manage Doctor

</a>




<a href="../controllers/AdminController.php?page=manage_patient">

Manage Patient

</a>




<a href="../controllers/AdminController.php?page=manage_staff">

Manage Staff

</a>




<a href="../controllers/AdminController.php?page=billing">

Billing

</a>




<a href="../../auth/logout.php">

Logout

</a>



</div>






<div class="main">



<h1>

Create Patient Bill

</h1>






<form action="../../controllers/AdminController.php" method="POST">





<input type="hidden" name="create_bill" value="1">





<label>

Select Patient

</label>


<br>



<select name="patient_id" required>



<option value="">

Select Patient

</option>




<?php foreach($patients as $patient){ ?>



<option value="<?= $patient['id']; ?>">


<?= $patient['full_name']; ?>


</option>




<?php } ?>



</select>






<br><br>






<label>

Service Name

</label>


<br>



<input 
type="text"
name="service_name"
placeholder="Consultation Fee"
required>






<br><br>






<label>

Amount

</label>


<br>



<input 
type="number"
name="amount"
placeholder="Enter Amount"
required>






<br><br>






<label>

Bill Date

</label>


<br>



<input 
type="date"
name="bill_date"
required>






<br><br>





<button type="submit">

Generate Bill

</button>






</form>






</div>





</body>

</html>
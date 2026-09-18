<!DOCTYPE html>
<html>

<head>

<title>Manage Staff</title>

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




<a href="../../auth/logout.php">

Logout

</a>



</div>






<div class="main">


<h1>

Manage Staff

</h1>





<table border="1" width="100%">


<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Status</th>

<th>Action</th>


</tr>





<?php foreach($result as $staff){ ?>


<tr>



<td>

<?= $staff['id']; ?>

</td>




<td>

<?= $staff['full_name']; ?>

</td>




<td>

<?= $staff['email']; ?>

</td>




<td>

<?= $staff['status']; ?>

</td>





<td>



<?php if($staff['status']=="pending"){ ?>



<a href="../../controllers/AdminController.php?action=approveStaff&id=<?= $staff['id']; ?>">

<button>

Approve

</button>

</a>






<a href="../../controllers/AdminController.php?action=rejectStaff&id=<?= $staff['id']; ?>">

<button>

Reject

</button>

</a>



<?php } ?>






<a href="../../controllers/AdminController.php?action=deleteStaff&id=<?= $staff['id']; ?>">

<button>

Delete

</button>

</a>




</td>



</tr>




<?php } ?>



</table>



</div>



</body>

</html>
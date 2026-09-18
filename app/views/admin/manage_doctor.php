<!DOCTYPE html>
<html>

<head>

<title>Manage Doctor</title>

<link rel="stylesheet" href="../../../css/admin.css">

</head>


<body>


<div class="main">


<h1>
Manage Doctors
</h1>



<table border="1" width="100%">


<tr>

<th>Name</th>

<th>Email</th>

<th>Status</th>

<th>Action</th>

</tr>



<?php foreach($result as $doctor){ ?>


<tr>


<td>
<?= $doctor['full_name']; ?>
</td>


<td>
<?= $doctor['email']; ?>
</td>


<td>
<?= $doctor['status']; ?>
</td>


<td>


<a href="../../controllers/AdminController.php?action=approve&id=<?= $doctor['id']; ?>">
Approve
</a>


<a href="../../controllers/AdminController.php?action=reject&id=<?= $doctor['id']; ?>">
Reject
</a>


<a href="../../controllers/AdminController.php?action=deleteDoctor&id=<?= $doctor['id']; ?>">
Delete
</a>



</td>


</tr>



<?php } ?>



</table>



</div>



</body>

</html>
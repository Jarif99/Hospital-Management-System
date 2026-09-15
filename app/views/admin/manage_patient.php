<!DOCTYPE html>
<html>

<head>

<title>Manage Patient</title>

<link rel="stylesheet" href="../../../css/admin.css">

</head>


<body>


<div class="main">


<h1>
Manage Patient
</h1>



<table border="1" width="100%">


<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Status</th>

<th>Action</th>

</tr>



<?php foreach($result as $patient){ ?>


<tr>


<td>
<?= $patient['id']; ?>
</td>


<td>
<?= $patient['full_name']; ?>
</td>


<td>
<?= $patient['email']; ?>
</td>


<td>
<?= $patient['status']; ?>
</td>


<td>


<a href="../../controllers/AdminController.php?action=approvePatient&id=<?= $patient['id']; ?>">
Approve
</a>


<a href="../../controllers/AdminController.php?action=rejectPatient&id=<?= $patient['id']; ?>">
Reject
</a>


<a href="../../controllers/AdminController.php?action=deletePatient&id=<?= $patient['id']; ?>">
Delete
</a>



</td>


</tr>



<?php } ?>



</table>



</div>



</body>

</html>
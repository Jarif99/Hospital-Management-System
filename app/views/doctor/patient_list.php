<!DOCTYPE html>
<html>

<head>

<title>Patient List</title>

<link rel="stylesheet" href="../../../css/doctor.css">

</head>


<body>


<div class="main">


<h1>
Patients
</h1>



<table border="1" width="100%">


<tr>

<th>
Name
</th>

<th>
Email
</th>

</tr>




<?php foreach($patients as $patient){ ?>


<tr>


<td>
<?= $patient['full_name']; ?>
</td>


<td>
<?= $patient['email']; ?>
</td>



</tr>



<?php } ?>



</table>



</div>



</body>

</html>
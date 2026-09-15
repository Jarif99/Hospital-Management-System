<!DOCTYPE html>
<html>

<head>

<title>Create Prescription</title>

<link rel="stylesheet" href="../../../css/doctor.css">

</head>


<body>


<div class="main">


<h1>
Create Prescription
</h1>



<form action="../../controllers/DoctorController.php" method="POST">


<input type="hidden" name="save_prescription" value="1">



<label>
Select Patient
</label>


<br>


<select name="patient_id" required>


<option value="">
Choose Patient
</option>



<?php foreach($patients as $patient){ ?>


<option value="<?= $patient['id']; ?>">

<?= $patient['full_name']; ?>

</option>


<?php } ?>



</select>



<br><br>



<label>
Diagnosis
</label>


<br>


<input type="text" name="diagnosis" required>



<br><br>



<label>
Medicine
</label>


<br>


<textarea name="medicine" required></textarea>



<br><br>



<label>
Advice
</label>


<br>


<textarea name="advice" required></textarea>



<br><br>



<button type="submit">

Save Prescription

</button>



</form>



</div>



</body>

</html>
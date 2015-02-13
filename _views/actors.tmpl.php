<?php include '_includes/header.php'; ?>

<section class="container">
       	<?php
        	if ($info){

	        	foreach ($info as $i) {
	        		# code...
	        		echo "<h1>{$i->first_name} {$i->last_name}</h1>";
	        		echo "<p>{$i->film_info}</p>";
	        	}
	        }else {
	        	echo "<h3 class='alert alert-danger'>No Data Available! </h3>";
	        }
       	?>
        <hr>
        <a class="btn btn-primary" href="index.php">Back</a>
</section>

<?php include '_includes/footer.php'; ?>


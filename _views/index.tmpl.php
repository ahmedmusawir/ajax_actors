<?php include '_includes/header.php'; ?>
 
 <!-- CONTAINER STARTS HERE -->
    <section class="container">
      
        <form action="index.php" method="POST" role="form">
        	<legend class="alert alert-info">Here You Can Find Info on Your Favorite Actors</legend>
        
        	<div class="form-group">
        		<label for="q">Pick a Letter</label>
        		 <select name="q" class="form-control" id="q">
                	<?php
                	$word = str_split('abcdefghijklmnopqrstuvwxyz');
	                	foreach ($word as $letter) {
	                		# code...
	                		echo "<option value={$letter}>{$letter}</option>";
	                	}
                	?>
                </select>
        	</div>
        
        	<button type="submit" class="btn btn-danger">Submit</button>
        </form>
		<hr>
        <?php if(isset($actors)) : ?>
        <ul>
	        	<?php
	        		if($actors){

			        	foreach ($actors as $a) {
			        		# code...
			        		echo "<li>
			        		<a class='btn btn-default' href='actor.php?actor_id={$a->actor_id}'>{$a->first_name} {$a->last_name}</a>
			        		</li>";
			        	}
			    
			        
					    }else {
					        	echo "<hr>";
					        	echo "<h2 class='alert alert-danger'>No Actors Found, Plz Try a Different Letter ...</h2>";
						}
				?>
		</ul>	
        <?php endif; ?>

        <ul class="list_container">
        	<script type="text/x-handlebars-template" id="list_template">
        		{{#each this }}
	        	  	<li data-actor_id='{{actor_id}}'><a class='btn btn-default' href='#'>{{fullName this}}</a></li>  
        		{{/each}}
        	</script>
        </ul>

        <div class="info_container">
        	<script type="text/x-handlebars-template" id="info_template">
        	{{#each this}}

	        	<h2>{{fullName this}}</h2>
	        	<p>{{film_info}}</p>
	        	<span class="close">Close</span>
        	{{/each}}
        	    
        	</script>
        </div>

    </section>
    <!-- CONTAINER ENDS HERE -->
<?php include '_includes/footer.php'; ?>

















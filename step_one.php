<?php
//Using Procedural PHP 
require_once 'header.php';
?>

<h4>Step One: Information Gathering</h4>

<form method="post" action="process-form.php" id="my-form">

<p>
	<label for="name">Name:</label>
	<input type="text" name="name" id="name">
</p>

<fieldset>
	<legend>Choose your creature type:</legend>
	<p>
		<input type="radio" name="creature_type" value="alien" id="alien">
		<label for="alien">Alien</label>
	</p>
	<p>
		<input type="radio" name="creature_type" value="robot" id="robot">
		<label for="robot">Robot</label>
	</p>
</fieldset>

<p>
	<input type="submit" id="submit" name="submit" value="Go to step 2 (if you dare)" class="btn btn-info">
</p>

</form>

</div>

<script src="js/jquery-1_4_2_min.js"></script>
<!--<script src="js/jquery.uniform.min.js"></script>-->
<script>
jQuery("select, input:checkbox, input:radio, input:file, input:text, input:submit, textarea").uniform();
</script>
<script>
	$(document).ready(function(){
	var name = $('#name'); 
    var allertInfo = $('#allert-info')
    var myForm = $('#my-form');
        
	$(myForm).submit(function(event) {
        var error = 0;	
				
		if (name.val() == ""){
			error++;
            alert(" Please enter your name");
			name.css("border-color", "red");
		} 
        if (error > 0){    
            return false;
		}
        if (!$('input[name=creature_type]:checked').val() ) { 
           event.preventDefault();
            alert("Please select Alien or Robot choice!");    
        }
	});

        
        
});
</script>



</body>
</html>

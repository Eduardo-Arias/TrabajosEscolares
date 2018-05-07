<?php 
	include_once 'layout_header.php';
	$page_title = "CalendarioWeb";
?>
<div class="container">
	<div class="row">
		<div class="col"></div>
			<div class="col-7">
				<div id="CalendarioWeb"></div>
			</div>
		<div class="col"></div>
	</div>
</div>	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
<script>
	$(document).ready(function(){
		$('#CalendarioWeb').fullCalendar();
	});
</script>


<?php include_once 'layout_footer.php';?>
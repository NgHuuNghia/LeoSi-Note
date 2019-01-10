<?php 
	require_once('app/views/header.php'); 
	require_once('app/controller/c_note.php')
?>
<?php
	$note = new c_note();
	$content = $note->getContent($_GET['token']);
?>
<div class="card">
	<div class="card-body">
		<form method="POST" action="viewnote.php?token=<?php echo $_GET['token']; ?>">
			<div class="form-group">
			    <label for="exampleFormControlTextarea1"><h5>Note</h5></label> 
			    <button type="button" class="btn btn-info" id="btnCopy" ><i class="fa fa-copy" style="font-size:15px"></i> Copy URL</button>
			    <textarea class="form-control" name ="note" id="exampleFormControlTextarea1" rows="3" readonly><?php echo $content ;?></textarea>
			</div>
			
		</form>
	</div>
</div>
<!-- javaScript -->
<script type="text/javascript">
	$(document).ready(function() {

	    $('#exampleFormControlTextarea1').css({
		'height': '507px',
		});
		
		$('#btnCopy').on('click',function(){
			var url = "http://localhost:8888/LeoSi-Note/viewnote.php?token=<?php echo $_GET['token']; ?>";
			var tempElement = $('<input>').val(url).appendTo('body').select();
			document.execCommand('copy');
			tempElement.remove();
		})
	});
</script>
<?php require('app/views/footer.php'); ?>
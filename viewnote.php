<?php
	require_once ('app/config/const.php');
	require_once('app/views/header.php'); 
	require_once('app/controller/c_note.php');
	require_once('app/controller/c_setting.php');
?>
<?php
	$token = $_GET['token'];
	$note = new c_note();
	$content = $note->getContent($token);
	$setting = new c_setting();
	$colorText = $setting->getColor($token);
?>
<div class="card">
	<div class="card-body">
		<form method="POST" action="viewnote.php?token=<?php echo $_GET['token']; ?>">
			<div class="form-group">
			    <label for="exampleFormControlTextarea1"><h5>Note</h5></label>
			    <button type="button" class="btn btn-primary" id="btnEdit" name ="btnEdit" ><i class="fa fa-edit" style="font-size:15px"></i> Edit</button>
			    <button type="button" class="btn btn-info" id="btnCopy" ><i class="fa fa-copy" style="font-size:15px"></i> Copy URL</button>
			    <textarea class="form-control" name ="note" id="exampleFormControlTextarea1" style="color : <?php echo $colorText?>" rows="3" readonly><?php echo $content ;?></textarea>
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
			var url = "<?php echo HOST ?>viewnote.php?token=<?php echo $_GET['token']; ?>";
			var tempElement = $('<input>').val(url).appendTo('body').select();
			document.execCommand('copy');
			tempElement.remove();
		})
		$('#btnEdit').on('click',function(){
			var url = "<?php echo HOST ?>editnote.php?token=<?php echo $_GET['token']; ?>";
			document.location.href = url;
		})
	});
</script>
<?php require('app/views/footer.php'); ?>

<?php 
	require_once ('app/config/const.php');
	require_once('app/views/header.php'); 
	require_once('app/controller/c_note.php');
	require_once('app/controller/c_setting.php');
?>
<?php
	$note = new c_note();
	$content = $note->getContent($_GET['token']);
	$setting = new c_setting();
	$colorText = $setting->getColor($_GET['token']);
	if(isset($_POST['note']))
	{    
		$text = addslashes($_POST['note']); // content contain a signle quote (')
		if($text !== "")
		{
		  creatWithNewToken :
		  $token = $note->createNote($text);
		  $color = $_POST['cbbColorText'];
		  $setting->createSetting($color,$token);
		  if($token){
		  	 echo "<script type='text/javascript'>window.location.href = 'viewnote.php?token=$token';</script>";
		  	 exit();
		  }
		  else{
		  	//	 if token coincident (token new === token old)
		  	goto creatWithNewToken; 
		  }
		 
		}
	}
?>
<div class="card">
	<div class="card-body">
		<form method="POST" action="editnote.php?token=<?php echo $_GET['token']; ?>">
			<div class="form-group">
			    <label for="exampleFormControlTextarea1"><h5>Edit Note</h5></label>
			    <textarea class="form-control" name ="note" id="exampleFormControlTextarea1" style="color : <?php echo $colorText?>" rows="3" ><?php echo $content?></textarea>
			</div>
			<h5>Note Settings</h5>
			<div class="form-group">
			    <label> Text Color: </label>
			    <select class="form-control" id="cbbColorText" name="cbbColorText">
			      <option value="#111111" >Black</option>	
			      <option value="#FF4136" >Red</option>
			      <option value="#0074D9" >Blue</option>
			      <option value="#2ECC40" >Green</option>
			      <option value="#FFDC00" >Yellow</option>
			      <option value="#FF851B" >Orange</option>
			      <option value="#F012BE" >Fuchsia</option>
			      <option value="#01FF70" >Lime</option>
			      <option value="#001f3f" >Navy</option>
			    </select>
			</div>
			<div class="form-group">
			<center><input class="btn btn-success btn-sm waves-effect waves-light" type="submit" value="SAVE NOTE" name ="save"></center>
			</div>
		</form>
	</div>
</div>
<!-- jquery -->
<script type="text/javascript">	
	$("#cbbColorText").on("change",function(){
        //Getting Value
        var selValue = $(this).val();
        //Change text color
        $('textarea#exampleFormControlTextarea1').css('color',selValue);	
    });
</script>
<?php require('app/views/footer.php'); ?>
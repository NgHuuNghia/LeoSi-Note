
<?php 
	require_once('app/views/header.php'); 
	require_once('app/controller/c_note.php')
?>
<?php
	$note = new c_note();
	$content = $note->getContent($_GET['token']);
	if(isset($_POST['note']))
	{    
		$text = addslashes($_POST['note']); // content contain a signle quote (')
		if($text !== "")
		{
		  creatWithNewToken :
		  $token = $note->createNote($text);
		  if($token){
		  	 header("Location: viewnote.php?token=$token");
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
			    <textarea class="form-control" name ="note" id="exampleFormControlTextarea1" rows="3" ><?php echo $content?></textarea>
			</div>
			<h5>Note Settings</h5>
			<div class="form-group">
			    <label>Animation Text : </label>
			    <select class="form-control" name="expire">
			      <option value="" >Default</option>	
			      <option value="" >Slide</option>
			    </select>
			</div>
			<div class="form-group">
			<center><input class="btn btn-success btn-sm waves-effect waves-light" type="submit" value="SAVE NOTE" name ="save"></center>
			</div>
		</form>
	</div>
</div>
<?php require('app/views/footer.php'); ?>
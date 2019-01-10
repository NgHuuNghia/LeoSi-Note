
<?php 
	require_once('app/views/header.php'); 
	require_once('app/controller/c_note.php')
?>
<?php
	$note = new c_note();
	if(isset($_POST['note']))
	{    
		$text = $_POST['note'];
		if($text !== "")
		{
		  creatWithNewToken :
		  $token = $note->createNote($text);
		  if($token){
		  	 header("Location: viewnote.php?token=$token");
		  }
		  else{
		  	//	 if token coincident
		  	goto creatWithNewToken; 
		  }
		 
		}
		else
		{
			echo 'false'; // khung text đỏ lên
			header('Location: index.php');
		}
		// tao note ok => chuyen token sang trang infonote
	}
?>
<div class="card">
	<div class="card-body">
		<form method="POST" action="index.php">
			<div class="form-group">
			    <label for="exampleFormControlTextarea1"><h5>New Note</h5></label>
			    <textarea class="form-control" name ="note" id="exampleFormControlTextarea1" rows="3" ></textarea>
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
			<center><input class="btn btn-success btn-sm waves-effect waves-light" type="submit" value="CREATE NOTE" name ="create"><!-- CREATE NOTE</input> --></center>
			</div>
		</form>
	</div>
</div>

<?php require('app/views/footer.php'); ?>
<?php  
session_start();
include("connection.php");
$id=$_REQUEST["ep"];
$sql="SELECT * FROM form WHERE user_id='$id'";
$data=mysqli_query($conn,$sql);
$result=mysqli_fetch_assoc($data);
$_SESSION["oldimgpath"]=$result["picsource"];
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="post" action="formeditaction.php" enctype="multipart/form-data"><br>
		enter name:<input type="text" name="name" value="<?php echo $result["name"]?>"><br>
		<input type="text" name="uid" value="<?php echo $id;?>" hidden>
		enter email:<input type="email" name="email" value="<?php echo $result["email"]?>"><br>
		enter address:<input type="text" name="address" value="<?php echo $result["address"]?>"><br>
		enter phone:<input type="phone" name="phone" value="<?php echo $result["phone"]?>"><br>
		Gender: <input type="radio" name="gender" value="male" <?php if($result['gender']=='male'){echo "checked";}?>>Male
				<input type="radio" name="gender" value="female" <?php if($result['gender']=='female'){echo "checked";} ?>>Female
				<input type="radio" name="gender" value="other"<?php if($result['gender']=='other'){echo "checked";} ?>>other<br>
		Degree: <select name="degree">
				<option>Select</option>
				<option <?php if($result['degree']=='B.tech'){echo "selected";} ?> >B.tech</option>
				<option <?php if($result['degree']=='B.sc'){echo "selected";} ?> >B.sc</option>
				<option <?php if($result['degree']=='BBA'){echo "selected";} ?> >BBA</option>
				<option <?php if($result['degree']=='LLB'){echo "selected";} ?> >LLB</option></td>
			</select><br>		
		upload image:<input type="file" name="uploadimage" value="<?php echo $result["picsource"] ?>"><br>
		<?php
		$lanarray=explode(",", $result['language']);
		?>	
		Enter language:<input type="checkbox" name="language[]" value="english" 
		<?php
		if(in_array("english",$lanarray))
			{
				echo "checked";
			}
		?>>English
				<input type="checkbox" name="language[]" value="hindi" 
				<?php
		if(in_array("hindi",$lanarray))
			{
				echo "checked";
			}
		?>>Hindi
				<input type="checkbox" name="language[]" value="bengali" 
				<?php
		if(in_array("bengali",$lanarray))
			{
				echo "checked";
			}
		?>>Bengali<br>
		<input type="submit" name="submit" value="submit">	
	</form>
</body>
</html>
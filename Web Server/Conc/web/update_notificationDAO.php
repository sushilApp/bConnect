<?php
	include('Conn.php');
	include('MySQLDao.php');
    $username = $_REQUEST['username'];
    $b_id = $_REQUEST['b_id'];
    $n_id = $_REQUEST['n_id'];
    $category = $_REQUEST['category'];
    $sub_category = $_REQUEST['sub_category'];
    //$beacon_name=$_REQUEST['beacon_name'];
	$title=$_REQUEST['title'];
	$entry_description=$_REQUEST['entry_description'];
    $exit_description=$_REQUEST['exit_description'];
	$cat_id=$_REQUEST['category'];
	$sub_cat_id=$_REQUEST['sub_category'];
    $date=date("Y-m-d");
    $filetmp = $_FILES["image"]["tmp_name"];
	$filename = $_FILES["image"]["name"];
    $image=$_REQUEST['image'];
    $new_img="";
    if($filename=="")
        $new_img = $image;
    else 
        $new_img = $filename;
    $filepath = "images/".$new_img;
    move_uploaded_file($filetmp,$filepath);
      $sql2 = "update `notification_information` SET `b_id`='$b_id', `category`='$category', `sub_category`='$sub_category', `title`='$title', `entry_description`='$entry_description',`exit_description`='$exit_description',`updated_at`='$date',`image`='$new_img' where n_id='$n_id'";
		$spublic1=$conn->query($sql2);
		if($spublic1)
        {
            //$finalResponse = array("Status"=>"True","Title"=>"Success","Message"=>"Notification updated Successful.");
            //echo json_encode($finalResponse);
            echo "<script>";
            echo "alert('Notification updated Successfully.');";
            echo "location='/Conc/web/user_pannel.php?username=".$username."';";
            echo "</script>"; 
        }
        else
        {
            //$finalResponse = array("Status"=>"False","Title"=>"Unsuccess","Message"=>"Notification update Fail Please Check details.");
            //echo json_encode($finalResponse);
            echo "<script>";
            echo "alert('Notification update Fail Please Check details..');";
            echo "location='/Conc/web/user_pannel.php?username=".$username."';";
            echo "</script>";
        }
?>
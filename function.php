<?php 

function age(){

$year = explode('-', $_SESSION['sbirthday']);

$age = date('Y') - $year[0];
echo $age;
}

function joined(){
	include 'connection.php';
	$user = $_SESSION['sid'];
	$select = "SELECT * FROM users WHERE id = '$user'";
	$result	= mysqli_query($conn,$select);

	$row = mysqli_fetch_assoc($result);
	$joined = explode('-', $row['joined']);

	switch ($joined[1]) {
		case '01':
		echo "January" . " ".$joined[0].".";
			break;
		case '02':
		echo "February" . " ".$joined[0].".";
			break;
		case '03':
		echo "March" ." ". $joined[0].".";
			break;
		case '04':
		echo "April" ." ". $joined[0].".";
			break;
		case '05':
		echo "May" ." ". $joined[0].".";
			break;
		case '06':
		echo "June" ." ". $joined[0].".";
			break;
		case '07':
		echo "July" ." ". $joined[0].".";
			break;
		case '08':
		echo "August" ." ". $joined[0].".";
			break;
		case '09':
		echo "September" ." ". $joined[0].".";
			break;
		case '10':
		echo "October" ." ". $joined[0].".";
			break;									
		case '11':
		echo "November" . " ". $joined[0].".";
			break;
		case '12':
		echo "December" ." ". $joined[0].".";
			break;		

}
}


function profile(){
	include 'connection.php';
	$id = $_SESSION['sid'];
	$user = $_SESSION['susername'];

	$select = "SELECT * FROM users where id ='$id'";
	$result = mysqli_query($conn,$select);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$newid = $row['id'];
		$select1 = "SELECT * FROM profilepic WHERE userid='$newid'";
		$result1 = mysqli_query($conn,$select1);
		if (mysqli_num_rows($result1) > 0) {
			$row1 = mysqli_fetch_assoc($result1);
			echo "<div class='kira'>";
			if ($row1['status'] == 0) {
				echo "<img src='".$id.".jpg'>";
			} else{
				echo "<img src='../../default.jpg'>";
			}
			echo "</div>";
		} else {
			exit();
		}

	} else
	exit();
}
function profile2(){
	include 'connection.php';
	$id = $_SESSION['sid'];
	$user = $_SESSION['susername'];

	$select = "SELECT * FROM users where id ='$id'";
	$result = mysqli_query($conn,$select);
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$newid = $row['id'];
		$select1 = "SELECT * FROM profilepic WHERE userid='$newid'";
		$result1 = mysqli_query($conn,$select1);
		if (mysqli_num_rows($result1) > 0) {
			$row1 = mysqli_fetch_assoc($result1);
			echo "<div class='kira'>";
			if ($row1['status'] == 0) {
				echo "<img src='user/".$user."/".$id.".jpg'>";
			} else{
				echo "<img src='default.jpg'>";
			}
			echo "</div>";
		} else {
			exit();
		}

	} else
	exit();
}

function birthday(){
	include 'connection.php';
	$user = $_SESSION['sid'];
	$select = "SELECT * FROM users WHERE id = '$user'";
	$result	= mysqli_query($conn,$select);

	$row = mysqli_fetch_assoc($result);
	$joined = explode('-', $row['birthday']);

	switch ($joined[1]) {
		case '01':
		echo "January"." ".$joined[2].", ".$joined[0];
			break;
		case '02':
		echo "February"." ".$joined[2].", ".$joined[0];
			break;
		case '03':
		echo "March"." ".$joined[2].", ".$joined[0];
			break;
		case '04':
		echo "April"." ".$joined[2].", ".$joined[0];
			break;
		case '05':
		echo "May"." ".$joined[2].", ".$joined[0];
			break;
		case '06':
		echo "June"." ".$joined[2].", ".$joined[0];
			break;
		case '07':
		echo "July"." ".$joined[2].", ".$joined[0];
			break;
		case '08':
		echo "August"." ".$joined[2].", ".$joined[0];
			break;
		case '09':
		echo "September"." ".$joined[2].", ".$joined[0];
			break;
		case '10':
		echo "October"." ".$joined[2].", ".$joined[0];
			break;									
		case '11':
		echo "November"." ".$joined[2].", ".$joined[0];
			break;
		case '12':
		echo "December"." ".$joined[2].", ".$joined[0];
			break;		

}
}

function today(){
	$day = date("w");
	
	switch ($day) {
		case 0:
			echo "Today is Sunday" . "<br>" ." " . date("F j, Y");
			break;
		case 1:
			echo "Today is Monday" . "<br>" . " " . date("F j, Y");
			break;
		case 2:
			echo "Today is Tuesday" . "<br>" . " " . date("F j, Y");
			break;
		case 3:
			echo "Today is Wednesday" . "<br>" . " " . date("F j, Y");
			break;
		case 4:
			echo "Today is Thursday" . "<br>" . " " . date("F j, Y");
			break;
		case 5:
			echo "Today is Friday" . "<br>" . " " . date("F j, Y");
			break;
		case 6:
			echo "Today is Saturday" . "<br>" . " " . date("F j, Y");
			break;
	}
}


function about(){
	include 'connection.php';
	$id = $_SESSION['sid'];
	$select = "SELECT * FROM info Where userid = '$id'";
	$result = mysqli_query($conn,$select);
	if (mysqli_num_rows($result) > 0) {
	 	$row = mysqli_fetch_assoc($result);
	 	echo $row['about'];
	} else {
		exit();
	}	
}

function status(){
	include 'connection.php';
	$id = $_SESSION['sid'];
	$select = "SELECT * FROM info Where userid = '$id'";
	$result = mysqli_query($conn,$select);
	if (mysqli_num_rows($result) > 0) {
	 	$row = mysqli_fetch_assoc($result);
	 	echo $row['status'];
	} else {
		exit();
	}	
}

function quote(){
	include 'connection.php';
	$id = $_SESSION['sid'];
	$select = "SELECT * FROM info Where userid = '$id'";
	$result = mysqli_query($conn,$select);
	if (mysqli_num_rows($result) > 0) {
	 	$row = mysqli_fetch_assoc($result);
	 	echo $row['quotes'];
	} else {
		exit();
	}	
}

function forum(){
	include 'connection.php';
	$select = "SELECT * FROM forum order by id desc";
    $result = mysqli_query($conn,$select);
	$row = mysqli_fetch_assoc($result);
	
	echo "<a href='content.php?topic=".$row['topic']."'>".$row['topic']."</a><br>";
}

function shout(){
	include 'connection.php';
	$id = $_SESSION['sid'];
	$user = $_SESSION['susername'];
	$select = "SELECT * FROM shout order by id desc";
	$result = mysqli_query($conn,$select);
	$row = mysqli_fetch_assoc($result);
		$user2 = $row['username'];
		$select = "SELECT * FROM shout WHERE username='$user2'";
		$result1 = mysqli_query($conn, $select);
		$select1 = "SELECT * FROM profilepic WHERE username='$user2'";
		$result2 = mysqli_query($conn, $select1);
		$row2 = mysqli_fetch_assoc($result2);
			echo "<div>";
		if ($row2['status'] == 1) {
			echo "<a href='prof.php?username=".$row['username']."'>".$row['username']."</a>:&nbsp ".$row['shout'];
		} else {
			echo "<a href='prof.php?username=".$row['username']."'>".$row['username']."</a>:&nbsp ".$row['shout'];
		}
		echo "</div>";
}

function name(){

	include 'connection.php';

	$id = $_GET['username'];

	$select = "SELECT * FROM users Where username='$id'";

	$result = mysqli_query($conn,$select);

	if (mysqli_num_rows($result) > 0) {

	 	$row = mysqli_fetch_assoc($result);

	 	echo $row['first'] ." " . $row['last'];

	} else {

		exit();

	}	

}

function gender(){

	include 'connection.php';

	$id = $_GET['username'];

	$select = "SELECT * FROM users Where username = '$id'";

	$result = mysqli_query($conn,$select);

	if (mysqli_num_rows($result) > 0) {

	 	$row = mysqli_fetch_assoc($result);

	 	echo $row['gender'];

	} else {

		exit();

	}	

}

function status2(){

	include 'connection.php';

	$id = $_SESSION['sid'];

	$select = "SELECT * FROM info Where userid = '$id'";

	$result = mysqli_query($conn,$select);

	if (mysqli_num_rows($result) > 0) {

	 	$row = mysqli_fetch_assoc($result);

	 	echo $row['status'];

	} else {

		exit();

	}	

}



function age2(){

	

	$year = explode('-', $_SESSION['sbirthday']);

	

	$age = date('Y') - $year[0];

	echo $age;

	}



	function about2(){

		include 'connection.php';

		$id = $_SESSION['sid'];

		$select = "SELECT * FROM info Where userid = '$id'";

		$result = mysqli_query($conn,$select);

		if (mysqli_num_rows($result) > 0) {

			 $row = mysqli_fetch_assoc($result);

			 echo $row['about'];

		} else {

			exit();

		}	

	}



	function quote2(){

		include 'connection.php';

		$id = $_SESSION['sid'];

		$select = "SELECT * FROM info Where userid = '$id'";

		$result = mysqli_query($conn,$select);

		if (mysqli_num_rows($result) > 0) {

			 $row = mysqli_fetch_assoc($result);

			 echo $row['quotes'];

		} else {

			exit();

		}	

	}



	function joined2(){

		include 'connection.php';

		$user = $_SESSION['sid'];

		$select = "SELECT * FROM users WHERE id = '$user'";

		$result	= mysqli_query($conn,$select);

	

		$row = mysqli_fetch_assoc($result);

		$joined = explode('-', $row['joined']);

	

		switch ($joined[1]) {

			case '01':

			echo "January" . " ".$joined[0].".";

				break;

			case '02':

			echo "February" . " ".$joined[0].".";

				break;

			case '03':

			echo "March" ." ". $joined[0].".";

				break;

			case '04':

			echo "April" ." ". $joined[0].".";

				break;

			case '05':

			echo "May" ." ". $joined[0].".";

				break;

			case '06':

			echo "June" ." ". $joined[0].".";

				break;

			case '07':

			echo "July" ." ". $joined[0].".";

				break;

			case '08':

			echo "August" ." ". $joined[0].".";

				break;

			case '09':

			echo "September" ." ". $joined[0].".";

				break;

			case '10':

			echo "October" ." ". $joined[0].".";

				break;									

			case '11':

			echo "November" . " ". $joined[0].".";

				break;

			case '12':

			echo "December" ." ". $joined[0].".";

				break;		

	

	}

	}



	function birthday2(){

		include 'connection.php';

		$user = $_SESSION['sid'];

		$select = "SELECT * FROM users WHERE id = '$user'";

		$result	= mysqli_query($conn,$select);

	

		$row = mysqli_fetch_assoc($result);

		$joined = explode('-', $row['birthday']);

	

		switch ($joined[1]) {

			case '01':

			echo "January"." ".$joined[2].", ".$joined[0];

				break;

			case '02':

			echo "February"." ".$joined[2].", ".$joined[0];

				break;

			case '03':

			echo "March"." ".$joined[2].", ".$joined[0];

				break;

			case '04':

			echo "April"." ".$joined[2].", ".$joined[0];

				break;

			case '05':

			echo "May"." ".$joined[2].", ".$joined[0];

				break;

			case '06':

			echo "June"." ".$joined[2].", ".$joined[0];

				break;

			case '07':

			echo "July"." ".$joined[2].", ".$joined[0];

				break;

			case '08':

			echo "August"." ".$joined[2].", ".$joined[0];

				break;

			case '09':

			echo "September"." ".$joined[2].", ".$joined[0];

				break;

			case '10':

			echo "October"." ".$joined[2].", ".$joined[0];

				break;									

			case '11':

			echo "November"." ".$joined[2].", ".$joined[0];

				break;

			case '12':

			echo "December"." ".$joined[2].", ".$joined[0];

				break;		

	

	}

	}

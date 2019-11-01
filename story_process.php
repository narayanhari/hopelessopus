<?php
	include("session.php");
	include("config.php");


	$uid=$_SESSION["regno"];
	$status_query="SELECT ststatus,endi FROM login WHERE regno='$uid'";
	$status_result=mysqli_query($conn,$status_query);
	$status_row=mysqli_fetch_assoc($status_result);

	$end=$status_row['endi'];

	$answer=$_GET["choice"];
	$state=$status_row["ststatus"];

	$option_query="SELECT option_story from story_answer where pid='$state' and sid='$answer'";
	$option_result=mysqli_query($conn,$option_query);
	$option_row=mysqli_fetch_assoc($option_result);

	$q_check="SELECT question_check from story_question where id='$state' ";
	$qcheck_result=mysqli_query($conn,$q_check);
	$qcheck_row=mysqli_fetch_assoc($qcheck_result);


	$status_query="SELECT ststatus,score,current,max FROM login WHERE regno='$uid'";
	

	$status_result=mysqli_query($conn,$status_query);
	$status_row=mysqli_fetch_assoc($status_result);
	$state=$status_row["ststatus"];
	$qno=$status_row['current'];
	$score = $status_row["score"];


	switch ($option_row['option_story']) {
		case 'Good':
			$update_query="UPDATE login SET current=1,max=1,check_status=1 where regno='$uid'";
			$scoreinc=7;
			$_SESSION['limit']=1;
			if($state==66){
				$end=3;
			}
			break;
		
		case 'Medium':
			$update_query="UPDATE login SET current=1,max=2,check_status=1 where regno='$uid'";
			$scoreinc=5;
			$_SESSION['limit']=2;
			if($state==66){
				$end=1;
			}
			break;

		case 'Bad':
			$update_query="UPDATE login SET current=1,max=3,check_status=1 where regno='$uid'";
			$scoreinc=3;
			$_SESSION['limit']=3;
			if($state==66){
				$end=2;
			}
			break;
	}
	if($qcheck_row['question_check']==0){
		$update_result=mysqli_query($conn,$update_query);
		header("Location: question.php");
	}
	else{
		$state=$state+1;
		$score=$scoreinc+$score;
		$update_query="UPDATE login SET ststatus='$state',score='$score',max=0,current=1,check_status=0,endi=$end where regno='$uid'";
			$update_result=mysqli_query($conn,$update_query);
			header("Location: story.php");
	}


	// $answer_query="SELECT id FROM answers WHERE id='$state' AND answer='$answer'";
	// $answer_result=mysqli_query($connection,$answer_query);
	// $answer_row=mysqli_fetch_assoc($answer_result);
	// $number=mysqli_num_rows($answer_result);
	// if($number==1)
	// {
	// 	$state=$state+1;
	// 	$update_query="UPDATE login SET status='$state',timelast='NOW()' WHERE UID='$uid'";
	// 	$update_result=mysqli_query($connection,$update_query);
	// 	$score=$state-1;
	// 	$update_query="UPDATE login SET score='$score' WHERE UID='$uid'";
	// 	$update_result=mysqli_query($connection,$update_query);
	// 	header("Location: question.php?ans=2");
	// }
	// else
	// {
	// 	header("Location: question.php?ans=0");
	// }

?>
<!-- 
Select s.cat_id,s.event_id,e.team_id,stud.student_delno from schdlnew as s,tbleventreg as e,attendance as a,tblstudent as stud,tblteams as t where s.event_id=e.event_id and e.team_id=a.team_id and stud.student_delno=t.del_card_no and t.team_id=a.team_id and date='05-10-2018' -->
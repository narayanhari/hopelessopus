<?php
  include("session.php");
  $uid=$_SESSION['regno'];


  $check_query="SELECT check_status from login where regno='$uid'";
  $check_result=mysqli_query($conn,$check_query);
  $check_row=mysqli_fetch_assoc($check_result);
  if($check_row['check_status']==0) {
    header("Location: story.php");
  }


  $status_query="SELECT ststatus,current,score from login where regno='$uid'";


  $status_result=mysqli_query($conn,$status_query);
  $status_row=mysqli_fetch_assoc($status_result);
  $state=$status_row['ststatus'];
  $score=$status_row['score'];
  

  $qno=$status_row['current'];
  

  $question_query="SELECT question from questions where pid='$state' and sid='$qno'";
  $question_result=mysqli_query($conn,$question_query);
  $question_row=mysqli_fetch_assoc($question_result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hopeless Opus-ACUMEN</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="question.css">
    <link rel="icon" type="image/ico" href="img/acumen2.png" />
    
    <script>
         function myFunction(){
           console.log("function called");
           var x=window.location.href;
           var element=document.getElementById("changer");
           if(x.indexOf('?ans=0')>0){
               console.log("found then border not working");
               element.classList.add("border-danger");
               
           }
        }
   
   
    </script>
</head>

<body onload="myFunction()">
  <<!-- audio autoplay>
    <source src="cut1_qwerty.mp3" type="audio/mpeg">
  </audio> -->

<div class="nav navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">HOPELESS OPUS</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
<div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="nav navbar-nav ml-auto navbar-right">
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#Modalrules">RULES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#Modalleaderboard">LEADERBOARD</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-toggle="modal" data-target="#Modallogout">LOGOUT</a>
      </li> 
      </ul>
       <ul class="nav navbar-nav ml-auto navbar-right">
        <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-toggle="modal" data-target="" >Your Score <?php echo "$score" ?></a>
      </li>
        <li class="nav-item">
        <a class="nav-link blink" data-toggle="modal" data-toggle="modal" data-target="#Modalevent" >OTHER EVENT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-toggle="modal" data-target="#Modalcontact" >CONTACT US</a>
      </li>
    </ul>
</div>
</div>
     <div id="particles-js"></div>
     <div id="Modalcontact" class="modal fade" role="dialog"  data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h3 class="modal-title ml-auto">Contact</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <br>
          </div>
          <div class="modal-body">
            <center>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-condensed">
                        <thead>
                          <tr>
                            <td>NAME</td>
                            <td>CONTACT NUMBER</td>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>NARAYAN HARI </td>
                            <td>+918384845571</td>
                            </tr>
                            <tr>
                            <td>MUSKAN DUSEJA</td>
                            <td>+918707471726</td>
                            </tr>
                            <tr>
                            <td>PRANAV JAIN</td>
                            <td>+919920902469</td>
                            </tr>
                            <tr>
                            <td>Rajeev Veeraraghavan</td>
                            <td>+919741310903</td>
                            </tr>
                        </tbody>
                      </table>
                    </div>  
                  </center>

          </div>
        </div>
      </div>
</div>    

<div id="Modalevent" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-center">
           
              <h3 class="modal-title ml-auto">Other Events</h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <ul>
            <li data-toggle="collapse" data-target="#day1"><u>Day 1(October 9) </u></li><br>
            <center id="day1" class="collapse">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-condensed">
                        <thead>
                          <tr>
                            <td>EVENT NAME</td>
                            <td>ROUND/TIMING</td>
                            <td>LOCATION</td>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>AIB</td>
                            <td>Round 1/ 1PM</td>
                            <td>NHL 203</td>
                            </tr>
                            <tr>
                            <td>MIQ</td>
                            <td>Round 1/ 2:30PM</td>
                            <td>NHL 203</td>
                            </tr>
                            <tr>
                            <td>ATR</td>
                            <td>Round 1/ 4PM</td>
                            <td>NHL 203</td>
                            </tr>
                        </tbody>
                      </table>
                    </div>  
                  </center>
            <li data-toggle="collapse" data-target="#day2"><u>Day 2(October 10)</u></li><br>
            <center id="day2" class="collapse">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-condensed">
                        <thead>
                          <tr>
                            <td>EVENT NAME</td>
                            <td>ROUND/TIMING</td>
                            <td>LOCATION</td>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>ATR</td>
                            <td>Round 1/ 1PM</td>
                            <td>NHL 203</td>
                            </tr>
                            <tr>
                            <td>AIB</td>
                            <td>Round 1/ 2:30PM</td>
                            <td>NHL 203</td>
                            </tr>
                            <tr>
                            <td>MIQ</td>
                            <td>Round 1/ 4PM</td>
                            <td>NHL 203</td>
                            </tr>
                        </tbody>
                      </table>
                    </div>  
                  </center>
            <li data-toggle="collapse" data-target="#day3"><u>Day 3(October 11)</u></li><br>
            <center id="day3" class="collapse">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-condensed">
                        <thead>
                          <tr>
                            <td>EVENT NAME</td>
                            <td>ROUND/TIMING</td>
                            <td>LOCATION</td>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>AIB</td>
                            <td>Round 2/ 1PM</td>
                            <td>NHL 204</td>
                            </tr>
                            <tr>
                            <td>ATR</td>
                            <td>Round 1/ 3:30PM</td>
                            <td>NHL 203</td>
                            </tr>
                            <tr>
                            <td>MIQ</td>
                            <td>Round 1/ 5PM</td>
                            <td>NHL 203</td>
                            </tr>
                        </tbody>
                      </table>
                    </div>  
                  </center>
            <li data-toggle="collapse" data-target="#day4"><u>Day 4(October 12)</u></li><br>
            <center id="day4" class="collapse">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-condensed">
                        <thead>
                          <tr>
                            <td>EVENT NAME</td>
                            <td>ROUND/TIMING</td>
                            <td>LOCATION</td>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>AIB</td>
                            <td>Final/ 1PM</td>
                            <td>NHL 205</td>
                            </tr>
                            <tr>
                            <td>ATR</td>
                            <td>Final/ 1PM</td>
                            <td>NHL 305</td>
                            </tr>
                            <tr>
                            <td>MIQ</td>
                            <td>Final/ 1PM</td>
                            <td>NHL 304</td>
                            </tr>
                        </tbody>
                      </table>
                    </div>  
                  </center>
            </ul>
          </div>
        </div>
      </div>
</div>


<div id="Modalrules" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-center">
           
              <h3 class="modal-title ml-auto">Rules</h3>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
            <ul>
            <li>THIS IS A CHOICE DRIVEN GAME.</li><br>
            <li>YOUR CHOICES DEFINE YOUR PATH WHICH DEFINE THE NUMBER OF QUESTIONS.</li><br>
            <li>THE GAME CONSISTS OF 66 CHECKPOINTS SOME WITH 3 CHOICES WITH A DAILY CAP OF A CERTAIN NUMBER OF QUESTIONS.</li>
            <br>
            <li>ON CHOOSING THE "BEST" ROUTE YOU WILL GET +7 POINTS.</li>
            <br>
            <li>ON CHOOSING THE "LONG" ROUTE YOU WILL GET +5 POINTS.</li>    
            <br>
            <li>ON CHOOSING THE "DEAD END" YOU WILL GET +3 POINTS.</li>
            <br>
            <li><b>LETS SEE WHO SAVES MANIPAL FROM A CERTAIN DOOM</b></li>
            </ul>
          </div>
        </div>
      </div>
</div>
<div id="Modallogout" class="modal fade" role="dialog" data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h3 class="modal-title">Do you really want to leave this page?</h3>
            <br />
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-footer">
            <a href="logout.php"><button type="button" class="btn btn-default pull-left logy">Yes</button></a>
            <button type="button" class="btn btn-default pull-right logn" data-dismiss="modal">No</button>
          </div>
        </div>
      </div>
</div>
<div id="Modalleaderboard" class="modal fade" role="dialog"  data-keyboard="false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h3 class="modal-title ml-auto">Leaderboard</h3>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <br>
          </div>
          <div class="modal-body">
            <center>
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered table-condensed">
                        <thead>
                          <tr>
                            <td>RANK</td>
                            <td>USER ID</td>
                            <td>SCORE</td>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $rank=1;
                            $leader_query="SELECT name,regno,score FROM login ORDER BY SCORE DESC,timelast ASC";
                            $leader_result=mysqli_query($conn,$leader_query);
                            $leader_count=mysqli_num_rows($leader_result);
                            while($leader_count>0)
                            {
                              $leader_row=mysqli_fetch_assoc($leader_result);
                              echo "<tr>";
                              echo "<td>{$rank}</td>";
                              echo "<td>{$leader_row['regno']}</td>";
                                echo "<td>{$leader_row['score']}</td>";
                              echo "</tr>";
                              $rank++;
                              if($rank==6)
                                break;
                              $leader_count-=1;
                            }
                            
                          ?>
                        </tbody>
                      </table>
                    </div>  
                  </center>
          </div>
        </div>
      </div>
</div>
<div id="story">
    <div class="container" style="margin-top:13%; margin-bottom:3%;">
        <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 md-offset-8">
                    <div class="border" id="changer">
                           <h3 style="opacity:1; color: white; padding:10px; text-align:center;" ><?php echo $question_row['question']; ?>  </h3>
                    </div>
                </div>
        </div>
    </div>
</div>
<form action="question_process.php" method="POST">
<div id="mcq" class="container justify-content-center">
    <div class="container row justify-content-center">
         <div class="form-group field col-lg-4 justify-content-center">
            <input type="txt" class="form-control" id="answer" placeholder="Enter Answer" name="ans">
        </div>
        <br>
        <div class="container row justify-content-center">
            <button type="submit" class="btn btn-success"  style="z-index:1000;"><b>Submit</b></button></div>
    </div>
</div>
</form>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <style>
        body {
  margin: 0;
  background-color: #111111;
            overflow: hidden auto;
}

 .blink{
  animation: blinker 2s linear infinite;
  background-color: #343a40;
}
a.nav-link{
  font-size: 20px;
  background-color: #343a40;
}
@keyframes blinker{

  50%{
    opacity: .3;
  }
}
canvas {
  display: block;
  vertical-align: bottom;
}


/* ---- particles.js container ---- */

#particles-js {
  position: absolute;
  width: 100%;
  height: 100%;
}
h1{
 color:white;
  text-align:center;
}
    #margin_given{
    margin-left:40%;
}
@media screen and (max-width: 700px){
    #margin_given{
        margin-left:0%;}
}
    </style>

    <script>
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 555,
                    "density": {
                        "enable": true,
                        "value_area": 789.1476416322727
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000fff"
                    },
                    "polygon": {
                        "nb_sides": 10
                    },
                    "image": {
                        "src": "img/github.svg",
                        "width": 20,
                        "height": 10
                    }
                },
                "opacity": {
                    "value": 0.48927153781200905,
                    "random": false,
                    "anim": {
                        "enable": true,
                        "speed": 2,
                        "opacity_min": 0,
                        "sync": false
                    }
                },
                "size": {
                    "value": 2,
                    "random": true,
                    "anim": {
                        "enable": true,
                        "speed": 8,
                        "size_min": 0,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": false,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 1.2,
                    "direction": "none",
                    "random": true,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 900,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "bubble"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 83.91608391608392,
                        "size": 5,
                        "duration": 3,
                        "opacity": 1,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
    </script>
</body>
</html>
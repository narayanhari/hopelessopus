<?php
  include("session.php");
  $uid=$_SESSION['regno'];


  $check_query="SELECT check_status,score from login where regno='$uid'";
  $check_result=mysqli_query($conn,$check_query);
  $check_row=mysqli_fetch_assoc($check_result);
  $score=$check_row['score'];
  if($check_row['check_status']==1) {
    header("Location: question.php");
  }


  $status_query="SELECT ststatus from login where regno='$uid'";
  $status_result=mysqli_query($conn,$status_query);
  $status_row=mysqli_fetch_assoc($status_result);

  $state=$status_row['ststatus'];
  //making changes in code for day-wise check here...
  // if($state > 45){
  //     header("Location: day1_ending.html");
  // }
  if($state < 67) {
    header("Location: story.php");
  }
  $story_query="SELECT story,choice1,choice2,choice3 from story_question where id='$state'";
  $story_result=mysqli_query($conn,$story_query);
  $story_row=mysqli_fetch_assoc($story_result);
?>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Anton|Open+Sans|Roboto" rel="stylesheet">
  <meta name="viewport" content="width=device-width, user-scalable=false;">
  <link rel="stylesheet" type="text/css" href="css/congrats.css">
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/grayscale.min.js"></script>

</head>
<style type="text/css">
  .blink{
  animation: blinker 1s linear infinite;
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
</style>
<div class="nav navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="#">HOPELESS OPUS</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
<div class="collapse navbar-collapse" id="collapsibleNavbar" style="float:right;">
      <ul class="nav navbar-nav ml-auto navbar-left">
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#Modalrules" >RULES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#Modalleaderboard" >LEADERBOARD</a>
      </li>
      </ul>
       <ul class="nav navbar-nav navbar-right">
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-toggle="modal" data-target="#Modallogout" >LOGOUT</a>
      </li>
    </ul>
    <ul class="nav navbar-nav ml-auto navbar-right">
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-toggle="modal" data-target="" >Your Score <?php echo "$score" ?></a>
      </li>
      <a class="nav-link blink" data-toggle="modal" data-toggle="modal" data-target="#Modalevent" >OTHER EVENTS</a>
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-toggle="modal" data-target="#Modalcontact" >CONTACT US</a>
      </li>
    </ul>
</div>
</div>
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
            <li data-toggle="collapse" data-target="#day1"><u>Day 1(October 9)</u></li><br>
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
            <a href="logout.php"><button type="button" class="btn btn-default pull-left logy" >Yes</button></a>
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
<br>
<br>
<br>

<div >
  <center><h1 class="custom">You light the cigar taking a sigh of relief that everything is now back to normal.</h1></center>
</div>
<br>

<div class="d-none d-sm-block">
<center><h1 class="custom anim">CONGRATULATIONS!!</h1></center>
</div>
<div class="d-sm-none">
  <center><h1 class="custom2 anim"><b>CONGRATS!!</b></h1></center>
</div>
</div>
  <br>
  <br>
  <br>

<h3 class="custom d-none d-sm-block">
 <center>You have successfully completed <b>HOPELESS OPUS</b></center>
</h3>

<h3 class="custom2 d-sm-none">
 <center>You have successfully completed <br><b>HOPELESS OPUS</b></center>
</h3>




<canvas id="canvas" style="width: 100%;"></canvas>

<div id="new" class="fixed-bottom">DEVELOPED BY ACUMEN</div>
<style>
/*h1,h2,h3
{
  position: absolute;
  margin-top: 30vh;
  width: 100%;
  text-align: center;
  font-size: 333%;
  font-family: sans-serif;
  color: white;
  opacity: 1;
  line-spacing:1;
  padding-bottom: 50px;
  font-family: 'montserrat';
}*/

canvas {
  /*overflow-y: hidden;
  overflow-x: hidden;
  width: 100%;
  margin: 0;*/
  margin-top: -500px;
}
body{
  background-color:black;
  /*overflow: hidden;*/
}
#new{
  background-color:#373737;
  color:white;
  text-align: center;
  margin-bottom: 0px;
  font-family: 'montserrat';
}

</style>
<script>
let W = window.innerWidth;
let H = window.innerHeight;
const canvas = document.getElementById("canvas");
const context = canvas.getContext("2d");
const maxConfettis = 90;
const particles = [];

const possibleColors = [
  "DodgerBlue",
  "OliveDrab",
  "Gold",
  "Pink",
  "SlateBlue",
  "LightBlue",
  "Gold",
  "Violet",
  "PaleGreen",
  "SteelBlue",
  "SandyBrown",
  "Chocolate",
  "Crimson"
];

function randomFromTo(from, to) {
  return Math.floor(Math.random() * (to - from + 1) + from);
}

function confettiParticle() {
  this.x = Math.random() * W; // x
  this.y = Math.random() * H - H; // y
  this.r = randomFromTo(11, 33); // radius
  this.d = Math.random() * maxConfettis + 11;
  this.color =
    possibleColors[Math.floor(Math.random() * possibleColors.length)];
  this.tilt = Math.floor(Math.random() * 33) - 11;
  this.tiltAngleIncremental = Math.random() * 0.07 + 0.05;
  this.tiltAngle = 0;

  this.draw = function() {
    context.beginPath();
    context.lineWidth = this.r / 2;
    context.strokeStyle = this.color;
    context.moveTo(this.x + this.tilt + this.r / 3, this.y);
    context.lineTo(this.x + this.tilt, this.y + this.tilt + this.r / 5);
    return context.stroke();
  };
}

function Draw() {
  const results = [];

  // Magical recursive functional love
  requestAnimationFrame(Draw);

  context.clearRect(0, 0, W, window.innerHeight);

  for (var i = 0; i < maxConfettis; i++) {
    results.push(particles[i].draw());
  }

  let particle = {};
  let remainingFlakes = 0;
  for (var i = 0; i < maxConfettis; i++) {
    particle = particles[i];

    particle.tiltAngle += particle.tiltAngleIncremental;
    particle.y += (Math.cos(particle.d) + 3 + particle.r / 2) / 2;
    particle.tilt = Math.sin(particle.tiltAngle - i / 3) * 15;

    if (particle.y <= H) remainingFlakes++;

    // If a confetti has fluttered out of view,
    // bring it back to above the viewport and let if re-fall.
    if (particle.x > W + 30 || particle.x < -30 || particle.y > H) {
      particle.x = Math.random() * W;
      particle.y = -30;
      particle.tilt = Math.floor(Math.random() * 10) - 20;
    }
  }

  return results;
}

window.addEventListener(
  "resize",
  function() {
    W = window.innerWidth;
    H = window.innerHeight;
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  },
  false
);

// Push new confetti objects to `particles[]`
for (var i = 0; i < maxConfettis; i++) {
  particles.push(new confettiParticle());
}

// Initialize
canvas.width = W;
canvas.height = H;
Draw();



</script>
</body>
</html>

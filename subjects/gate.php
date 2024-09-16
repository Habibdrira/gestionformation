<?php
session_start();

include('includes/dbconnection.php');

// Vérifier si l'utilisateur est connecté
function checkLoggedIn() {
  if (isset($_SESSION['role']) && isset($_SESSION['student_id']) && isset($_SESSION['student_username'])) {
      $_SESSION['error'] = "Vous devez être connecté en tant qu'étudiant pour accéder à cette page.";
      header('Location: ../login.php');
      exit;
  }
}

checkLoggedIn();
?>



<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" type="jpG" href="img/icon/iteam.jpg" >
        <title>Prepare for GATE on ELIteam</title>
        <link rel="stylesheet" type="text/css" href="subjects.css">
        <script type="text/javascript" src="../script.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>
<body>


<?php include "sub-nav.php"; ?>


<!-- Main Title of the Page -->
	<div class="title" style="margin-top: 150px;">
		<span>Prepare for GATE Exams on LearnEd</span>
		<div class="shortdesc">
			<p>Learn from LearnEd for better higher studies in<br> Indian Institutes of Technologies(IIT)</p>
		</div>
	</div>


<!-- Some KeyWords related to topic -->
	<div class="course">
		<div class="cbox">
		<div class="det"><a href="#digital">Digital Logic</a></div>
		<div class="det"><a href="https://en.wikipedia.org/wiki/Sequential_logic" target="_blank">Combinational & Sequential Circuits</a></div>
		<div class="det"><a href="https://en.wikipedia.org/wiki/ALU" target="_blank">Computer Arithmetic</a></div>
		<div class="det"><a href="https://en.wikipedia.org/wiki/Boolean_algebra" target="_blank">Boolean Algebra</a></div>
		<div class="det"><a href="computer_courses.html#algo">Algorithm</a></div>
		<div class="det"><a href="computer_courses.html#data">Data Structures</a></div>
		</div>
		<div class="cbox">
		<div class="det"><a href="#compiler">Compiler Design</a></div>
		<div class="det"><a href="#os">OS</a></div>
		<div class="det"><a href="#coaa">Computer Organization & Architecture</a></div>
		<div class="det"><a href="https://en.wikipedia.org/wiki/IPv4" target="_blank">IPv4 / IPv6</a></div>
		<div class="det"><a href="#cn">Computer Networks</a></div>
		<div class="det"><a href="#database">Databases</a></div>
		<div class="det"><a href="https://en.wikipedia.org/wiki/Theory_of_computation" target="_blank">Theory of Computation</a></div>
		</div>
		<div class="cbox">
		<div class="det"><a href="#math">Discrete Mathematics</a></div>
		<div class="det"><a href="#math">Calculus</a></div>
		<div class="det"><a href="#math">Linear Algebra</a></div>
		<div class="det"><a href="#math">Trigonometry</a></div>
		<div class="det"><a href="#math">Integration</a></div>
		<div class="det"><a href="#math">Matrices</a></div>
		<div class="det"><a href="#math">Probability</a></div>
		<div class="det"><a href="#math">Differentiation</a></div>
		</div>
	</div>


<!-- Courses Available -->
	<div class="inbt">
		Accelerate your career with GATE programs
	</div>

	<div class="ccard">
	<center>
		<div class="ccardbox">
			<div class="dcard">
				<div class="fpart"><img src="../images/courses/math.jpg"></div>
				<a href="#math"><div class="spart">2 Courses <img src="../images/icon/dropdown.png"></div></a>
			</div>
			<div class="dcard">
				<div class="fpart"><img src="../images/courses/digital.jpg"></div>
				<a href="#digital"><div class="spart">5 Courses <img src="../images/icon/dropdown.png"></div></a>
			</div>
			<div class="dcard">
				<div class="fpart"><img src="../images/courses/coaa.jpg"></div>
				<a href="#coaa"><div class="spart">3 Courses <img src="../images/icon/dropdown.png"></div></a>
			</div>
			<div class="dcard">
				<div class="fpart"><img src="../images/courses/database.jpg"></div>
				<a href="#database"><div class="spart">3 Courses <img src="../images/icon/dropdown.png"></div></a>
			</div>
			<div class="dcard">
				<div class="fpart"><img src="../images/courses/data-algo.jpg"></div>
				<a href="computer_courses.html#data"><div class="spart">6 Courses <img src="../images/icon/dropdown.png"></div></a>
			</div>
			<div class="dcard">
				<div class="fpart"><img src="../images/courses/compiler.jpg"></div>
				<a href="#compiler"><div class="spart">2 Courses <img src="../images/icon/dropdown.png"></div></a>
			</div>
			<div class="dcard">
				<div class="fpart"><img src="../images/courses/os.jpg"></div>
				<a href="#os"><div class="spart">1 Courses <img src="../images/icon/dropdown.png"></div></a>
			</div>
			<div class="dcard">
				<div class="fpart"><img src="../images/courses/cn.jpg"></div>
				<a href="#cn"><div class="spart">3 Courses <img src="../images/icon/dropdown.png"></div></a>
			</div>
		</div>
	</center>
	</div>


<!-- Videos on ENGINEERING MATHEMATICS Lectures -->

	<div class="title2" id="math">
		<span>Engineering Mathematics</span>
		<div class="shortdesc2">
			<p>Practice Mathematics on your tips...</p>
		</div>
	</div>
	
	<center>
		<div class="ccardbox2">
			<div class="dcard2"><span class="tag" >1/8</span>
				<div class="fpart2"><img src="../images/courses/math.jpg">
					<iframe src="https://www.youtube.com/embed/xxGyTHWrHZg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >2/8</span>
				<div class="fpart2"><img src="../images/courses/math.jpg">
					<iframe src="https://www.youtube.com/embed/xxGyTHWrHZg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >3/8</span>
				<div class="fpart2"><img src="../images/courses/math.jpg">
					<iframe src="https://www.youtube.com/embed/xxGyTHWrHZg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >4/8</span>
				<div class="fpart2"><img src="../images/courses/math.jpg">
					<iframe src="https://www.youtube.com/embed/xxGyTHWrHZg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		
			<div class="dcard2"><span class="tag" >5/8</span>
				<div class="fpart2"><img src="../images/courses/math.jpg">
					<iframe src="https://www.youtube.com/embed/xxGyTHWrHZg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >6/8</span>
				<div class="fpart2"><img src="../images/courses/math.jpg">
					<iframe src="https://www.youtube.com/embed/xxGyTHWrHZg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >7/8</span>
				<div class="fpart2"><img src="../images/courses/math.jpg">
					<iframe src="https://www.youtube.com/embed/xxGyTHWrHZg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >8/8</span>
				<div class="fpart2"><img src="../images/courses/math.jpg">
					<iframe src="https://www.youtube.com/embed/xxGyTHWrHZg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</center>
<br><br>
	<div class="click-me">
		<a href="https://www.youtube.com/watch?v=xxGyTHWrHZg" target="_blank">Click Here to Watch full playlist</a>
	</div>



<!-- Videos on DIGITAL LOGIC Lectures -->

	<div class="title2" id="digital">
		<span>Digital Logic</span>
		<div class="shortdesc2">
			<p>Learn deeply about Digital Logic Circuits...</p>
		</div>
	</div>
	<center>
		<div class="ccardbox2">
			<div class="dcard2"><span class="tag" >1/8</span>
				<div class="fpart2"><img src="../images/courses/digital.jpg">
					<iframe src="https://www.youtube.com/embed/-M7oIM8hKSU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >2/8</span>
				<div class="fpart2"><img src="../images/courses/digital.jpg">
					<iframe src="https://www.youtube.com/embed/-M7oIM8hKSU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >3/8</span>
				<div class="fpart2"><img src="../images/courses/digital.jpg">
					<iframe src="https://www.youtube.com/embed/-M7oIM8hKSU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >4/8</span>
				<div class="fpart2"><img src="../images/courses/digital.jpg">
					<iframe src="https://www.youtube.com/embed/-M7oIM8hKSU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		
			<div class="dcard2"><span class="tag" >5/8</span>
				<div class="fpart2"><img src="../images/courses/digital.jpg">
					<iframe src="https://www.youtube.com/embed/-M7oIM8hKSU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >6/8</span>
				<div class="fpart2"><img src="../images/courses/digital.jpg">
					<iframe src="https://www.youtube.com/embed/-M7oIM8hKSU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >7/8</span>
				<div class="fpart2"><img src="../images/courses/digital.jpg">
					<iframe src="https://www.youtube.com/embed/-M7oIM8hKSU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >8/8</span>
				<div class="fpart2"><img src="../images/courses/digital.jpg">
					<iframe src="https://www.youtube.com/embed/-M7oIM8hKSU" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</center>
<br><br>
	<div class="click-me">
		<a href="https://youtu.be/-M7oIM8hKSU" target="_blank">Click Here to Watch full playlist</a>
	</div>



<!-- Videos on COMPUTER ORGANIZATION and ARCHITECTURE Lectures -->

	<div class="title2" id="coaa">
		<span>Computer Organization and Architecture</span>
		<div class="shortdesc2">
			<p>Build your concepts strong easily with our great tutors...</p>
		</div>
	</div>
	<center>
		<div class="ccardbox2">
			<div class="dcard2"><span class="tag" >1/8</span>
				<div class="fpart2"><img src="../images/courses/coaa.jpg">
					<iframe src="https://www.youtube.com/embed/q6oiRtKTpX4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >2/8</span>
				<div class="fpart2"><img src="../images/courses/coaa.jpg">
					<iframe src="https://www.youtube.com/embed/q6oiRtKTpX4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >3/8</span>
				<div class="fpart2"><img src="../images/courses/coaa.jpg">
					<iframe src="https://www.youtube.com/embed/q6oiRtKTpX4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >4/8</span>
				<div class="fpart2"><img src="../images/courses/coaa.jpg">
					<iframe src="https://www.youtube.com/embed/q6oiRtKTpX4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		
			<div class="dcard2"><span class="tag" >5/8</span>
				<div class="fpart2"><img src="../images/courses/coaa.jpg">
					<iframe src="https://www.youtube.com/embed/q6oiRtKTpX4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >6/8</span>
				<div class="fpart2"><img src="../images/courses/coaa.jpg">
					<iframe src="https://www.youtube.com/embed/q6oiRtKTpX4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >7/8</span>
				<div class="fpart2"><img src="../images/courses/coaa.jpg">
					<iframe src="https://www.youtube.com/embed/q6oiRtKTpX4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >8/8</span>
				<div class="fpart2"><img src="../images/courses/coaa.jpg">
					<iframe src="https://www.youtube.com/embed/q6oiRtKTpX4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</center>
<br><br>
	<div class="click-me">
		<a href="https://youtu.be/q6oiRtKTpX4" target="_blank">Click Here to Watch full playlist</a>
	</div>



<!-- Videos on COMPILER Lectures -->

	<div class="title2" id="compiler">
		<span>Compiler Design</span>
		<div class="shortdesc2">
			<p>Build your concepts strong easily with our great tutors...</p>
		</div>
	</div>
	<center>
		<div class="ccardbox2">
			<div class="dcard2"><span class="tag" >1/8</span>
				<div class="fpart2"><img src="../images/courses/compiler.jpg">
					<iframe src="https://www.youtube.com/embed/yNZIhF6pxjM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >2/8</span>
				<div class="fpart2"><img src="../images/courses/compiler.jpg">
					<iframe src="https://www.youtube.com/embed/yNZIhF6pxjM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >3/8</span>
				<div class="fpart2"><img src="../images/courses/compiler.jpg">
					<iframe src="https://www.youtube.com/embed/yNZIhF6pxjM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >4/8</span>
				<div class="fpart2"><img src="../images/courses/compiler.jpg">
					<iframe src="https://www.youtube.com/embed/yNZIhF6pxjM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		
			<div class="dcard2"><span class="tag" >5/8</span>
				<div class="fpart2"><img src="../images/courses/compiler.jpg">
					<iframe src="https://www.youtube.com/embed/yNZIhF6pxjM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >6/8</span>
				<div class="fpart2"><img src="../images/courses/compiler.jpg">
					<iframe src="https://www.youtube.com/embed/yNZIhF6pxjM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >7/8</span>
				<div class="fpart2"><img src="../images/courses/compiler.jpg">
					<iframe src="https://www.youtube.com/embed/yNZIhF6pxjM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >8/8</span>
				<div class="fpart2"><img src="../images/courses/compiler.jpg">
					<iframe src="https://www.youtube.com/embed/yNZIhF6pxjM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</center>
<br><br>
	<div class="click-me">
		<a href="https://youtu.be/yNZIhF6pxjM" target="_blank">Click Here to Watch full playlist</a>
	</div>



<!-- Videos on OPERATING SYSTEM Lectures -->


<div class="title2" id="os">
		<span>Operating System</span>
		<div class="shortdesc2">
			<p>Build your concepts strong easily with our great tutors...</p>
		</div>
	</div>
	<center>
		<div class="ccardbox2">
			<div class="dcard2"><span class="tag" >1/8</span>
				<div class="fpart2"><img src="../images/courses/os.jpg">
					<iframe src="https://www.youtube.com/embed/vBURTt97EkA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >2/8</span>
				<div class="fpart2"><img src="../images/courses/os.jpg">
					<iframe src="https://www.youtube.com/embed/vBURTt97EkA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >3/8</span>
				<div class="fpart2"><img src="../images/courses/os.jpg">
					<iframe src="https://www.youtube.com/embed/vBURTt97EkA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >4/8</span>
				<div class="fpart2"><img src="../images/courses/os.jpg">
					<iframe src="https://www.youtube.com/embed/vBURTt97EkA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		
			<div class="dcard2"><span class="tag" >5/8</span>
				<div class="fpart2"><img src="../images/courses/os.jpg">
					<iframe src="https://www.youtube.com/embed/vBURTt97EkA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >6/8</span>
				<div class="fpart2"><img src="../images/courses/os.jpg">
					<iframe src="https://www.youtube.com/embed/vBURTt97EkA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >7/8</span>
				<div class="fpart2"><img src="../images/courses/os.jpg">
					<iframe src="https://www.youtube.com/embed/vBURTt97EkA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >8/8</span>
				<div class="fpart2"><img src="../images/courses/os.jpg">
					<iframe src="https://www.youtube.com/embed/vBURTt97EkA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</center>

<br><br>
	<div class="click-me">
		<a href="https://youtu.be/vBURTt97EkA" target="_blank">Click Here to Watch full playlist</a>
	</div>


<!-- Videos on DATABASE Lectures -->

<div class="title2" id="database">
		<span>Databases</span>
		<div class="shortdesc2">
			<p>Build your concepts strong easily with our great tutors...</p>
		</div>
	</div>
	<center>
		<div class="ccardbox2">
			<div class="dcard2"><span class="tag" >1/8</span>
				<div class="fpart2"><img src="../images/courses/database.jpg">
					<iframe src="https://www.youtube.com/embed/wR0jg0eQsZA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >2/8</span>
				<div class="fpart2"><img src="../images/courses/database.jpg">
					<iframe src="https://www.youtube.com/embed/wR0jg0eQsZA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >3/8</span>
				<div class="fpart2"><img src="../images/courses/database.jpg">
					<iframe src="https://www.youtube.com/embed/wR0jg0eQsZA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >4/8</span>
				<div class="fpart2"><img src="../images/courses/database.jpg">
					<iframe src="https://www.youtube.com/embed/wR0jg0eQsZA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		
			<div class="dcard2"><span class="tag" >5/8</span>
				<div class="fpart2"><img src="../images/courses/database.jpg">
					<iframe src="https://www.youtube.com/embed/wR0jg0eQsZA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >6/8</span>
				<div class="fpart2"><img src="../images/courses/database.jpg">
					<iframe src="https://www.youtube.com/embed/wR0jg0eQsZA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >7/8</span>
				<div class="fpart2"><img src="../images/courses/database.jpg">
					<iframe src="https://www.youtube.com/embed/wR0jg0eQsZA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >8/8</span>
				<div class="fpart2"><img src="../images/courses/database.jpg">
					<iframe src="https://www.youtube.com/embed/wR0jg0eQsZA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</center>
<br><br>
	<div class="click-me">
		<a href="https://youtu.be/wR0jg0eQsZA" target="_blank">Click Here to Watch full playlist</a>
	</div>



<!-- Videos on COMPUTER NETWORKS Lectures -->

<div class="title2" id="cn">
		<span>Computer Networks</span>
		<div class="shortdesc2">
			<p>Build your concepts strong easily with our great tutors...</p>
		</div>
	</div>
	<center>
		<div class="ccardbox2">
			<div class="dcard2"><span class="tag" >1/8</span>
				<div class="fpart2"><img src="../images/courses/cn.jpg">
					<iframe src="https://www.youtube.com/embed/qiQR5rTSshw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >2/8</span>
				<div class="fpart2"><img src="../images/courses/cn.jpg">
					<iframe src="https://www.youtube.com/embed/qiQR5rTSshw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >3/8</span>
				<div class="fpart2"><img src="../images/courses/cn.jpg">
					<iframe src="https://www.youtube.com/embed/qiQR5rTSshw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >4/8</span>
				<div class="fpart2"><img src="../images/courses/cn.jpg">
					<iframe src="https://www.youtube.com/embed/qiQR5rTSshw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		
			<div class="dcard2"><span class="tag" >5/8</span>
				<div class="fpart2"><img src="../images/courses/cn.jpg">
					<iframe src="https://www.youtube.com/embed/qiQR5rTSshw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >6/8</span>
				<div class="fpart2"><img src="../images/courses/cn.jpg">
					<iframe src="https://www.youtube.com/embed/qiQR5rTSshw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >7/8</span>
				<div class="fpart2"><img src="../images/courses/cn.jpg">
					<iframe src="https://www.youtube.com/embed/qiQR5rTSshw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="dcard2"><span class="tag" >8/8</span>
				<div class="fpart2"><img src="../images/courses/cn.jpg">
					<iframe src="https://www.youtube.com/embed/qiQR5rTSshw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</center>

<br><br>
	<div class="click-me">
		<a href="https://youtu.be/qiQR5rTSshw" target="_blank">Click Here to Watch full playlist</a>
	</div>

	

    <footer>
        <div class="footer-container">
            <div class="left-col">
                <img src="../img/icon/iteam.jpg" style="width: 100px;">
                <div class="logo"></div>
                <div class="social-media">
                    <a href="#"><img src="../img/icon\fb.png"></a>
                    <a href="#"><img src="../img/icon\insta.png"></a>
                    <a href="#"><img src="../img/icon\tt.png"></a>
                    <a href="#"><img src="../img/icon\ytube.png"></a>
                    <a href="#"><img src="../img/icon\linkedin.png"></a>
                </div><br><br>
                <p class="rights-text">web devoloped by Zahaf Donia and Drira Habib</p>
                <br><p><img src="../img/icon/location.png"> Lovely Professional University<br>85-87 Rue Palestine 1002 Tunis</p><br>
                <p><img src="../img/icon/phone.png"> +216 22 022 444<br><img src="../img/icon/mail.png">&nbsp; info@iteam-univ.tn</p>
            </div>
            <div class="right-col">
                <h1 style="color: #fff">Our Newsletter</h1>
                <div class="border"></div><br>
                <p>Enter Your Email to get our News and updates.</p>
                <form class="newsletter-form">
                    <input class="txtb" type="email" placeholder="Enter Your Email">
                    <input class="btn" type="submit" value="Submit">
                </form>
            </div>
        </div>
    </footer>

</body>
</html>
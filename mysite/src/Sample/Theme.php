

<?php
session_start();
include_once 'dbconnect.php';

if(!isset($_SESSION['user']))
{
 header("Location: login.php");
}
$resu=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
$userRow=mysql_fetch_array($resu);
?>
<?php  $theme->setOption('site_title','Department of Civil Engineering');?> 

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Civil Engineering | Instruments</title> == $0
  <link rel="icon" type="image/x-icon" href="/favicon.ico?v=1.4.67">

</head>
<body>
<!-- HEADER-->
  <header>
      <div class="header-main index">
          <div class="container">
              <div class="header-main-wrapper">
                  <div class="navbar-heade">
                      <div class="logo pull-left"><a href="index.php" class="header-logo"><img src="assets/images/logo-color-1.png"   alt=""/></a></div>
                      <button type="button" data-toggle="collapse" data-target=".navigation" class="navbar-toggle edugate-navbar"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                  </div>
                  <nav class="navigation collapse navbar-collapse pull-right">
                      <ul class="nav-links nav navbar-nav">

                          <li><a href="index.php" class="main-menu">Home</a></li>

                          <li><a href="explore.php" class="main-menu">Explore</a></li>

                          <li><a href="material.php" class="main-menu">Material</a></li>

                          <li><a href="review.php" class="main-menu">Review</a></li>


                          <li class="dropdown"><a href="javascript:void(0)" class="main-menu">News<span class="fa fa-angle-down icons-dropdown"></span></a>
                              <ul class="dropdown-menu edugate-dropdown-menu-1">
                                  <li><a href="news-masonry.php" class="link-page">All News</a></li>
                                  <li><a href="newsindia.php" class="link-page">India</a></li>
                                  <li><a href="newsbiz.php" class="link-page">Business</a></li>
                                  <li><a href="newssports.php" class="link-page">Sports</a></li>
                                  <li><a href="newsworld.php" class="link-page">World</a></li>
                                  <li><a href="newstech.php" class="link-page">Technology</a></li>
                                  <li><a href="newsstart.php" class="link-page">Start Up</a></li>
                                  <li><a href="newsenter.php" class="link-page">Entertainment</a></li>

                              </ul>
                          </li>

                          <li class="dropdown active"><a href="javascript:void(0)" class="main-menu">Contact<span class="fa fa-angle-down icons-dropdown"></span></a>
                              <ul class="dropdown-menu edugate-dropdown-menu-1">
                                  <li><a href="authors.php" class="link-page">Authors</a></li>
                                  <li><a href="about-us.php" class="link-page">about us</a></li>
                                  <li><a href="faq.php" class="link-page">FAQ page</a></li>
                                    <li><a href="contact.php" class="link-page">Contact Us</a></li>
                              </ul>
                          </li>
                          <li class="dropdown" class="group-sign-in"><a href="javascript:void(0)" class="main-menu" > hello <?php echo $userRow['username']; ?>&nbsp;<span class="fa fa-angle-down icons-dropdown"></span></a>
                              <ul class="dropdown-menu edugate-dropdown-menu-1">
                                  <li><a  href="logout.php?logout" class="link-page">Sign Out</a></li>

                              </ul>
                          </li>



                      </ul>
                  </nav>
              </div>
          </div>
      </div>
  </header>

<!-- WRAPPER-->
<div id="wrapper-content"><!-- PAGE WRAPPER-->
    <div id="page-wrapper"><!-- MAIN CONTENT-->
        <div class="main-content"><!-- CONTENT-->
            <div class="content">
                <div class="section background-opacity page-title set-height-top">
                    <div class="container">
                        <div class="page-title-wrapper"><!--.page-title-content--><h2 class="captions">all material</h2>
                            <ol class="breadcrumb">
                                <li><a href="index.php">Home</a></li>
                                <li class="active"><a href="#">material</a></li>
                            </ol>
                        </div>
                    </div>
                </div>

                <div class="section">
                    <div class="search-input" style="height:160;">
                        <div class="container">
                            <div class="search-input-wrapper" style="
    margin-left: 280px;
">
<form action="" method="post">
<table border="0">

<tr><td><select aria-label="Course"  name="Course" onchange="selCource()" id="couse1" >
<option value="def">Course</option>
<?php
$con = mysql_connect("localhost","root","") or die("MySQL Connection Error : ".mysql_error());
$db = mysql_select_db("data",$con) or die("MySQL Select DB Error : ".mysql_error());
if($db)
{
$q = "SELECT * FROM course";
$res = mysql_query($q);
while($row = mysql_fetch_array($res))
{ ?>
<option value="<?php echo $row['c_id']; ?>"><?php echo $row['c_name']; ?></option>
<?php	}
}
?>
</select></td>

<td><select aria-label="Branch"  name="Branch" id="branch1"  style="200px">
<option value="0" selected>Branch</option>
</select></td>

<td><select aria-label="Semester" name="Semester"   style="200px"  >
<option value="" selected>Semester</option>
<option value="1">Semester - 1</option>
<option value="2">Semester - 2</option>
<option value="3">Semester - 3</option>
<option value="4">Semester - 4</option>
<option value="5">Semester - 5</option>
<option value="6">Semester - 6</option>
</select></td>
<button type="submit"   class="form-submit btn btn-blue" name="search" value="Search" style="margin-right:210px">Search</button></tr>
</table><!--<input type="button" name="Search" value="Search" style="width:550px; height:50px">-->

</form>
<?php
/*echo "<pre>";
print_r($_SERVER);
echo "</pre>";*/
if(isset($_POST['search']) && $_POST['search'] == 'Search')
{
if(!empty($_POST['Course']) && !empty($_POST['Branch']) && !empty($_POST['Semester']))
{
$cid = $_POST['Course'];
$bid = $_POST['Branch'];
$sem = $_POST['Semester'];
$con = mysql_connect("localhost","root","") or die("MySQL Connection Error : ".mysql_error());
$db = mysql_select_db("data",$con) or die("MySQL Select DB Error : ".mysql_error());
if($db)
{
$q = "SELECT * FROM `file` WHERE `f_cid`=".$cid." AND `f_sid`=".$sem." AND `f_bid`=".$bid;
$res = mysql_query($q);
$result=mysql_fetch_array($res);
$url=$result['f_name'];
?>
<script type="text/javascript" language="Javascript">window.open('<?php echo$url;?>');</script>
<?php

}
}
}
?>
<section id="action" class="responsive">
<div class="vertical-center">
<div class="container">
<div class="row">
<div class="action take-tour">
<div class="col-sm-7 wow fadeInLeft" data-wow-duration="500ms" data-wow-delay="300ms">
</div>
<div class="col-sm-5 text-center wow fadeInRight" data-wow-duration="500ms" data-wow-delay="300ms">
</div>
</div>
</div>
</div>
</div>
</section>
                            </div>
                        </div>
                    </div>
                </div>

                            <!-- Tab panes-->
                            <div class="section slider-logo">
                                <div class="container">
                                    <div class="slider-logo-wrapper">
                                        <div class="slider-logo-content">
                                            <div class="carousel-logos owl-carousel">
                                                <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-1.png" alt="" class="img-responsive"/></a></div>
                                                <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-2.png" alt="" class="img-responsive"/></a></div>
                                                <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-3.png" alt="" class="img-responsive"/></a></div>
                                                <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-4.png" alt="" class="img-responsive"/></a></div>
                                                <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-5.png" alt="" class="img-responsive"/></a></div>
                                                <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-6.png" alt="" class="img-responsive"/></a></div>
                                                <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-1.png" alt="" class="img-responsive"/></a></div>
                                                <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-2.png" alt="" class="img-responsive"/></a></div>
                                                <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-3.png" alt="" class="img-responsive"/></a></div>
                                                <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-4.png" alt="" class="img-responsive"/></a></div>
                                                <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-5.png" alt="" class="img-responsive"/></a></div>
                                                <div class="logo-iteam item"><a href="#"><img src="assets/images/logo/logo-carousel-6.png" alt="" class="img-responsive"/></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<!-- FOOTER-->


<div class="section background-opacity page-title set-height-top" style="height:100px">
    <div class="container">
        <div class="page-title-wrapper"><!--.page-title-content--><h2 class="captions">MATERIALS</h2>

        </div>
    </div>
</div>


<!-- LOADING--><!-- JAVASCRIPT LIBS-->
<script>if ((Cookies.get('color-skin') != undefined) && (Cookies.get('color-skin') != 'color-1')) {
    $('.logo .header-logo img').attr('src', 'assets/images/logo-' + Cookies.get('color-skin') + '.png');
} else if ((Cookies.get('color-skin') == undefined) || (Cookies.get('color-skin') == 'color-1')) {
    $('.logo .header-logo img').attr('src', 'assets/images/menu.png');
}</script>
<script src="assets/libs/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<script src="assets/libs/smooth-scroll/jquery-smoothscroll.js"></script>
<script src="assets/libs/owl-carousel-2.0/owl.carousel.min.js"></script>
<script src="assets/libs/appear/jquery.appear.js"></script>
<script src="assets/libs/count-to/jquery.countTo.js"></script>
<script src="assets/libs/wow-js/wow.min.js"></script>
<script src="assets/libs/selectbox/js/jquery.selectbox-0.2.min.js"></script>
<script src="assets/libs/fancybox/js/jquery.fancybox.js"></script>
<script src="assets/libs/fancybox/js/jquery.fancybox-buttons.js"></script>
<!-- MAIN JS-->
<script src="assets/js/main.js"></script>

<script type="text/javascript" language="javascript">
		function selCource()
		{

			var cid = $("#couse1").find('option:selected').val();
			//var cnm = $("#couse1").find('option:selected').text();
			//alert("Ohhh...ID = "+cid+" NM = "+cnm);
			$.ajax({
				url: 'getData.php',
				data: {'c_id': cid},
				type:'post',
				success:function(response){
					//alert(''+response);
					$("#branch1").html(response);
				}
			});
		}
		$(function(){
			$('#fileid').click();
			//alert('ooooohhhhhh...');
		});
	</script>


<!-- LOADING SCRIPTS FOR PAGE-->
<script src="assets/js/pages/material.js"></script>
</body>

<!-- Mirrored from swlabs.co/edugate/material.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Mar 2016 05:07:25 GMT -->
</html>

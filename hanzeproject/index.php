<html>
<head>
<title>Cultural Navigation</title>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<script src="js/jquery.min.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,800,300,100,500,700,600,900' rel='stylesheet' type='text/css'>
<!--animated-css-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!--/animated-css-->
<!--script-->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<!--/script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>
</head>
<body>
<!---->
	<div class="banner-bg">
            
		<div class="banner">
		 <div class="header">	 
			 <div  class="logo wow fadeInLeft" data-wow-delay="0.5s">
                            <h1 class='head' style="color: whitesmoke">Cultural Navigation</h1>
			 </div>	
			 <div class="top-menu">
				<span class="menu"></span> 
			<?php
                        //Importeer het hoofdmenu   
                        // require 'includes/menu.php';
                        
                        ?>
			 </div>
			 <div class="clearfix"></div>
			 <!-- script-for-menu -->
		 <script>
			$( "span.menu" ).click(function() {
			$( "ul.cl-effect-1" ).slideToggle( 300, function() {
			// Animation complete.
			});
			});
		</script>
		 <!-- script-for-menu -->			 
		 </div>
		 <div class="banner-text wow fadeInUp" data-wow-delay="0.5s">
			 <h1>Plan en<span> boek</span> uw perfecte trip </h1>
		 </div>
		 <div class="booking-form">
					<!---strat-date-piker---->
					<link rel="stylesheet" href="css/jquery-ui.css" />
					<script src="js/jquery-ui.js"></script>
							  <script>
									  $(function() {
										$( "#datepicker,#datepicker1" ).datepicker();
									  });
							  </script>
					<!---/End-date-piker---->
					<link type="text/css" rel="stylesheet" href="css/JFGrid.css" />
					<link type="text/css" rel="stylesheet" href="css/JFFormStyle-1.css" />
					<script type="text/javascript" src="js/JFCore.js"></script>
					<script type="text/javascript" src="js/JFForms.js"></script>
					<script type="text/javascript">
						(function() {
							JC.init({
								domainKey: ''
							});
						})();
					</script>
					<div class="online_reservation">
							<?php
                                                            require 'includes/bookingform.php';
                                                        ?>
					</div>
					<!---->	
			</div>
			 <div class="clearfix"></div> 
			 <div class="online-form">
				<a class="play-icon popup-with-zoom-anim" href="#small-dialog2">Booking Here</a>
			</div>
			<div id="small-dialog2" class="mfp-hide">
									<div class="signup">
										<form>
											<input type="text" class="email" placeholder="Vertrek plaats" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" />
											<input type="text" class="email" placeholder="Aankomst plaats" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" />
											<input type="text" class="email" placeholder="2/04/2015" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" />
											<input type="text" class="email" placeholder="22/08/2015" required="required" pattern="([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?" />
											<input type="submit"  value="Boek nu!"/>
										</form>
									</div>
									<div class="clearfix"> </div>
								</div>	
								<script>
										$(document).ready(function() {
										$('.popup-with-zoom-anim').magnificPopup({
											type: 'inline',
											fixedContentPos: false,
											fixedBgPos: true,
											overflowY: 'auto',
											closeBtnInside: true,
											preloader: false,
											midClick: true,
											removalDelay: 300,
											mainClass: 'my-mfp-zoom-in'
										});
																										
										});
								</script>	
		</div>
	</div>

<div class="video">
	 <div class="container">
		
		
			
			<div class="col-md-4 video-right">
				
				
				<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
				<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
				<script>
						$(document).ready(function() {
						$('.popup-with-zoom-anim').magnificPopup({
						type: 'inline',
						fixedContentPos: false,
						fixedBgPos: true,
						overflowY: 'auto',
						closeBtnInside: true,
						preloader: false,
						midClick: true,
						removalDelay: 300,
						mainClass: 'my-mfp-zoom-in'
						});
						});
                                </script>
			</div>
		
	 </div>
</div>




 </body>
 </html>
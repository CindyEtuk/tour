
<!DOCTYPE html> 
<html> 
   <head> 
      <meta charset='utf-8'>
	  <link rel="stylesheet" href="../assests/stylesheet/skippr.css">
	  <link href="../assests/stylesheet/style.css" rel="stylesheet" type="text/css">
	<link href="../assests/stylesheet/main.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <title>CityTourDubai</title>

</head>
<body>


<?php

	require_once('functions.php');
	echo makePageStart();
	echo makeNavMenu();
	echo MakeBannerSection();

	?>


	    <!-- section-one -->
		<div class="section1">
		<div class="image1">
		<div class="containerSlider">
            <div id="theTarget">
			<div class="skippr" style="background-image: url(../assests/images/d5.jpg);">
			<p class="caption" style=" text-align: left;">Dubai City</p>
                      <h2 class="title" style=" text-align: center;">Adventure!</h2>
                      </div>
                <div class="skippr" style="background-image: url(../assests/images/d9.jpg);">
                    <p class="caption" style=" text-align: left;">CityTourDubai got you covered</p>
                    <h2 class="title" style=" text-align: left;">Fun Time</h2>
                   </div>
                <div class="skippr" style="background-image: url(../assests/images/d6.jpg);">
                    <p class="caption" style=" text-align: left;">watch as the sunset &</p>
                    <h2 class="title" style=" text-align: left;">Sunrise</h2>
                 
                </div>
                <div class="skippr" style="background-image: url(../assests/images/img4.jpg);">
                    <p class="caption" style="text-align: left; color: #fff;">Both young and old</p>
                    <h2 class="title" style=" text-align: left;">Explore Dubai</h2> 
                  
                </div>
            </div>    
        </div>

        </div>


        
        <div class="text-box">
            <h1>Dubai City </h1>
            <p>In the United Arab Emirates, the city and emirate of Dubai is well-known for its upscale shopping, cutting-edge buildings, and vibrant nightlife. The 830m-tall Burj Khalifa tower dominates the skyline of skyscrapers. Dubai Fountain, with its musically synchronised jets and lights, is located at its base. Atlantis,
				 The Palm is a resort with aquatic and marine animal parks located on artificial islands near offshore.
            </p>

            <button class="button2">find out more</button>
         
        </div>


    </div>
	


	<!-- section_two- -->
	<div class='card-section-banner'>
		<h1>Excursion Event</h1>
	</div>

	<div class='card-container'>
		<div class='card'>
			<img src='../assests/images/d1.jpg' alt=''>
			<p class='date'> Sightseeing </p>
			<h1> Burj Khalifa </h1>

			<div class='span-container'>
			   <span>3-hour .</span>
			   <span> pickup available </span>
		   </div>
		   <p class='description'> From $80 per person</p>
		   <a href='home.php'><button>explore</button></a>


		</div>
		<div class='card'>
			<img src='../assests/images/img5.jpg' alt=''>
			<p class='date'> Tour </p>
			<h1>Aquarium & Zoo</h1>
			<div  class='span-container'>
				<span>4-5hours . </span>
				<span> pickup available </span>
			</div>
			<p class='description'> From $55 per person </p>
			<a href='home.php'><button>explore</button></a>
		</div>
		<div class='card'>
		   <img src='../assests/images/desert.jpg' alt=''>
		   <p class='date'> Safari </p>

		   <h1> Desert Safari & Quad Bike </h1>
		   <div class='span-container'>
			   <span> 6-hours </span>
			   <span>pickup available</span>
		   </div>
		   <p class='description'>From $45 per person</p>
		   <a href='home.php'><button>explore</button></a>
			</div>
		<div class='card'>
		   <img src='../assests/images/img2.jpg' alt=''>
		   <p class='date'>Marina</p>

		   <h1> Boat cruise </h1>
		   <div class='span-container'>
			   <span> 4hours </span>
			   <!-- <span> #couples </span> -->
			   
		   </div>
		   <p class='description'>From $60 per person </p>
		   <a href='home.php'><button>explore</button></a>

		</div>
	</div>




	<?=makeFooter()?>

	<script src="../js/jquery-3.4.1.min.js"></script>
      <script src="../js/skippr.js"></script>
      <script src="../js/slider.js"></script>
	</body>
	</html>
	
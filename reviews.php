<?php
session_start();
include("connections.php");
include("functions.php");
$user_data = check_login($con);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Reviews</title>
		<link rel="stylesheet" href="reviews.css">
	</head>
<body>
<div id="navbar">
    <div class="red-bar">
		<h1><b>Thanks, I hate it!</b></h1>
		<p>logged in as: AdiBerco</p>
	  </div>
	  
	  <div class="lighter-red-row">
		<p><b>KFC Iasi</b></p>
	  </div>
	  <div class="lighter-red-row">
		<p><b>Average rating -4.5/-5 - Trully desipciable</b></p>
	  </div>
	  <div class="lighter-red-row">
		<p><b>Most popular tags</b></p><button class="newsfeed-page-button">Restaurant</button><button class="newsfeed-page-button">Fast food</button><button class="newsfeed-page-button">Fried Chicken</button><button class="newsfeed-page-button">Fries</button><button class="newsfeed-page-button">Expensive</button>
	  </div>
	  <div class="lighter-red-row">
		<p><b>Location</b></p><button class="newsfeed-page-button">Iasi</button><button class="newsfeed-page-button">Romania</button>
	  </div>
	  <div class="lighter-red-row">
		<p><b>Sort reviews by:	</b></p>
		<select class="sort-by">
			<option value="date">Date</option>
			<option value="likes">Most useful</option>
		</select>
	  </div>
	  <div class="lighter-red-row">
		<p><b>You hate this place too? Tell the workd about! </b></p>
		<button class="newsfeed-page-button">I hate this thing!</button>
	  </div>
</div>
	<div class="container margin">
			<div class="review">
				<div class="entry-image">
					<img src="poze/poorlymadechicken.png" alt="entry image">
				</div>
				<div>
					<h3>Date: 2 april 2023 by <b>AdiBerco</b></h3>
					<img src="poze/Angry.png" alt="review icon">
					<h1>Review: </h1>
					<p><b>This thing is so bad, i would rather step on a lego then use it again!</b></p>
					<p>200 people found this review useful<button class="newsfeed-page-button">Like!</button></p>
				</div>
			</div>
			<!-- add more reviews here -->
			<div class="review">
				<div class="entry-image">
					<img src="poze/sadburgers.png" alt="entry image">
				</div>
				<div>
					<h3>Date: 5 april 2023 by <b>RobertHaidau</b></h3>
					<img src="poze/Swearing.png" alt="review icon">
					<h1>Review: </h1>
					<p><b>Vvv bad. Dont use!</b></p>
					<p>125 people found this review useful<button class="newsfeed-page-button">Like!</button></p>
				</div>
			</div>
			<div class="review">
				<div class="entry-image">
					<img src="poze/badsteak_400_250.png" alt="entry image">
				</div>
				<div>
					<h3>Date: 1 april 2023 by <b>CristiPano</b></h3>
					<img src="poze/Mad.png" alt="review icon">
					<h1>Review:</h1>
					<p>><b>So i was just enjoying my regular sunday morning, having a good time and all when all of a sudden I had the unfortunate idea to order a burger from this God forsaken place.
						Lord almighty, what a bad idea that was. Words cannot begin to describe how it ruined my day. Firstly it took them 2 hours to deliver it. Ofcourse once it made it to me, the burger was soggy and cold. The meat was half raw and 
						tasted like the sole of a boot. Practically rubber. I would rather eat my hat before i order from this place again.
					</b></p>
					<p>111 people found this review useful<button class="newsfeed-page-button">Like!</button></p>
				</div>
			</div>

	</div>
</body>
</html>


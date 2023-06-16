<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Newsfeed</title>
		<link rel="stylesheet" href="<?php echo ROOT ?>/css/newsfeed.css">
	</head>
<body>
<div id="navbar">
    <div class="red-bar">
		<h1><b>Thanks, I hate it!</b></h1>
		<p>logged in as: AdiBerco</p>
	  </div>
	  
	  <div class="lighter-red-row">
		<p><b>Category: Restaurants</b></p><button class="newsfeed-page-button">Hatescribe!</button>
	  </div>
	  <div class="lighter-red-row">
		<p>If you're looking for a good place to eat, this is the opposite of that</p>
	  </div>
	  <div class="lighter-red-row">
		<p><b>Most hated:	</b></p>
		<select class="sort-by">
			<option value="trending">Today</option>
			<option value="all-time">This Week</option>
			<option value="all-time">This Month</option>
			<option value="all-time">This year</option>
			<option value="all-time">Ever</option>
		</select>
	  </div>
	  <div class="lighter-red-row">
		<p><b>You hate something? Tell us all about it! </b></p>
		<button class="newsfeed-page-button">I hate something!</button>
	  </div>
	  <div class="lighter-red-row">
		<p><b>Looking for something? Let's look togheter!</b></p>
		<div class="search-bar">
			<input type="text" placeholder="Search...">
			<button class="newsfeed-page-button">Go</button>
		</div>
	  </div>
	  <div class="lighter-red-row">
		<p><b>Your hatescriptions: </b></p>
	  </div>

	  <div class="scroll-box">
		<?php $user_subscriptions = $data['user_subscriptions'];
		 foreach ($user_subscriptions as $subscription) {
    		echo '<button class="hatescribed-item">' . $subscription. '</button>';
		}?>
	  </div>
</div>
	<div class="container margin">
			<div class="entry">
				<div class="entry-image">
					<img src="<?php echo ROOT ?>/poze/kfc.png" alt="entry image">
				</div>
				<div class="entry-content">
					<h2>KFC Iasi</h2>
					<img src="<?php echo ROOT ?>/poze/Swearing.png" alt="review icon">
					<p class="rating">-4.5/-5 Absolutely desipciable</p>
					<p class="comment"><b>Top Comment: </b> If someone points a gun at you and says: "Eat at KFC Iasi or I'll shoot you!" - just take the bullet. You have better odds of survival!</p>
					<p>Tags: </p>
					<div class="tags">
						<button>Tag 1</button>
						<button>Tag 2</button>
						<button>Tag 3</button>
						<button>Tag 4</button>
						<button>Tag 5</button>
					</div>
					<p>Location: </p>
					<div class="tags">
						<button>Romania</button>
						<button>Iasi</button>
					</div>
					<button class="view-ratings"> <a href="Reviews">View Ratings</button>
					<button class="add-rating">Add Rating</button>
				</div>
			</div>
			<!-- add more entries here -->
			<div class="entry">
				<div class="entry-image">
					<img src="<?php echo ROOT ?>/poze/mcdonalds.png" alt="entry image">
				</div>
				<div class="entry-content">
					<h2>Mcdonalds Iasi</h2>
					<img src="<?php echo ROOT ?>/poze/Mad.png" alt="review icon">
					<p class="rating">-3.5/-5 It's pain</p>
					<p class="comment"><b>Top Comment: </b>I would sooner lick a dirty boot than eat here again!</p>
					<p>Tags: </p>
					<div class="tags">
						<button>Tag 1</button>
						<button>Tag 2</button>
						<button>Tag 3</button>
						<button>Tag 4</button>
						<button>Tag 5</button>
					</div>
					<p>Location: </p>
					<div class="tags">
						<button>Romania</button>
						<button>Iasi</button>
					</div>
					<button class="view-ratings">View Ratings</button>
					<button class="add-rating">Add Rating</button>
				</div>
			</div>

			<div class="entry">
				<div class="entry-image">
					<img src="<?php echo ROOT ?>/poze/tacobell.png" alt="entry image">
				</div>
				<div class="entry-content">
					<h2>Taco bell Iasi</h2>
					<img src="<?php echo ROOT ?>/poze/Angry.png" alt="review icon">
					<p class="rating">-1.5/-5 Pretty annoying</p>
					<p class="comment"><b>Top Comment: </b>Eat here at your own peril</p>
					<p>Tags: </p>
					<div class="tags">
						<button>Tag 1</button>
						<button>Tag 2</button>
						<button>Tag 3</button>
						<button>Tag 4</button>
						<button>Tag 5</button>
					</div>
					<p>Location: </p>
					<div class="tags">
						<button>Romania</button>
						<button>Iasi</button>
					</div>
					<button class="view-ratings">View Ratings</button>
					<button class="add-rating">Add Rating</button>
				</div>
			</div>

	</div>
	<script src="newsfeed.js"></script>
</body>
</html>


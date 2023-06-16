<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Reviews</title>
		<link rel="stylesheet" href="<?php echo ROOT ?>/css/reviews.css">
	</head>
<body>
<div id="navbar">
    <div class="red-bar">
		<h1><b>Thanks, I hate it!</b></h1>
		<p>logged in as: AdiBerco</p>
	  </div>
	  
	  <div class="lighter-red-row">
		<p><b><?php echo $data['selected_item_name']?></b></p>
	  </div>
	  <div class="lighter-red-row">
		<p><b>Average rating <?php echo $data['average_review_value']?></b></p>
	  </div>
	  <div class="lighter-red-row">
		<p><b>" <?php echo $data['most_liked_review_description']?>"</b></p>
	  </div>
	  <div class="lighter-red-row">
		<p><b>Most popular tags:</b></p>
		<?php $top_tags = $data['top_tags'];
		foreach ($top_tags as $tag)
		{
			echo '<button class="newsfeed-page-button">'.$tag.'</button>';
		}?>

	  </div>
	  <div class="lighter-red-row">
		<p><b>Location</b></p><button class="newsfeed-page-button"><?php echo $data['location_tag']?></button>
	  </div>
	  <!--<div class="lighter-red-row">
		 <p><b>Sort reviews by:	</b></p>
		<select class="sort-by">
			<option value="date">Date</option>
			<option value="likes">Most useful</option>
		</select>
	  </div> -->
	  <div class="lighter-red-row">
		<p><b>You hate this place too? Tell the workd about! </b></p>
		<button class="newsfeed-page-button">I hate this thing!</button>
	  </div>
</div>
	<div class="container margin">

		<?php $all_reviews = $data['selected_item_reviews'];
		
			for ($i = 0; $i < count($all_reviews); $i++)
			{
				$emoji_path = get_emoji_path_from_score($all_reviews[$i][4]);

				$is_liked = "Like!";

				if ($data['user_has_liked_review'][$i] == 1)
					$is_liked = "Un-Like!";

				echo '		
				<div class="review">
					<div class="entry-image">
						<img src="<?php echo ROOT ?>/poze/poorlymadechicken.png" alt="entry image">
					</div>
					<div>
						<h3>Date:'.$all_reviews[$i][1].' by <b>'.$data['review_authors'][$i].'</b></h3>
						<img src="'.$emoji_path.'" alt="review icon">
						<p><b>'.$all_reviews[$i][4].' / -5</b></p>
						<p><b>'.$all_reviews[$i][5].'</b></p>
						<p>'.$data['like_count'][$i].' people found this review useful
						<button class="newsfeed-page-button">'.$is_liked.'</button></p>
					</div>
				</div>';
			}

		?>

	</div>
</body>
</html>


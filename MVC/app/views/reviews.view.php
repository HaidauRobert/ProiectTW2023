<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Reviews</title>
		<link rel="stylesheet" href="<?php echo ROOT ?>/css/reviews.css">
	</head>
<body>
<nav>
        <div class="logo">
            <a href="home">
                <img src="<?php echo ROOT ?>/poze/logo.png" alt="Logo">
            </a>
        </div>
        <div class="nav-buttons">
            <ul>
              <li><a href="home">Home</a></li>
                <li><a href="myprofile">My Profile</a></li>
                <?php if (!empty($data['admin'])): ?>
                <li><a href="admin">Admin Panel</a></li>
                <?php endif; ?>
                <li><a href="newsfeed">Newsfeed</a></li>
				<li><a href="logout">Logout</a></li>
            </ul>
        </div>
  </nav>
<div id="navbar">
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
			echo '<form method="post"><button class="newsfeed-page-button" type="submit" name="go_to_hatescription" value="'.$tag.'">'.$tag.'</button></form>';
		}?>

	  </div>
	  <div class="lighter-red-row">
		<p><b>Location</b></p> <?php $location = $data['location_tag']; echo '<form method="post"><button class="newsfeed-page-button" type="submit" name="go_to_hatescription" value="'.$location.'">'.$location.'</button></form>';?>
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
				$like_unlike_post = 'like';

				if ($data['user_has_liked_review'][$i] == 1)
				{
					$is_liked = "Un-Like!";
					$like_unlike_post = 'unlike';
				}

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
						<form method="post"><button class="newsfeed-page-button type="submit" name="'.$like_unlike_post.'" value="'.$all_reviews[$i][0].'">'.$is_liked.'</button></form></p>
					</div>
				</div>';
			}

		?>

	</div>
</body>
</html>


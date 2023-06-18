<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Newsfeed</title>
		<link rel="stylesheet" href="<?php echo ROOT ?>/css/newsfeed.css">
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
		<p><b>Category: <?php echo $data['selected_category_name']?></b></p>
		<?php
		if ($data['user_is_subbed'] == 1)
			echo '<form method="post"><button class="newsfeed-page-button type="submit" name="unsubscribe" value="'.$data['selected_category_name'].'">Un-subscribe!</button></form>';
		else
			echo '<form method="post"><button class="newsfeed-page-button type="submit" name="subscribe" value="'.$data['selected_category_name'].'">Subscribe!</button></form>'?>
	  </div>
	  <div class="lighter-red-row">
		<p><b>All categories:	</b></p>
		<form method="post">
			<select class="sort-by" name="go_to_class" onchange="this.form.submit()">
				<option value="-1">-</option>;
				<?php 
				foreach ($data['all_classes'] as $cl)
					echo '<option value="'.$cl[0].'">'.$cl[1].'</option>'?>
			</select>
			<noscript>
				<input type="submit" value="Submit">
			</noscript>
		</form>
	  </div>
	  <div class="lighter-red-row">
		<p><b>Your hatescriptions: </b></p>
	  </div>

	  <div class="scroll-box">
	  
		<?php $user_subscriptions = $data['user_subscriptions'];
		 foreach ($user_subscriptions as $subscription) {
    		echo '<form method="post">
			<button class="hatescribed-item" type="submit" name="go_to_hatescription" value="'.$subscription.'">' . $subscription. '</button></form>';
		}?>
	  </div>
</div>
	<div class="container margin">
			<?php $items_from_selected_class = $data['items_from_selected_class'];
				$photo = $data['most_liked_review'];

			for ($i = 0; $i < count($items_from_selected_class); $i++)
			{
				$item_average_rating =  get_average_review_comment($data['average_rating'][$i])." (".$data['item_total_reviews'][$i]." reviews)";
				$emoji_path = get_emoji_path_from_score(round($data['average_rating'][$i]));
				$i_top_classes = $data['top_classes'][$i];
				echo 			
				'<div class="entry">
					<div class="entry-image">
					<img src="'.ROOT.'/poze/'.$photo[$i][11].'" alt="entry image">
					</div>
					<div class="entry-content">
						<h2>'.$items_from_selected_class[$i][1].'</h2>
						<img src="'.$emoji_path.'" alt="review icon">
						<p class="rating">'.$item_average_rating.'</p>
						<p class="comment"><b>Top Comment: </b>'.$data['most_liked_review'][$i][5].'</p>
						<p>Tags: </p>
						<div class="tags">';

						foreach ($i_top_classes as $tag)
							echo '<form method="post"><button type="submit" name="go_to_hatescription" value= "'.$tag.'">'.$tag."</button></form>";

						echo '</div>
						<p>Location: </p>
						<div class="tags">
							<form method="post"><button type="submit" name="go_to_hatescription" value= "'.$data['locations'][$i].'">'.$data['locations'][$i].'</button></form>
						</div>
						<form method="post"><button class="view-ratings" name="view_ratings" value= "'.$items_from_selected_class[$i][0].'"> View Ratings</button></form>
						<form action="../public/newpost" method="post">
							<input type="hidden" name="preset_name" value="'.$items_from_selected_class[$i][1].'">
							<input type="hidden" name="preset_location" value="'.$data['locations'][$i].'">
							<button type="submit" class="add-rating">Add Rating</button>
						</form>
					</div>
				</div>';
			}

			?>

	</div>
	<script src="newsfeed.js"></script>
</body>
</html>


<?php

require_once __DIR__ . '/../models/ReviewsModel.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

class Reviews extends Controller {
    public function index() {
        echo "This is the controller of the Reviews page.";

        $model = new ReviewsModel();

        $data = array();

        $userId = $_SESSION['userid'];

        check_login($model->connection);
        if ($model->isAdmin($userId))
            $data['admin'] = true;

        
        if (isset($_SESSION['selected_item_id']))
        {
            $selected_item_id = $_SESSION['selected_item_id'];
        }
        else
        {
            $selected_item_id = $model->get_all_items()[0][0];
        }

        $selected_item_reviews = $model->get_all_item_reviews($selected_item_id);

        $like_count = array();

        $review_authors = array();

        $user_has_liked_review = array();

        for ($i = 0; $i < count($selected_item_reviews); $i++)
        {
            $like_count[$i] = $model->get_review_like_count($selected_item_reviews[$i][0]);
            $user_has_liked_review[$i] = $model->get_review_is_liked_by_user($selected_item_reviews[$i][0], $userId);
            $review_authors[$i] = $model->get_user_name_from_id($selected_item_reviews[$i][2]);
        }

        $item_row =  $model->get_item_from_id($selected_item_id);

        $top_tags = array();

        for ($i = 2; $i <= 6; $i++)
        {
            if ($item_row[$i] != -1)
            {
                $top_tags[$i] = $model->get_class_name_from_id($item_row[$i]);
            }
        }

        $most_liked = $model->get_most_liked_review_of_item($selected_item_id);

        $data['selected_item_name'] = $item_row[1];

        $data['selected_item_reviews'] = $selected_item_reviews;

        $data['review_authors'] = $review_authors;

        $data['top_tags'] = $top_tags;

        $data['location_tag'] = $model->get_class_name_from_id($item_row[7]);

        $data['like_count'] = $like_count;

        $data['user_has_liked_review'] = $user_has_liked_review;

        $data['most_liked_review_description'] = $most_liked[5];

        $data['average_review_value'] = $model->get_average_item_score($selected_item_id);

        if ($_SERVER['REQUEST_METHOD']=="POST")
        {
            if (isset($_POST['like'])) 
            {
                $review_id = $_POST['like'];
                $model->like_review($userId, $review_id);

                header("Location: http://localhost/ProiectTW2023/MVC/public/reviews");
            }

            if (isset($_POST['unlike'])) 
            {
                $review_id = $_POST['unlike'];
                $model->unlike_review($userId, $review_id);
                header("Location: http://localhost/ProiectTW2023/MVC/public/reviews");
            }

            if (isset($_POST['go_to_hatescription'])) {
                $pressedButton = $_POST['go_to_hatescription'];
                $_SESSION['selected_class'] = $model->get_class_id_by_name($pressedButton);

                header("Location: http://localhost/ProiectTW2023/MVC/public/newsfeed");
            }
        }

        $this->view('reviews', $data);
    }
}
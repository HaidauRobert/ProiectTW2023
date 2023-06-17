<?php

require_once __DIR__ . '/../models/NewsfeedModel.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

class Newsfeed extends Controller {
    public function index() {
        echo "This is the controller of the NewsFeed page.";

        $data = array();

        $model = new NewsfeedModel();

        $userId = $_SESSION['userid'];

        $selected_class = 19;

        check_login($model->connection);

        $user_subscriptions = $model->get_user_subscriptions($userId);#indexies of classes a user has subscribed to

        $subscriptions_class_names = array();

        foreach ($user_subscriptions as $subscription_index)
        {
            $subscriptions_class_names[$subscription_index[1]] = $model->get_class_name_by_id($subscription_index[1]);
        }

        sort($subscriptions_class_names);

        $data['user_subscriptions'] = $subscriptions_class_names;#the names of the classes subscribed

        $class_items = $model->get_items_of_class($selected_class);

        $data['items_from_selected_class'] = $class_items;

        $average_rating = array();

        for ($i = 0; $i < count($class_items); $i++)
        {
            $average_rating[$i] = $model->get_average_item_score($class_items[$i][0]);
        }

        $data['average_rating'] = $average_rating;

        $top_classes = array();

        $locations = array();

        for ($i = 0; $i < count($class_items); $i++)
        {
            $i_top_class = array();

            for ($j = 2; $j <= 6; $j++)
            {
                if ($class_items[$i][$j] != -1)
                {
                    $i_top_class[count($i_top_class)] = $model->get_class_name_from_id($class_items[$i][$j]);
                }
            }

            $top_classes[count($top_classes)] = $i_top_class;

            $locations[$i] = $model->get_class_name_from_id($class_items[$i][7]);
        }

        $data['top_classes'] = $top_classes;

        $data['locations'] = $locations;

        $most_liked_review = array();

        for ($i = 0; $i < count($class_items); $i++)
        {
            $most_liked_review[$i] = $model->get_most_liked_review_of_item($class_items[$i][0]);
        }

        $item_total_reviews = array();

        for ($i = 0; $i < count($class_items); $i++)
        {
            $item_total_reviews[$i] = $model->get_item_total_reviews($class_items[$i][0]);
        }

        $data['most_liked_review'] = $most_liked_review;

        $data['selected_category_name'] = $model->get_class_name_from_id($selected_class);

        $data['item_total_reviews'] = $item_total_reviews;

        $data['user_is_subbed'] = $model->get_user_is_subscribed_to_class($userId, $selected_class);

        $this->view('newsfeed', $data);
    }
}
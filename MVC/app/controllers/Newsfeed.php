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
        check_login($model->connection);
        if ($model->isAdmin($userId))
            $data['admin'] = true;
        $user_subscriptions = $model->get_user_subscriptions($userId);#indexies of classes a user has subscribed to

        $subscriptions_class_names = array();

        foreach ($user_subscriptions as $subscription_index)
        {
            $subscriptions_class_names[$subscription_index[1]] = $model->get_class_name_by_id($subscription_index[1]);
        }

        sort($subscriptions_class_names);

        $data['user_subscriptions'] = $subscriptions_class_names;#the names of the classes subscribed

        $data['newsfeed_posts'] = $model->get_newsfeed_entries($userId);

        $this->view('newsfeed', $data);
    }
}
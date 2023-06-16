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

        $data['user_subscriptions'] = $model->get_user_subscriptions($userId);

        $data['newsfeed_posts'] = $model->get_newsfeed_entries($userId);

        $this->view('newsfeed');
    }
}
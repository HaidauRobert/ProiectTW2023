<?php

class Newsfeed extends Controller {
    public function index() {
        echo "This is the controller of the NewsFeed page.";

        $con = get_connection();
        if(check_login($con) == 'Failed') {
            $this->view('login');
        }
        else {
            $this->view('newsfeed');
        }
    }
}
<?php

class Newsfeed extends Controller {
    public function index() {
        echo "This is the controller of the NewsFeed page.";

        $m = new Model;
        if(check_login($m->connection) == 'Failed') {
            $this->view('login');
        }
        else {
            $this->view('newsfeed');
        }
    }
}
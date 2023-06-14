<?php

class Reviews extends Controller {
    public function index() {
        echo "This is the controller of the Reviews page.";

        $con = get_connection();
        if(check_login($con) == 'Failed') {
            $this->view('login');
        }
        else {
            $this->view('reviews');
        }
    }
}
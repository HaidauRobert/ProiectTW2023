<?php

require_once __DIR__ . '/../models/NewPostModel.php';

class Newpost extends Controller {
    public function index() {
        echo "This is the controller of the New Post page.";

        $newPostModel = new NewPostModel();
        if(check_login($newPostModel->connection) == 'Failed') {
            $this->view('login');
        }
        else {
            $data = array();
            $message = array();
            if ($_SERVER['REQUEST_METHOD']=="POST")
            {
                $nume = $_POST['nume-obiect'];
                if(empty($_POST['picture'])){
                    $message['message'] = "Selecteaza cat a fost de rau.";
                    header("Location: http://localhost/ProiectTW2023/MVC/public/newpost");
                }
                else {
                $annoyanceLevel = $_POST['picture']; }
                $descriere = $_POST['descriere-obiect'];
                $tags = $_POST['choice'];
                $locations = $_POST['choice2'];
                $picture = $_POST['post-picture'];
                array_push($data, $nume, $annoyanceLevel, $descriere, $tags, $locations, $picture);
                print_r($data);

                // if(empty($annoyanceLevel)){
                //     $message['message'] = "Selecteaza cat a fost de rau.";
                // }
                // else if(empty($locations)) {
                //         $message['message'] = "Selecteaza unde s-a intamplat";
                // }
            }

            $this->view('newpost', $message);
        }
    }
}
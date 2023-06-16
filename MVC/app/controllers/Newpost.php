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
            $all_tags = $newPostModel->getClasses();
            $all_locations = $newPostModel->getLocations();
            $data = array();
            $data['all_tags'] = $all_tags;
            $data['all_locations'] = $all_locations;

            if ($_SERVER['REQUEST_METHOD']=="POST")
            {
                $nume = $_POST['nume-obiect'];
                if(empty($_POST['picture'])){
                    $data['emoji'] = "Selecteaza cat a fost de rau.";
                    $this->view('newpost', $data);
                    die("");
                }
                if(empty($_POST['choice'])){
                    $data['tags'] = "Selecteaza cel putin un tag.";
                    $this->view('newpost', $data);
                    die("");
                }
                if(empty($_POST['choice2'])){
                    $data['location'] = "Selecteaza cel putin o locatie.";
                    $this->view('newpost', $data);
                    die("");
                }
                $annoyanceLevel = $_POST['picture']; 
                $descriere = $_POST['descriere-obiect'];
                $tags_clicked = $_POST['choice'];
                $locations = $_POST['choice2'];          

                if (isset($_FILES['post-picture'])) {
                    $image = time() . '_' . $_FILES['post-picture']['name'];
                    $target = __DIR__ . '/../../public/poze/' . $image;
        
                    move_uploaded_file($_FILES['post-picture']['tmp_name'], $target);
                }
                else {
                    die();
                }

                $curr_date = date("Y-m-d");
                $item_id = $newPostModel->getItem($nume);
                for($i = 0; $i < count($tags_clicked); $i ++) {
                    $tag_id = $newPostModel->getClassId($tags_clicked[$i]);
                    $tags_clicked[$i] = $tag_id["class_id"];
                }

                $newPostModel->postReview($curr_date, $_SESSION['userid'], $item_id["item_id"], $annoyanceLevel, $descriere, $tags_clicked, $image);
            }

            $this->view('newpost', $data);
        }
    }
}
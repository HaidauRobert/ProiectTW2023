<?php

require_once __DIR__ . '/../models/NewPostModel.php';

class Newpost extends Controller {
    
    public function getTop5Tags($tags_array) {
        $number_of_tags = array();

        foreach($tags_array as $tags_row) {
            foreach($tags_row as $tag) {
                if(isset($number_of_tags[$tag])) {
                    $number_of_tags[$tag] ++;
                }
                else {
                    $number_of_tags[$tag] = 1;
                }
            }
        }

        arsort($number_of_tags);
        $top6Tags = array_slice(array_keys($number_of_tags), 0, 6);

        if($top6Tags[5] != -1) {
            foreach($top6Tags as &$tag) {
                if($tag == -1) {
                    $tag = $top6Tags[5];
                }
            }
        }
        unset($tag);

        $top5Tags = array_slice($top6Tags, 0, 5);
        return $top5Tags;
    }

    public function index() {

        ini_set('display_errors', 1);
        error_reporting(E_ALL);

        echo "This is the controller of the New Post page.";

        $newPostModel = new NewPostModel();
        check_login($newPostModel->connection) ;
        $userId = $_SESSION['userid'];
        if ($newPostModel->isAdmin($userId))
            $data['admin'] = true;
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
                $location_name = $_POST['choice2'];
                $location = $newPostModel->getLocationClassId($location_name[0]);

                if (isset($_FILES['post-picture'])) {
                    $image = time() . '_' . $_FILES['post-picture']['name'];
                    $target = __DIR__ . '/../../public/poze/' . $image;
        
                    move_uploaded_file($_FILES['post-picture']['tmp_name'], $target);
                }
                else {
                    die();
                }

                $curr_date = date("Y-m-d");
            
                $item_id_array = $newPostModel->getItemId($nume);

                for($i = 0; $i < count($tags_clicked); $i ++) {
                    $tag_id = $newPostModel->getClassId($tags_clicked[$i]);
                    $tags_clicked[$i] = $tag_id["class_id"];
                }

                $item_id_final;
                if($item_id_array) {
                    $check = 0;
                    foreach($item_id_array as $item_id) {
                        $db_location = $newPostModel->getLocationByID($item_id);

                        if($location["location_id"] == $db_location["location_class_id"]) {

                            $all_tags_array = $newPostModel->getTagsItem($item_id);
                            array_push($all_tags_array, $tags_clicked);

                            $top5Tags = $this->getTop5Tags($all_tags_array);

                            $newPostModel->updateItem($item_id, $top5Tags);
                            $item_id_final = $item_id;
                            $check = 1;
                        }
                    }
                    if($check == 0) {
                        $newPostModel->postItem($nume, $tags_clicked, $location);
                        $item_id_final_array = $newPostModel->getItemIdLoc($nume, $location);
                        $item_id_final = $item_id_final_array[0];
                    }
                }
                else {
                    $newPostModel->postItem($nume, $tags_clicked, $location);
                    $item_id_final_array = $newPostModel->getItemIdLoc($nume, $location);
                    $item_id_final = $item_id_final_array[0];
                }

                print_r($item_id_final);
                $newPostModel->postReview($curr_date, $_SESSION['userid'], $item_id_final, $annoyanceLevel, $descriere, $tags_clicked, $image);
            }

            $this->view('newpost', $data);
        }
    }
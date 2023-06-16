<?php
require_once __DIR__ . '/../models/MyProfileModel.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
class Myprofile extends Controller {
    public function index() {
        echo "This is the controller of the My Profile page.";

        $model = new Model();
        check_login($model->connection); 
        $MyProfileModel = new MyProfileModel();
        $data = array();
        $userId = $_SESSION['userid'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
            $image = time() . '_' . $_FILES['image']['name'];
            $target = __DIR__ . '/../../public/poze/' . $image;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                // Image uploaded successfully
                $MyProfileModel->updateProfilePicture($userId, $image);
                $msg = "Image uploaded and saved to the database";
            } else {
                // Image upload failed
                $msg = "Failed to upload image";
            }
        }

        $profilePicture = $MyProfileModel->getProfilePicture($userId);
        if ($profilePicture) {
            $data['profilePicture'] = $profilePicture;
        }

        $this->view('myprofile', $data);
    }

}
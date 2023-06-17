<?php
require_once __DIR__ . '/../models/HomeModel.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);
class Home extends Controller {
    public function index() {
        $model = new Model();
        $data = array();
        $homeModel = new HomeModel();
        $userId = $_SESSION['userid'];
        if ($model->isAdmin($userId))
            $data['admin'] = true;
        check_login($model->connection);
        $profilePicture = $homeModel->getProfilePicture($userId);
        if ($profilePicture) {
            $data['profilePicture'] = $profilePicture;
        }
        $name = $homeModel->getUserName($userId);
        if ($name) {
            $data['name'] = $name;
        }
        
        $this->view('home', $data);
        
    }
}
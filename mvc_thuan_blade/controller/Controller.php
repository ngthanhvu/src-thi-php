<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\Model;
use App\Core\BladeServiceProvider;

class Controller
{

    private $userModel;
    private $model;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->model = new Model();
    }

    public function index()
    {
        $title = "Trang chủ";
        $shops = $this->model->getShop();
        BladeServiceProvider::render('index', compact('title', 'shops'));
    }

    public function filter()
    {
        $title = "Lọc cửa hàng";
        $search = $_GET['search'] ?? '';
        $area = $_GET['area'] ?? '';
        $sort = $_GET['sort'] ?? 'id';
        $shops = $this->model->getFilteredShops($search, $area, $sort);
        BladeServiceProvider::render('index', compact('title', 'shops', 'search', 'area', 'sort'));
    }

    public function admin()
    {
        $title = "Trang chủ";
        $shops = $this->model->getShop();
        BladeServiceProvider::render('admin.index', compact('title', 'shops'));
    }

    public function login()
    {
        $title = "Đăng nhập";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];
            $username = $_POST['username'];
            $password = $_POST['password'];

            if (empty($username)) {
                $errors['username'] = 'Vui lòng nhập tên đăng nhập.';
            }

            if (empty($password)) {
                $errors['password'] = 'Vui lòng nhập mật khẩu.';
            }

            if (empty($errors)) {
                $users = $this->userModel->login($username, $password);
                $_SESSION['user'] = $users;
                header("Location: /admin");
            } else {
                BladeServiceProvider::render('admin.login', compact('title', 'errors'));
            }
        } else {
            BladeServiceProvider::render('admin.login', compact('title'));
        }
    }

    public function createShop()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $open_time = $_POST['open_time'];
            $vehical_type = $_POST['vehical_type'];

            if (empty($name)) {
                $errors['name'] = 'Vui lòng nhập tên cửa hàng.';
            }
            if (empty($phone)) {
                $errors['phone'] = 'Vui lòng nhập số điện thoại.';
            }
            if (empty($address)) {
                $errors['address'] = 'Vui lòng nhập địa chỉ.';
            }
            if (empty($open_time)) {
                $errors['open_time'] = 'Vui lòng nhập giờ mở cửa.';
            }
            if (empty($vehical_type)) {
                $errors['vehical_type'] = 'Vui lòng nhập loại xe.';
            }
            if (empty($errors)) {
                $this->model->create($name, $address, $open_time, $vehical_type, $phone);
                header("Location: /admin");
            } else {
                BladeServiceProvider::render('admin.manage.create', compact('errors'));
            }
        } else {
            BladeServiceProvider::render('admin.manage.create');
        }
    }

    public function updateShop($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = [];
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $address = $_POST['address'];
            $open_time = $_POST['open_time'];
            $vehical_type = $_POST['vehical_type'];

            if (empty($name)) {
                $errors['name'] = 'Vui lòng nhập tên cửa hàng.';
            }
            if (empty($phone)) {
                $errors['phone'] = 'Vui lòng nhập số điện thoại.';
            }
            if (empty($address)) {
                $errors['address'] = 'Vui lòng nhập địa chỉ.';
            }
            if (empty($open_time)) {
                $errors['open_time'] = 'Vui lòng nhập giờ mở cửa.';
            }
            if (empty($vehical_type)) {
                $errors['vehical_type'] = 'Vui lòng nhập loại xe.';
            }
            if (empty($errors)) {
                $this->model->update($id, $name, $address, $open_time, $vehical_type, $phone);
                header("Location: /admin");
            } else {
                $shop = $this->model->getShopById($id);
                BladeServiceProvider::render('admin.manage.update', compact('shop', 'errors'));
            }
        } else {
            $shop = $this->model->getShopById($id);
            BladeServiceProvider::render('admin.manage.update', compact('shop'));
        }
    }

    public function deleteShop($id)
    {
        $this->model->delete($id);
        header("Location: /admin");
    }
}

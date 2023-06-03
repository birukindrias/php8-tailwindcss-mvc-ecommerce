<?php

namespace App\App\Http\Controllers;

use App\App\models\Users;
use App\config\App;
use App\config\Controller;

class AuthController extends Controller
{

    public function index()
    {
        return $this->render('home', 'home');
    }
    public function registerapi()
    {
        $users = new Users();

        if (App::$app->request->is_post()) {
            $data = json_decode(file_get_contents('php://input'), true);
            $users->loadData($data);

            if ($users->validate() && $users->save()) {
                $id = $users->get(['phoneNumber' => $data['phoneNumber'], 'password' => $data['password']])[0]['id'];
                // App::$app->session->setItem('id', $id);
                // App::$app->session->setFlash('success', 'Thanks for registering');
                 $response = [
                    'success' => true,
                    'message' => 'Registration successful',
                    'redirect' => '/home'
                ];
            } else {
                $errors = '$users->getErrors()';
                $response = [
                    'success' => false,
                    'message' => 'Registration failed',
                    'errors' => $errors
                ];
            }

            header('Content-Type: application/json');
            echo json_encode($response);
            return;
        }

        // return $this->render('pages/Auth/register', 'mvc | Register');
    }

    public function register()
    {


        $users = new Users();
        if (App::$app->request->is_post()) {
            $data = App::$app->request->reqData();
            $users->loadData($data);
            if ($users->validate() && $users->save()) {
                $id =  $users->get(['email' => $data['email'], 'password' => $data['password']])[0]['id'];
                App::$app->session->setItem('id', $id);
                App::$app->session->setFlash('success', 'Thanks for registering');
                return   App::$app->response->redirect('/home');
            }
        }
        return  $this->render('pages/Auth/register', 'mvc | Register');
    }
    public function login()
    {
        $users = new Users();
        if (App::$app->request->is_post()) {
            $data = App::$app->request->reqData();
            $id =  $users->get(['email' => $data['email'], 'password' => $data['password']])[0]['id'];
            if ($id) {
                App::$app->session->setItem('id', $id);
                $users->uploadFile();
                return App::$app->response->redirect('/home');
            } else {
                echo 'email or password is wrong!';
            }
        }
        return  $this->render('pages/Auth/login', 'mvc | Login');
    }
    public function logOut()
    {
        session_unset();
        return
            App::$app->response->redirect('/login');
    }
}

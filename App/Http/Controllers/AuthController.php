<?php

namespace App\App\Http\Controllers;

use App\App\models\Admins;
use App\App\models\Mnger;
use App\App\models\Users;
use App\config\App;
use App\config\Controller;

class AuthController extends Controller
{

    public function index()
    {

        return $this->render('home', 'home');
    }
    public function save_winner()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        header('Content-Type: application/json');
        echo json_encode($data);
        echo json_encode([$data]);
    }
    public function registerapi()
    {

        if (App::$app->request->is_post()) {
            $data = json_decode(file_get_contents('php://input'), true);
            // unsez   
            switch ($data['type']) {
                case 'users':
                    $users =
                        new Users();

                    $users->loadData($data);
                    if ($users->validate() && $users->save()) {
                        $id = $users->get(['phoneNumber' => $data['phoneNumber'], 'password' => $data['password']])[0]['id'];
                        // App::$app->session->setItem('id', $id);
                        // App::$app->session->setFlash('success', 'Thanks for registering');
                        $response = [
                            'id' =>
                            $id,
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
                    break;

                case 'admin':
                    $users =
                        new Admins();

                    $users->loadData($data);
                    if ($users->validate() && $users->save()) {
                        $id = $users->get(['phoneNumber' => $data['phoneNumber'], 'password' => $data['password']])[0]['id'];
                        // App::$app->session->setItem('id', $id);
                        // App::$app->session->setFlash('success', 'Thanks for registering');
                        $response = [
                            'id' =>
                            $id,
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
                    break;

                case 'mngr':
                    $users =
                        new Mnger();

                    $users->loadData($data);
                    if ($users->validate() && $users->save()) {
                        $id = $users->get(['phoneNumber' => $data['phoneNumber'], 'password' => $data['password']])[0]['id'];
                        // App::$app->session->setItem('id', $id);
                        // App::$app->session->setFlash('success', 'Thanks for registering');
                        $response = [
                            'id' =>
                            $id,
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
                    break;

                default:
                    # code...
                    break;
            }
        }

        // return $this->render('pages/Auth/register', 'mvc | Register');
    }

    public function register()
    {


        $users = new Users();
        if (App::$app->request->is_post()) {
            $data = App::$app->request->reqData();
            // $data['balance'] = 0;
            $users->loadData($data);
            var_dump('da');

            if ($users->validate() && $users->save()) {
                $id =  $users->get(['phonenumber' => $data['phonenumber'], 'password' => $data['password']])[0]['uid'];
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

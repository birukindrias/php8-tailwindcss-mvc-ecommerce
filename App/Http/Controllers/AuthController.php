<?php

namespace App\App\Http\Controllers;

use App\App\models\Admins;
use App\App\models\Mnger;
use App\App\models\Users;
use App\App\models\Game;
use App\App\models\Gusers;
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
        //         $win = $request->input('win');
        //   $room = $request->input('room');

        // This line is causing the error
        //   $header = $request->header('Content-Type');
        // var_dump ($data);
        // header('Content-Type: application/json');
        $all = $data['win'];

        // echo json_encode($data['win']);
        // return json_encode($all );
        $game = new Game();
        $game->loadData(['game' => $data['win'] . '|' . $data['room']]);
        $game->save();
        $tharrray = [];
        foreach ($game->getAll() as $key => $value) {
            $tharrray[] =  $value['game'];
        }
        // var_dump($tharrray);
        // $last_two_values = array_slice($tharrray    , -2);
        // Print the last two values.
        // echo implode(', ', $last_two_values);
        // // $game->getAll();
        // var_dump(implode(', ', $last_two_values));
        // var_dump($last_two_values);
        // var_dump(implode(', ', $tharrray()));
        echo json_encode(['pr_win' => $tharrray[2][0] . $tharrray[2][1] . ',' . $tharrray[1][0] . $tharrray[1][1]]);
        // var_dump($tharrray);

        exit;
        var_dump($all);
        var_dump($data['room']);
        // exit;
        $sq = "INSERT INTO game(game) VALUES($data)";
        $stmt = App::$app->database->pdo->prepare($sq);
        $stmt->execute();
        $gamesw = "SELECT * FROM game";
        $stmt = App::$app->database->pdo->prepare($gamesw);
        $stmt->execute();
        echo json_encode([$data]);
    }
    public function registerapi()
    {
        $users =
            new Users();

        if (App::$app->request->is_post()) {
            $data = json_decode(file_get_contents('php://input'), true);
            //    unset ($data['paymentmethod']) ;
            //    var_dump cu/
            // var_dump ($data );
            // var_dump ($data['password'] );
            // var_dump ($data['p/honeNumber'] );
            $users->loadData($data);
            if ($users->save()) {

                $id = $users->get(['phoneNumber' => $data['phoneNumber'], 'password' => $data['password']])[0]['id'];
                $username = $users->get(['phoneNumber' => $data['phoneNumber'], 'password' => $data['password']])[0]['username'];
                // App::$app->session->setItem('id', $id);
                // App::$app->session->setFlash('success', 'Thanks for registering');
                $response = [
                    'id' =>
                    $id,
                    'username' =>
                    $username,
                    'success' => true,
                    'message' => 'Registration successful',
                    'redirect' => '/home'
                ];

                // header('Content-Type: application/json');
                // echo json_encode($response);
            } else {
                $errors = '$users->getErrors()';
                $response = [
                    'success' => false,
                    'message' => 'Registration failed',
                    'errors' => $errors
                ];
            }  // unsez   

            header('Content-Type: application/json');
            echo json_encode($response);
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


        $users = new Gusers();
        if (App::$app->request->is_post()) {
            $data = App::$app->request->reqData();
            // $data['balance'] = 0;
            $users->loadData($data);

            // var_dump($data);
            var_dump($data['phonenumber']);
            // exit;
            if ($users->save()) {
                $id =  $users->get(['phonenumber' => $data['phonenumber'], 'password' => $data['password']])[0]['id'];
                var_dump('asdfdasfsdaf');
                var_dump($id);
                if (App::$app->session->setItem('id', $id)) {
                    echo 'asdfa';

                    # code...
                };
                var_dump(App::$app->session->getItem('id'));
                // exit;
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
            $id =  $users->get(['phoneNumber' => $data['phoneNumber'], 'password' => $data['password']])[0]['id'];
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
    public function loginapi()
    {
        $users = new Users();
        if (App::$app->request->is_post()) {
            $data = json_decode(file_get_contents('php://input'), true);

            $id = $users->get(['phoneNumber' => $data['username'], 'password' => $data['password']])[0]['id'];
            // App::$app->session->setItem('id', $id);
            // App::$app->session->setFlash('success', 'Thanks for registering');
            $response = [
                'id' =>
                $id,
                'success' => true,
                'message' => 'Registration successful',
                'redirect' => '/home'
            ];

            // header('Content-Type: application/json');
            // echo json_encode($response);
        } else {
            $errors = '$users->getErrors()';
            $response = [
                'success' => false,
                'message' => 'Registration failed',
                'errors' => $errors
            ];
        }  // unsez   

        header('Content-Type: application/json');
        echo json_encode($response);
        // return  $this->render('pages/Auth/login', 'mvc | Login');
    }
    public function logOut()
    {
        session_unset();
        return
            App::$app->response->redirect('/login');
    }
}

<?php

namespace App\App\Http\Controllers;

use App\App\models\Cart;
use App\App\models\Gusers;
use App\App\models\Order;
use App\App\models\Product;
use App\App\models\Users;
use App\config\App;
use App\config\Controller as ConfigController;
use products;

class Controller extends ConfigController
{

  public function index()
  {
    $products = new Product();
    $cart = new Cart();
    return $this->render('home', 'Home', ['products' => $products->getAll()]);
  }
  public function play()
  {
    $products = new Product();
    $cart = new Cart();
    return $this->render('home', 'Home', ['products' => $products->getAll()]);
  }
  public function game()
  {
    // $products = new Product ();
    // $cart = new Cart();
    return $this->render('game', 'game');
  }
  public function profile()
  {
    $users = new Users();

    if (App::$app->request->is_post()) {
      $id = App::$app->session->getItem('id');
      $data = App::$app->request->reqData();
      $imageName = App::$app->request->filePath('file', 'image');

      if ($imageName) {
        $data['image'] = $imageName;
      }
      $users->update(['id' => $id], $data);
      App::$app->response->redirect('/profile');
    }
    return $this->render('pages/users/profile', 'Profile', [
      'user' => App::$app->users
    ]);
  }
  public  function serch_item()
  {
    if (App::$app->request->is_post()) {
      $DATA = App::$app->request->reqData();
      $USER = new Users();
      // //($DATA);
      $DATA['username'] = $DATA['search'];
      unset($DATA['search']);
      // $USER->loadData($DATA);
      // $USER->validate();
      $serach_result = $USER->search($DATA);
      return $this->render('pages/users/search', 'ser', [
        'search' => $serach_result
      ]);
      return false;
    }
  }
  public function dashboard()
  {
    $games = new Gusers();



    $delimiter = "|";
    // $results = explode($delimiter, $string);

    // $string = "34|20|user|25";
    $delimiter = "|";

    $user_array = [];
    $admin_array = [];
    $tharrray=[];
    // $results = explode($delimiter, $string);
    foreach ($games->getAll() as $key => $value) {
      $tharrray[] =  $value['game'];
    }
    foreach ($tharrray as $item) {

      $item = explode($delimiter, $item);
      if ($item[1] == "user") {
        $user_array[] = $item[1];
      } else {
        $admin_array[] = $item[1];
      }
    }
// 
    $order = new Order();
    if (condition) {
      # code...
    }
    return $this->render('pages/users/dashboard', 'Dashboard', ['order' => count($admin_array), 'user' => count($user_array)]);
  }
}

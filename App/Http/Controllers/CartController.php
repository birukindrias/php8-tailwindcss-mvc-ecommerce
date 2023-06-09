<?php

namespace App\App\Http\Controllers;

use App\App\models\Cart as ModelsCart;
use App\App\models\Order;
use App\App\models\Product;
use App\App\models\Users;
use App\config\App;
use App\config\Controller;
use cart;
use orders;

class CartController extends Controller
{
  public function index()
  {
    $title = "carts";
    $cart = new ModelsCart();
    return $this->render("pages/products/carts", $title, ['cart' => $cart->innerJoin('products', 'cart', ['u_id' => $_SESSION['id']])]);
  }

  public  function create()
  {
    return;
  }
  public  function store()
  {
    $cart = new ModelsCart();

    // var_dump(App::$app->request->reqData());
    $item
      =  $cart->get(['p_id' => App::$app->request->reqData()['p_id'], 'u_id' => App::$app->request->reqData()['u_id']]);
    var_dump(App::$app->request->reqData()['u_id']);
    var_dump($item);
    // exit;
    if (!$item) {
      $data = App::$app->request->reqData();

      $cart->loadData($data);
      var_dump($data);
      // exit;
      if ($cart->save()) {
        echo 'asdfasdf';
        App::$app->response->redirect('/home');
      }
      return;
    }
    // var_dump($item['ctotal']);
    // // var_dump((int));
    // var_dump($item[0]);

    $itemctotal = (int)  $item[0]['ctotal'] + 1;
    $cart->update(['p_id' => App::$app->request->reqData()['p_id']], ['ctotal' => $itemctotal]);
    App::$app->response->redirect('/home');
    return;
  }
  public  function update()
  {
    return;
  }
  public  function order_cart()
  {
    $cart = new ModelsCart();
    $pro = new Product();
    echo "<pre>";
    $orders = [];
    $tprice = 0;
    $item
      =  $cart->get(['u_id' => App::$app->request->reqData()['u_id']]);
    foreach ($item as $key) {
      $price =  $pro->get(['id' => $key['p_id']])[0]['pprice'];

      $pricei = $price * $key['ctotal'];
      $tprice += $pricei;
    }
    $orders['u_id']
      =  $_SESSION['id'];
    $orders['amount']
      =  $tprice;
    $orders['status']
      =  'pending';

    $order = new Order();
    $order->loadData($orders);
    $order->savebyValue($orders);
    $cart->delete(['u_id' => $_SESSION['id']]);
    App::$app->response->redirect('/home');

    return;
  }
  public  function destroy()
  {
    $cart = new ModelsCart();
    $cart->delete(App::$app->request->reqData());
    App::$app->response->redirect('/home');
  }
}

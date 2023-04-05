<?php

namespace App\App\Http\Controllers\Products;

use App\App\models\Products;
use App\App\models\Users;
use App\config\App;
use App\config\Controller;
use App\config\Request;
use App\config\Response;

class ProductsController extends Controller
{
    public function ProductsController()
    {
        $title = "create";
        return $this->render("pages/products/create");
    }

    public  function create()
    {
        return $this->render("pages/products/create");
    }
    public  function store(Response $response)
    {

        if (App::$app->request->is_Post()) {
            // //(App::$app->request->reqData());
            $data = App::$app->request->reqData();
            $products = new Products();
            $imageName = App::$app->request->filePath('primg', 'file');

            if ($imageName) {
              $data['primg'] = $imageName;
            }
            $products->loadData($data);
// /            var_dump($data);
// $products->validate();
if ($products->save()) {
    echo 'ys';
    // return $response->redirect('/');
};
        }
    }
    public  function update()
    {
        return;
    }
    public  function edit()
    {
        return;
    }
    public  function delete()
    {
        return;
    }
}

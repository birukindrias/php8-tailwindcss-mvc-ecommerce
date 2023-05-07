<?php
namespace App\App\Http\Controllers;

use App\App\models\Product;
use App\App\models\Users;
use App\config\App;
use App\config\Controller;
use App\config\Request;

class PostsController extends Controller
{
    public function index()
    {
       $title = "posts";
       return $this->render("posts"); 
      
    }
  
    public  function create()
    {
        return $this->render("pages/products/create");

    }
      public  function store()
    {
        if (App::$app->request->is_Post()) {
            // var_dump(App::$app->request->reqData());
            $data = App::$app->request->reqData();
            $post = new Product();
      $imageName = App::$app->request->filePath('primg','prod');

            if ($imageName) {
                $data['primg'] = $imageName;
              }
              var_dump(  $data);
            $post->loadData($data);

            // exit;
            // var_dump($data);
          if (  $post->validate() && 
          
          $post->save()) {
            echo "ya";
            return App::$app->request->redirect('/');
          }
        }

      
    }
    public  function update()
    {
      return ;

    }
    public  function edit()
    {
      return ;

    }
    public  function delete()
    {
      return ;

    }
}

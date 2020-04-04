<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;    

use App\Http\Controllers\Controller;


class DashboardController extends Controller
{
    private $pathViewController = 'admin.pages.dashboard.';
    private $controllerName = 'dashboard';


    // chia sẽ view ra tất cả các trang 
    public function __construct()
    {
        view()->share('controllerName', $this->controllerName);
    }

    // trang index không cần id
    public function index()
    {
        return view($this->pathViewController. 'index',[
            'controllerName' => $this->controllerName
        ]);
    }


    
  
}
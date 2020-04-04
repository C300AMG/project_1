<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    
use App\Models\SliderModel as MainModel;
class SliderController extends Controller
{
    private $pathViewController = 'admin.pages.slider.';
    private $controllerName = 'slider';
    private $model;
    private $params = [];
    // chia sẽ view ra tất cả các trang 
    public function __construct()
    {   
        $this->model = new MainModel();
        

        view()->share('controllerName', $this->controllerName);
    }
    public function index(Request $request)
    { 
        $this->params['filter']['status']= $request->input('filter_status', 'all');
        $this->params['search']['field']= $request->input('search_field','');//để biết người dùng chọn theo field nào 
        $this->params['search']['value']= $request->input('search_value','');//người dùng nhập giá trị vào 
     
        $items       = $this->model->listItems($this->params, ['task'=>'admin-list-items']);
        $itemsStatus = $this->model->CountItemsStatus($this->params, ['task'=>'admin-count-items']);
  
    // echo "<pre>";
    // print_r($itemsStatus);
    // echo "</pre>";

    
        return view($this->pathViewController . 'index',[
            'params'      => $this->params,
            'items'       => $items,
            'itemsStatus' => $itemsStatus,
          
        ]);
    }
  
}

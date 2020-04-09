<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;


class SliderModel extends Model
{

	protected $table = 'slider';
	const CREATED_AT = 'created';
	const UPDATED_AT = 'modified';
  public $timestamps = false;
  protected $fieldSearchAccepted = [
      'id',
      'name',
      'description',
      'link',
  ];


  public function listItems($params =null, $options=null){ 
    
  //như vậy tham số params thứ 1 đã có giá trị, nhờ vào cái này để pik người dùng muốn lọc ở hiện tại là trạng thái nào
   $result = null;
   if($options['task'] == 'admin-list-items'){
    $query = self::select('id','name','description','link','thumb','status','created','created_by','modified','modified_by');
    if(isset($params['filter']['status']) && $params['filter']['status'] !== "all"){
       $query->where('status', "=",$params['filter']['status']);
    }

    if(isset($params['search']['value']) !== ""){
      //trương hợp all
       if($params['search']['field'] == 'all'){
          $query->where(function($query)use ($params){
            foreach ($this->fieldSearchAccepted as  $column) {
              $query->orWhere($column,'LIKE', "%{$params['search']['value']}%");
            }
             
    });
        //trường hợp các field
       }else if(in_array($params['search']['field'], $this->fieldSearchAccepted)){
        $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
       }
    }

    $result = $query->orderBy('id','desc') 
                    ->paginate(3);
    }
      return $result;
  }


public function CountItemsStatus($params = null, $options = null){
  $result =null;
  if ($options['task'] == 'admin-count-items') {
     $query = $this::groupBy('status')
                  ->select(DB::raw('status,COUNT(id) as count'));
    if($params['search']['value'] !== ""){      
      //trương hợp all
       if($params['search']['field'] == 'all'){
          $query->where(function($query)use ($params){
            foreach ($this->fieldSearchAccepted as  $column) {
              $query->orWhere($column,'LIKE', "%{$params['search']['value']}%");
            }    
          });
        //trường hợp các field
        }else if(in_array($params['search']['field'], $this->fieldSearchAccepted)){
        $query->where($params['search']['field'], 'LIKE', "%{$params['search']['value']}%");
       }
    }
      $result = $query->get()->toArray();; 
 }
 return $result;
}

//model cập nhật lại status (kích hoạt = chưua kích hoạt)
public function UpdateStatus($params = null, $options = null)
{
  
  if($options['task'] = 'change-status'){
    $status = ($params['currentStatus'] == 'active') ? 'inactive' : 'active';
      self::where('id', $params['id'])
            ->update(['status' => $status]);
  }
}
// getItem 


public function getItem($params = null, $options = null)
{
  if($options['task'] == 'get-item'){
   $result = self::select('id','name','description','link','status','thumb')->where('id',$params['id'])->first()->toArray();
  }
  return $result;
}

//xây dựng chức năng delete items 
public function DeleteItem($params = null, $options = null)
{
  if($options['task'] == 'delete-item'){
   self::where('id',$params['id'])->delete();
  }
}



}
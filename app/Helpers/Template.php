<?php 

namespace App\Helpers;

class Template 
{


	public static function showListHistory( $time,$by){
		$xhtml= sprintf('<p><i class="fa fa-user"></i>%s</p>
			<p><i class="fa fa-clock-o"></i>%s</p>',$by,date("d/m/Y", strtotime($time) ));
		return $xhtml;
	}

	public static function showButtonStatus($controllerName,$id,$status){
		$tmplStatus = config('zvn.template.status');
		$status     = array_key_exists($status,$tmplStatus) ? $status: "default";
		$kich_hoat = $tmplStatus[$status];
		$link                  = route($controllerName.'/status', ['status'=>$status, 'id'=> $id]);

		$xhtml =sprintf('<a href="%s" type="button" 
			class="btn btn-round %s">
			%s</a>',$link,$kich_hoat['class'],$kich_hoat['name']);
		return $xhtml;
	} 

	public static function showItemsThumb($nameThumb,$AltThumb,$controllerName){
		$xhtml= sprintf('<img src="%s" alt="%s" class="zvn-thumb">', asset('images/'.$controllerName.'/'.$nameThumb),$AltThumb);
		return $xhtml;
	}

	public static function showButtonAction($id,$controllerName){
		$tmplButton = [
			'edit'   => ['title' => 'Chỉnh Sửa', 	'class'    => 'btn-success', 'icon' => 'fa-pencil', 'route-name' => $controllerName.'/form'],
			'delete' => ['title' => 'Xóa',      	 'class'    => 'btn-danger btn-delete', 'icon'  => 'fa-trash', 'route-name'  => $controllerName.'/delete'],
			'info'   => ['title' => 'xem thông tin', 'class' => 'btn-warning', 'icon' => 'fa-eye', 'route-name'    => $controllerName.'/info'],
		];

		//ở phần slider chỉ cần 2 nút,ở phần category cần 3 nút,phần user cần 4 nút
		$buttonArea = [
			'slider'  => ['edit','delete','info'],
			'default' => ['edit','delete'],
		];
		$controllerName = (array_key_exists($controllerName,$buttonArea))? $controllerName: "default";
		$listButton     = $buttonArea[$controllerName];
		//bắt đầu foreach để lọc trong cái listButton(tức là người dùng đã chọn edit or delete trong slider rồi)
		//xác định xong là của slider thì phần edit có những nội dung gì thì in nó ra

		$xhtml= '<div class="zvn-box-btn-filter">';
		foreach ($listButton as  $val) {
			$currentButton = $tmplButton[$val];
			$link = route($currentButton['route-name'],['id'=>$id]);
			$xhtml .= sprintf('<a href="%s" type="button" class="btn btn-icon %s" data-toggle="tooltip" data-placement="top" data-original-title="%s">
				<i class="fa %s"></i>
				</a>',$link,$currentButton['class'],$currentButton['title'],$currentButton['icon']);
		}

		$xhtml .='</div>';
		return $xhtml;
	}

	public static function GroupByStatus($controllerName,$itemsStatus,$colorActive,$paramsSearch){
		
		

		$xhtml = '<div class="col-md-6">';

		$tmplStatus =config('zvn.template.status');
		$all['status'] = 'all';
		$all['count'] = array_sum(array_column($itemsStatus, 'count'));
		// dùng hàm để đặt phần tử all này ra đầu mảng
		array_unshift($itemsStatus,$all);
		if(count($itemsStatus) > 0){
			foreach ($itemsStatus as $value) {

				 $statusValue = $value['status'];//active,inactive,block

				 $statusValue = array_key_exists($statusValue,$tmplStatus) ? $statusValue : "default";




				// $kich_hoat = $tmplStatus[$statusValue];
				 $kich_hoat = $tmplStatus[$statusValue];

				//http://kenh14.com/admin/slider?filter_status=inactive
				 $link = route($controllerName). "?filter_status=" .$value['status'];

				if ($paramsSearch['value'] !== '') {
					
				//kenh14.com/admin/slider?filter_status=inactive&search_field=description&search_value=trình
					$link .= "&search_field=". $paramsSearch['field']. "&search_value=". $paramsSearch['value'];
				}

				 $class = ($colorActive == $value['status'] )? 'btn-danger' : 'btn-primary';
				 $xhtml .= sprintf('<a href="%s" type="button" class="btn %s">
				 	%s <span class="badge bg-white">%s</span>
				 	</a>',$link,$class,$kich_hoat['name'],$value['count']);
				}
			}	
			$xhtml .= '</div>';
			return $xhtml;	
		} 


		public static function showButtonSearch($controllerName,$paramsSearch){
			$xhtml = null;
			$tmlpField = config('zvn.template.search');
			

			// if else trường hợp cho những trang khác nữa
			$fieldInController = [
				'slider'  => ['all','id','name','description','link'],
				'default' => ['all', 'id','fullname']
			];
			// kiểm tra xem slider có trong phần định nghĩa hay không nếu có lấy nó nếu không lấy default;
			$controllerName = array_key_exists($controllerName,$fieldInController) ? $controllerName : 'default';
			//field xuất hiện trong slider
			$phieu_xuat_hien = $fieldInController[$controllerName];
			$xhtmlField = null;
			foreach ($fieldInController[$controllerName] as $field) {
				$xhtmlField .= sprintf('<li><a href="#" class="select-field" data-field="%s">%s</a></li>',$field,$tmlpField[$field]['name']);
			}
		
			
			$nameField =(in_array($paramsSearch['field'], $fieldInController[$controllerName])) ? $paramsSearch['field'] : "all";
			
			$xhtml = sprintf('
				<div class="input-group">
				    <div class="input-group-btn">
				        <button type="button" class="btn btn-default dropdown-toggle btn-active-field" data-toggle="dropdown" aria-expanded="false">
				            %s <span class="caret"></span>
				        </button>
				        <ul class="dropdown-menu dropdown-menu-right" role="menu">
				           %s
				        </ul>
					</div>
					<input type="text"  name="search_value" value="%s" class="form-control">
					<input type="hidden" name="search_field" value="%s">
					<span class="input-group-btn">
						<button id="btn-clear-search" type="button" class="btn btn-success" style="margin-right: 0px">Xóa tìm kiếm</button>
						<button id="btn-search" type="button" class="btn btn-primary">Tìm kiếm !</button>
					</span>
					</div>',$tmlpField[$nameField]['name'],$xhtmlField,$paramsSearch['value'],$nameField);
			return $xhtml;
		}

	}




	?>




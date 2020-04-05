 
 @php
     // khác nhau giữa add và edit : 
     // route, icon, title 

     $h3 = 'Danh sách ' . ucfirst($controllerName);
  
     $link = route($controllerName);
     $icon = 'fa-arrow-left';
     $title = 'Quay vê';

     if($pageIndex == true){
       $link = route($controllerName)."/form";
       $icon = 'fa-plus-circle';
       $title = 'Thêm mới';
     }

     $buttonAdd_Edit  = sprintf('   
       <a href="%s" 
       class="btn btn-success">
       <i class="fa %s"></i> %s
      </a>',$link,$icon,$title);
 @endphp
  
  <div class="page-header zvn-page-header clearfix">
      <div class="zvn-page-header-title">
                    <h3>{{ $h3 }}</h3>
                </div>
                <div class="zvn-add-new pull-right">
                    {{-- <a href="{{ route($controllerName.'/form') }} " class="btn btn-success"><i
                            class="fa fa-plus-circle"></i> Thêm mới</a>
                                 <a href="{{ route($controllerName.'/form') }} " class="btn btn-success"><i
                            class="fa fa-plus-circle"></i> Thêm mới</a> --}}
                            {!! $buttonAdd_Edit !!}
                </div>
     <div>

    
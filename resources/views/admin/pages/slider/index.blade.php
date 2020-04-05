 
 @extends('admin.main') 

 @php
   
   use App\Helpers\Template as Template;
      $showGroupStatus = Template::GroupByStatus($controllerName, $itemsStatus,$params['filter']['status'],$params['search']);

      $showSearch      = Template::showButtonSearch($controllerName,$params['search']);
 @endphp
 @section('content')
@include('admin.templates.page_header',['pageIndex'=>$pageIndex = true])
   
   
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            @include('admin.templates.x_title',['title'=>'Bộ lọc'])

           
            @include('admin.templates.notify')
            <div class="x_content">
                <div class="row">
                    {!! $showGroupStatus !!}
                    <div class="col-md-6">
                        {!! $showSearch !!}
                    </div>
                    <div class="col-md-2">
                        <select name="select_filter" class="form-control" data-field="level">
                            <option value="default" selected="selected">Select Status</option>
                            <option value="admin">All</option>
                            <option value="member">Active</option>
                            <option value="member">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--box-lists-->
@include('admin.element.list')
<!--end-box-lists-->
<!--box-pagination-->
@if (count($items)>0)
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            @include('admin.templates.x_title',['title'=>'Phân trang']) @include('admin.templates.pagination')
        </div>
    </div>
</div>
@endif @endsection
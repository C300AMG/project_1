

@php

   use App\Helpers\Template as Template;
   use App\Helpers\Hightlight as Hightlight;
@endphp
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Danh sách</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">#</th>
                                <th class="column-title">Slider Info</th>
                                <th class="column-title">Trạng thái</th>
                                <th class="column-title">Tạo mới</th>
                                <th class="column-title">Chỉnh sửa</th>
                                <th class="column-title">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if (count($items) > 0) 
                            @foreach ($items as $key=>$val)
                            @php
                                 $stt          = $key+1;
                                 $id           = $val['id'];
                                 $name         = Hightlight::show($val['name'],$params['search'],'name');
                                 $description  = Hightlight::show($val['description'],$params['search'],'description');
                                 $link         = Hightlight::show($val['link'],$params['search'],'link');
                                 $thumb        = Template::showItemsThumb($val['thumb'],$val['name'],$controllerName);
                                 $status       = Template::showButtonStatus($controllerName,$id,$val['status']);
                                 $created      = Template::showListHistory($val['created'],$val['created_by']);
                                 $modified     = Template::showListHistory($val['modified'],$val['modified_by']);
                                 $Action        = Template::showButtonAction($id,$controllerName);

                            @endphp
                            <tr class="odd pointer">
                                <td>{{ $stt }}</td>
                                <td width="40%">
                                    <p><strong>Name:</strong> {!! $name !!}</p>
                                    <p><strong>Description:</strong> {!! $description !!}</p>
                                    <p><strong>Link:</strong> {!! $link !!}</p>
                                    <p> {!!  $thumb !!}</p>
                                </td>
                                <td>
                                   {!!  $status !!}

                                </td>
                                <td>
                                  {!!  $created !!}
                                </td>
                                <td>
                                   {!!  $modified !!}
                                </td>
                                <td class="last">
                                     {!!  $Action !!}
                                </td>
                            </tr>
                           @endforeach
                           @else
                            <tr>
                               <td colspan="6" class="text-center">
                                   Dữ liệu đang được cập nhật !!
                               </td>
                           </tr>
                           @endif     
                           
                       </tbody>
                   </table>
               </div>
           </div>
       </div>
   </div>
</div>
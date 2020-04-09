 
 @extends('admin.main') 

 @php
   
   use App\Helpers\Template as Template;
   use App\Helpers\Form as FormTemplate;

   $inputHiddenID = Form::hidden('id', $item['id']);
   $inputHiddenThumb = Form::hidden('thumb', $item['thumb']);
   

   $arrayStatus = ['default'=>'Trạng thái','active'                        => config('zvn.template.status.active.name'), 'inactive'                           => config('zvn.template.status.inactive.name')];


   $elements = [
       [
           'label'   => Form::label('name', 'Name', ['class'               => 'control-label col-md-3 col-sm-3 col-xs-12']),
           'element' => Form::text('name', $item['name'],['class'                     => 'form-control col-md-6 col-xs-12','id' => "name"]),
        ],
        [
           'label'   => Form::label('description', 'Description', ['class' => 'control-label col-md-3 col-sm-3 col-xs-12']),
           'element' => Form::text('description', $item['description'],['class'              => 'form-control col-md-6 col-xs-12','id' => "description"]),
        ],
       [
           'label'   => Form::label('link', 'Link', ['class'               => 'control-label col-md-3 col-sm-3 col-xs-12']),
           'element' => Form::text('link', $item['link'],['class'                     => 'form-control col-md-6 col-xs-12','id' => "link"]),
        ],
        [
           'label'   => Form::label('status', 'Status', ['class'           => 'control-label col-md-3 col-sm-3 col-xs-12']),
           'element' => Form::select('status',$arrayStatus,$item['status'],['class'              => 'form-control col-md-6 col-xs-12','id' => "status"] )
        ],

        [
           'label'   => Form::label('thumb', 'Thumb', ['class'           => 'control-label col-md-3 col-sm-3 col-xs-12']),
           'element' => Form::file('thumb',['class'              => 'form-control col-md-6 col-xs-12','id' => "thumb"]),
           'thumb'  =>(!empty($item['id'])) ? Template::showItemsThumb( $item['thumb'],$item['name'],$controllerName) : null,
           'type'    => 'thumb',
        ],


        [
           
           'element' => $inputHiddenThumb . $inputHiddenID . Form::submit('save',['class'                     => 'btn btn-success']),
           'type'    => 'btn-submit',
        ],



        
   ]
      
 @endphp
 @section('content')
@include('admin.templates.page_header',['pageIndex'=>$pageIndex = false])
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">

            @include('admin.templates.x_title',['title'=>'FORM'])



                {!! Form::open([

                    'method'         => 'POST',
                    'url'            => 'http: //proj_news.xyz/admin123/slider/save',
                    'accept-charset' => 'UTF-8',
                    'enctype'        => 'multipart/form-data',
                    'class'          => 'form-horizontal form-label-left',
                    'id'             => 'main-form'

                    
                    
                    ]) 
                !!}


                            {!! FormTemplate::show($elements) !!}
                   
                    



                     {{-- <div class="form-group">
                        {!! $nameLabel !!}
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            {!! $nameInput !!}
                        </div>
                    </div> --}}


                {!! Form::close() !!}

            {{-- <form method="POST" action="http://proj_news.xyz/admin123/slider/save" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal form-label-left" id="main-form">
    <input name="_token" type="hidden" value="m4wsEvprE9UQhk4WAexK6Xhg2nGQwWUOPsQAZOQ5">

    <div class="form-group">
        <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input class="form-control col-md-6 col-xs-12" name="name" type="text" value="Ưu đãi học phí" id="name">
        </div>
    </div>

    <div class="form-group">
        <label for="description" class="control-label col-md-3 col-sm-3 col-xs-12">Description</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input class="form-control col-md-6 col-xs-12" name="description" type="text" value="Tổng hợp các trương trình ưu đãi học phí hàng tuần..." id="description">
        </div>
    </div>

        <div class="form-group">
        <label for="link" class="control-label col-md-3 col-sm-3 col-xs-12">Link</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input class="form-control col-md-6 col-xs-12" name="link" type="text" value="https://zendvn.com/uu-dai-hoc-phi-tai-zendvn/" id="link">
        </div>
    </div>

    <div class="form-group">
        <label for="status" class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control col-md-6 col-xs-12" id="status" name="status">
                <option value="default">Select status</option>
                <option value="active" selected="selected">Kích hoạt</option>
                <option value="inactive">Chưa kích hoạt</option>
            </select>
        </div>
    </div>



    <div class="form-group">
        <label for="thumb" class="control-label col-md-3 col-sm-3 col-xs-12">Thumb</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input class="form-control col-md-6 col-xs-12" name="thumb" type="file" id="thumb">
            <p style="margin-top: 50px;"><img src="http://proj_news.xyz/images/slider/LWi6hINpXz.jpeg" alt="Ưu đãi học phí" class="zvn-thumb"></p>
        </div>
    </div>

  
    <div class="ln_solid"></div> 

    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">


            <input name="id" type="hidden" value="3">


            <input name="thumb_current" type="hidden" value="LWi6hINpXz.jpeg">



            <input class="btn btn-success" type="submit" value="Save">
        </div>
    </div>

</form> --}}
            @include('admin.templates.notify')
        </div>
    </div>
</div>

@endsection

@php
$totalItems = $items->total();
$totalPages = $items->lastPage();
$totalItemsPerPage = $items->perPage();
@endphp
<div class="x_content">
    <div class="row">
        <div class="col-md-6">
            <p class="m-b-0"> Số bài viết trên mỗi trang : <span class="label label-success label-pagination"><strong><b>{{ $totalItems }}</b> Trang</strong></span>  
                
            </p>
            <p class="m-b-0">Tất cả các trang hiện có:  
                <span class="label label-danger label-pagination"><strong><b>{{ $totalPages }}</b> Trang</strong></span>
            </p>
            <p class="m-b-0">Tất cả các bài viết hiện có:  
                <span class="label label-warning label-pagination"><strong><b>{{ $totalItems }}</b> Bài viết</strong></span>
            </p>
        </div>
        <div class="col-md-6">

         {{ $items->appends(request()->input())->links('admin.templates.pagination_custom') }}
         

     </div>
 </div>
</div>
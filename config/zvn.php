<?php 

// cấu hình prefixAdmin
return  [
    'url'=>[
        'prefix_admin' => 'admin',
    ],



      'template'=>[

           'form_input'=>[
               'class'=>'form-control col-md-6 col-xs-12',
        ],
            'form_label'=>[
               'class'=>'control-label col-md-3 col-sm-3 col-xs-12',
        ],
        'status' =>[
					'all'             => ['name' => 'Tất cả', 'class'           => 'btn-warning'],
					'active'          => ['name' => 'Kích Hoạt ', 'class'       => 'btn-success'],
					'inactive'        => ['name' => 'Chưa Kích Hoạt !', 'class' => 'btn-danger'],
					// 'block'        => ['name' => 'Bị khóa', 'class'          => 'btn-danger'],
			        'default'         => ['name' => 'Chưa xác định', 'class'    => 'btn-danger'],
        ],
       

         'search' =>[
                    'all'          => ['name' => 'Tìm kiếm theo all'],
                    'id'           => ['name' => 'Tìm kiếm theo id'],
                    'name'         => ['name' => 'Tìm kiếm  theo name'],
                    'username'     => ['name' => 'Tìm kiếm  theo username'],
                    'fullname'     => ['name' => 'Tìm  theo fullname'],
                    'email'       => ['name' => 'search by email'],
                    'description' => ['name' => 'search by description'],
                    'link'        => ['name' => 'search by link'],
                    'content'     => ['name' => 'search by content'],
                
        ],
    ]
]



?>

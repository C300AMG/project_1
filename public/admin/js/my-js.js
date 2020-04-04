$(document).ready(function(){

	// console.log("Hello world!");
	//khai báo tên biến của tìm kiếm và xoá tìm kiếm

	let $btnSearch      = $("button#btn-search");
	let $btnClearSearch = $("button#btn-clear-search");


	// khai báo tên filed và giá trị người dùng seảrch 
	let $inputSearchField = $("input[name = search_field]");
	let $inputSearchValue = $("input[name = search_value]");

	// khi click vào field nào thì field đó sẽ được cập nhật lại 
	$("a.select-field").click(function(e){
		e.preventDefault();
		let field     = $(this).data('field');
		let fieldName = $(this).html();
		$("button.btn-active-field").html(fieldName +  '<span class="caret"></span>');
		//lấy field gắn vaò cho inputSearchField
		$inputSearchField.val(field);

	});

	$btnSearch.click(function () {

		var pathname = window.location.pathname;
		let params = ['filter_status'];//?filter_status=active
		let searchParams = new URLSearchParams(window.location.search);	//  đã được khai báo trên URL

		let link = "";
		//bây giờ mới duyệt cái params xem thử cái searchParams có chứa cái param này hay không
		$.each(params, function (key, param) { // filter_status
			if (searchParams.has(param)) {
				//params là filter_status= cái gì đó
				//searchParams.get(param) lấy cái param cũ để lưu lại cho phần link 	
				// kenh14.com/admin/slider?filter_status=inactive&search_field=all&search_value=zendvn.com
				link += param + "=" + searchParams.get(param) + "&" // filter_status=active
			}
		});

		let search_field = $inputSearchField.val();
		let search_value = $inputSearchValue.val();

		if (search_value.replace(/\s/g, "") == "") {
			alert("Nhập vào giá trị cần tìm !!");
		} else {
	        // kenh14.com/admin/slider?filter_status=inactive&search_field=all&search_value=zendvn.com
			window.location.href = pathname + "?" + link + 'search_field=' + search_field + '&search_value=' + search_value;
		}
	});

	//xoá tìm kiếm
	$btnClearSearch.click(function () {

		var pathname = window.location.pathname;
		let params = ['filter_status'];//?filter_status=active
		let searchParams = new URLSearchParams(window.location.search);	//  đã được khai báo trên URL

		let link = "";
		//bây giờ mới duyệt cái params xem thử cái searchParams có chứa cái param này hay không
		$.each(params, function (key, param) { // filter_status
			if (searchParams.has(param)) {
				//params là filter_status= cái gì đó
				//searchParams.get(param) lấy cái param cũ để lưu lại cho phần link 	
				// kenh14.com/admin/slider?filter_status=inactive&search_field=all&search_value=zendvn.com
				link += param + "=" + searchParams.get(param) + "&" // filter_status=active
			}
		});
		window.location.href = pathname + "?" + link.slice(0,-1);//hàm cắt chuỗi dấu &
		
	});
	
	

});
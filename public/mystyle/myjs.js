// sub img
$(document).ready(function() {
	$('#add_img').on('click', function() {
		$('#sub_img').append('<input type="file" id="id_img" name="id_img[]" class="form-control" />');
	});
});
//del img
$(document).ready(function() {
    $('.del_img').on('click', function() {
        $idimg=$(this).attr('idimg');
        $element='#img'+$idimg;
        var url='http://localhost/ingoldfish/adgoldfish185/san-pham/delimg';
        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            data: {aidimg: $idimg},
            success: function(data){
                if (data=="oke") {
                     $($element).remove();
                }else{
                    alert('có lỗi sảy ra!!! vui lòng thử lại sau.');
                }
            }
        });
    });
});

//facebook
// window.fbAsyncInit = function() {
//     FB.init({
//       appId      : '343282239460420',
//       cookie     : true,
//       xfbml      : true,
//       version    : 'v2.8'
//     });
//     FB.AppEvents.logPageView();   
//     // Kiểm tra trạng thái hiện tại
//     FB.getLoginStatus(function (response) {
//         statusChangeCallback(response);
//     });
// };

// (function(d, s, id){
//  var js, fjs = d.getElementsByTagName(s)[0];
//  if (d.getElementById(id)) {return;}
//  js = d.createElement(s); js.id = id;
//  js.src = "//connect.facebook.net/en_US/sdk.js";
//  fjs.parentNode.insertBefore(js, fjs);
// }(document, 'script', 'facebook-jssdk'));
// change status User
$(document).ready(function() {
    $('.changestatusUser').on('click', function() {
        var id=$(this).attr("idUser");
        var cl=$(this).find('#change').attr("class");
        var url='http://localhost/ingoldfish/adgoldfish185/nguoi-dung/active';
        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            data: {aid: id},
            success: function(data){
                if (data=="oke") {
                    if(cl=='switch-on'){
                        $("#change"+id).find('#change').attr({
                            class: 'switch-off'
                        });
                    }
                    if(cl=='switch-off'){
                        $("#change"+id).find('#change').attr({
                            class: 'switch-on'
                        });
                    }
                }else{
                    alert('có lỗi sảy ra!!! vui lòng thử lại sau.');
                }
            }
        });
        
    });
});
// change status cate
$(document).ready(function() {
    $('.changestatusCate').on('click', function() {
        var id=$(this).attr("idCate");
        var cl=$(this).find('#change').attr("class");
        var url='http://localhost/ingoldfish/adgoldfish185/danh-muc-sp/active';
        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            data: {aid: id},
            success: function(data){
                if (data=="oke") {
                    if(cl=='switch-on'){
                        $("#change"+id).find('#change').attr({
                            class: 'switch-off'
                        });
                    }
                    if(cl=='switch-off'){
                        $("#change"+id).find('#change').attr({
                            class: 'switch-on'
                        });
                    }
                }else{
                    alert('có lỗi sảy ra!!! vui lòng thử lại sau.');
                }
            }
        });
        
    });
});
// change status Pro
$(document).ready(function() {
    $('.changestatusPro').on('click', function() {
        var id=$(this).attr("idPro");
        var cl=$(this).find('#change').attr("class");
        var url='http://localhost/ingoldfish/adgoldfish185/san-pham/active';
        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            data: {aid: id},
            success: function(data){
                if (data=="oke") {
                    if(cl=='switch-on'){
                        $("#change"+id).find('#change').attr({
                            class: 'switch-off'
                        });
                    }
                    if(cl=='switch-off'){
                        $("#change"+id).find('#change').attr({
                            class: 'switch-on'
                        });
                    }
                }else{
                    alert('có lỗi sảy ra!!! vui lòng thử lại sau.');
                }
            }
        });
        
    });
});

//change status slide
$(document).ready(function() {
    $('.changestatusSlide').on('click', function() {
        var id=$(this).attr("idSlide");
        var cl=$(this).find('#change').attr("class");
        var url='http://localhost/ingoldfish/adgoldfish185/slide/active';
        $.ajax({
            url: url,
            type: 'GET',
            cache: false,
            data: {aid: id},
            success: function(data){
                if (data=="oke") {
                    if(cl=='switch-on'){
                        $("#change"+id).find('#change').attr({
                            class: 'switch-off'
                        });
                    }
                    if(cl=='switch-off'){
                        $("#change"+id).find('#change').attr({
                            class: 'switch-on'
                        });
                    }
                }else{
                    alert('có lỗi sảy ra!!! vui lòng thử lại sau.');
                }
            }
        });
        
    });
});

//change status  posts
$(document).ready(function() {
	$('.changestatusPost').on('click', function() {
		var id=$(this).attr("idPost");
		var cl=$(this).find('#change').attr("class");
		var url='http://localhost/ingoldfish/adgoldfish185/bai-viet/active';
		$.ajax({
			url: url,
			type: 'GET',
			cache: false,
			data: {aid: id},
			success: function(data){
				if (data=="oke") {
					if(cl=='switch-on'){
						$("#change"+id).find('#change').attr({
							class: 'switch-off'
						});
					}
					if(cl=='switch-off'){
						$("#change"+id).find('#change').attr({
							class: 'switch-on'
						});
					}
				}else{
					alert('có lỗi sảy ra!!! vui lòng thử lại sau.');
				}
			}
		});
		
	});
});
//change status cate posts
$(document).ready(function() {
	$('.changestatusCatePost').on('click', function() {
		var id=$(this).attr("idCatePost");
		var cl=$(this).find('#change').attr("class");
		var url='http://localhost/ingoldfish/adgoldfish185/danh-muc-bv/active';
		$.ajax({
			url: url,
			type: 'GET',
			cache: false,
			data: {aid: id},
			success: function(data){
				if (data=="oke") {
					if(cl=='switch-on'){
						$("#change"+id).find('#change').attr({
							class: 'switch-off'
						});
					}
					if(cl=='switch-off'){
						$("#change"+id).find('#change').attr({
							class: 'switch-on'
						});
					}
				}else{
					alert('có lỗi sảy ra!!! vui lòng thử lại sau.');
				}
			}
		});
		
	});
});

// change status tag
// $(document).ready(function() {
//     $('.changestatusTags').on('click', function() {
//         var id=$(this).attr("idTag");
//         var cl=$(this).find('#change').attr("class");
//         var url='http://localhost/MyWeb/admin/tag/changestatus/';
//         $.ajax({
//             url: url,
//             type: 'GET',
//             cache: false,
//             data: {aid: id},
//             success: function(data){
//                 if (data=="oke") {
//                     if(cl=='switch-on'){
//                         $("#change"+id).find('#change').attr({
//                             class: 'switch-off'
//                         });
//                     }
//                     if(cl=='switch-off'){
//                         $("#change"+id).find('#change').attr({
//                             class: 'switch-on'
//                         });
//                     }
//                 }else{
//                     alert('có lỗi sảy ra!!! vui lòng thử lại sau.');
//                 }
//             }
//         });
        
//     });
// });
//add cart
// $(document).ready(function() {
// 	$('#add_cart').on('click', function() {
// 		var idTem=$(this).attr("idTem");
// 		var url='http://localhost/1phut30giay/gio-hang/';
// 		$.ajax({
// 			url: url + idTem,
// 			type: 'GET',
// 			cache: false,
// 			data: {aidTem: idTem},
// 			success: function(data){
// 				if (data['kq']=="oke") {
// 					$('#thongbao_add').html('<div class="alert alert-success" style="text-align: center;">Thêm thành công!!! </div>');
// 					$('#cart').html('<i class="icon-shopping-cart"></i>Giỏ hàng ('+data['soluong']+')');
// 				}else{
// 					$('#thongbao_add').html("Thêm thất bại, hãy thử lại sau!!!")
// 				}
// 			}
// 		});
		
// 	});
// });

/***************************************************/
//add sub dir
// var count_sub=2;
// var count_sub1=2;
// $(document).ready(function() {
// 	$('.add_sub').on('click', function() {
// 		var level=$(this).attr("level");
// 		var countsub=$(this).attr("countsub");
// 		var countsub1=$(this).attr("countsub1");
// 		if(countsub>count_sub){
// 			count_sub=countsub;
// 		}
// 		if (level!='1') {
// 			$('#'.level).append('<label class="control-label col-lg-1"></label>'
//                                  +'<div class="col-lg-6">'
//                                  +'<input type="text" name="name_subdir[]" class="form-control" />'
//                                  +'</div>');
// 		}else{
// 			$('#add_subdir').append('<div class="form-group '
// 									// +level+count_sub
// 									+'">'
// 									+'<label class="control-label col-lg-2"></label>'
// 	                                +'<div class="col-lg-9">'
// 	                                +'<input onchange="text_dir('
// 	                                +level+count_sub
// 	                                +')" value="'
// 	                                +level+count_sub+':'
// 	                                +'" level="'
// 	                                +level+count_sub
// 	                                +'" id="'
// 	                                +level+count_sub
// 	                                +'" type="text" name="name_subdir[]" class="text_dir form-control" />'
// 				                    +'<input class="form-control" type="file" name="'
// 				                    +level+count_sub
// 				                    +'[]" multiple="">'
// 	                                +'</div><br><br>'
// 	                                +'<label class="control-label col-lg-2"></label>'
// 	                                +'<div class="col-lg-9 '
// 	                                +'">'
// 	                                +'<a onclick="sub1('
// 	                                +level+count_sub
// 	                                +','
// 	                                +countsub1
// 	                                +')" level="'
// 	                                +level+count_sub
// 	                                +'" class="col-lg-1 btn btn-primary btn-sm " href="javascript: void(0)">Sub</a>'
// 	                                //div sub
// 	                                +'<div class="col-lg-8 '
// 	                                +level+count_sub
// 	                                +'">'
// 	                                +'</div>'
// 	                                // end div sub
// 	                                +'</div>'
// 	                                +'</div>'
// 	                                );
// 			count_sub=count_sub+1;
// 		}
// 	});
// });
// function sub1(level, countsub1){
// 	if(countsub1>count_sub1){
// 		count_sub1=countsub1;
// 	}
// 	var subid='.'+level;
// 	$(subid).append('<div class="col-lg-8">'
//                     +'<input onchange="text_dir('
//                     +level+count_sub1
//                     +')" value="'
//                     +level+count_sub1+':'
//                     +'" level="'
//                     +level+count_sub1
//                     +'" id="'
//                     +level+count_sub1
//                     +'"type="text" name="name_subdir1[]" class="text_dir form-control" />'
//                     +'<input class="form-control" type="file" name="'
//                     +level+count_sub1
//                     +'[]" multiple="">'
//                     +'</div>'
//                     +'<br><br>');
// 	count_sub1=count_sub1+1;
// }
// function text_dir(level){
// 	var str=$('#'+level).val();
//     var splitted = str.split(":", 1);
//     if(splitted[0]!=level){
//         var splitted1 = str.split(":");
//         var str1="";
//         for (var i = 1; i <= splitted1.length - 1; i++) {
//             str1=str1+splitted1[i];
//         }
//         $('#'+level).val(level+':'+str1);
//     }
// }
//xoa thu muc
// function delete_dir(id_dir){
//     var url='http://localhost/MyWeb/admin/template/deleteDir';
//     $.ajax({
//             url: url,
//             type: 'GET',
//             cache: false,
//             data: {aidDir: id_dir},
//             success: function(data){
//                 if (data=="oke") {
//                     $('#thongbao').html('<div class="alert alert-success" style="text-align: center;">Xóa thành công!!! </div>');
//                     $('#name_dir').val('');
//                 }else{
//                     $('#thongbao').html('<div class="alert alert-danger" style="text-align: center;">Xóa thất bại!!! </div>');
//                 }
//             },
//             error: function (data) {
//                 alert("loi");
//             }
//         });
// }
//facebook
// window.fbAsyncInit = function() {
// 	FB.init({
// 	  appId      : '343282239460420',
// 	  cookie     : true,
// 	  xfbml      : true,
// 	  version    : 'v2.8'
// 	});
// 	FB.AppEvents.logPageView();   
// 	// Kiểm tra trạng thái hiện tại
//     FB.getLoginStatus(function (response) {
//         statusChangeCallback(response);
//     });
// };

// (function(d, s, id){
//  var js, fjs = d.getElementsByTagName(s)[0];
//  if (d.getElementById(id)) {return;}
//  js = d.createElement(s); js.id = id;
//  js.src = "//connect.facebook.net/en_US/sdk.js";
//  fjs.parentNode.insertBefore(js, fjs);
// }(document, 'script', 'facebook-jssdk'));

// [2] Xử lý trạng thái đăng nhập
// function statusChangeCallback(response) {
    // Người dùng đã đăng nhập FB và đã đăng nhập vào ứng dụng
    // if (response.status === 'connected') {
    //     FB.api('/me', function(response) {
	   //    // alert(response);
// 	    });
//     }
//     // Người dùng đã đăng nhập FB nhưng chưa đăng nhập ứng dụng
//     else if (response.status === 'not_authorized') {
//         // alert("chưa đăng nhập ứng dụng");
//     }
//     // Người dùng chưa đăng nhập FB
//     else {
//         // alert("chưa đăng nhập facebook");
//     }
// }

// // [3] Yêu cầu đăng nhập FB
// function RequestLoginFB() {
//     window.location = 'http://graph.facebook.com/oauth/authorize?client_id=343282239460420&scope=public_profile,email,user_likes&redirect_uri=http://localhost/1phut30giay';
// }

// // [5] Chào mừng người dùng đã đăng nhập
// function ShowWelcome() {
//     document.getElementById('btb').setAttribute('style', 'display:none');            
//     FB.api('/me', function (response) {
//         var name = response.name;
//         var username = response.username;
//         var id = response.id;
//         document.getElementById('lbl').innerHTML = 'Tên=' + name + ' | username=' + username + ' | id=' + id;
//         document.getElementById('lbl').setAttribute('style', 'display:block');
//     });
// }

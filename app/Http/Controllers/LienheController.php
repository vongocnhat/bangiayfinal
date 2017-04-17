<?php

namespace App\Http\Controllers;


use Mail,Request;

class LienheController extends Controller
{
    //
    function getLienHe(){
      return view('cusproduct.lienhe');
    }
    function postLienHe(Request $request){
      $data = ['hoten'=> Request::input('name'), 'tinnhan'=>Request::input('message'), 'email'=>Request::input('email'), 'phone'=>Request::input('phone')];
			Mail::send('emails.blanks',$data,function ($msg){
				$msg -> from('standbyme0128@gmail.com','ThanhDoiAdmin');
				$msg->to('standbyme0128@gmail.com','AdminPages')->subject('Phản hồi từ khách hàng!!');
			});
			echo "<script>
				alert('Cảm ơn góp ý của bạn. Chúng tôi sẽ sớm liên hệ cho bạn!!');
				window.location = '".url('/')."'
			</script>";
    }

}
//by THANH DOI

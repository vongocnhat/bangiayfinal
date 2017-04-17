//password confirm--}}
if(document.getElementById("pwd") != null && document.getElementById("pwd2") != null)
{
  $(document).ready(function(){
    var pwd = document.getElementById("pwd")
      , pwd2 = document.getElementById("pwd2");
    function validatePassword(){
      if(pwd.value != pwd2.value) {
        pwd2.setCustomValidity("Xác nhận mật khẩu không đúng");
      }
      else
      {
        pwd2.setCustomValidity("");
      }
    }
      pwd.onchange = validatePassword;
      pwd2.onkeyup = validatePassword;
    //rangelenght
    $('#pwd').attr({'minlength':'6', 'maxlength':'32'});
    $('#pwd2').attr({'minlength':'6', 'maxlength':'32'});
    $('input[name="User"]').attr({'pattern':'[A-Za-z0-9]{1,}', 'title':'Chỉ Được Nhập Tiếng Việt Không Dấu ( Từ a Đến z Hoặc Từ A Đến Z Hoặc Từ 0 Đến 9 )'});
  });
}
$(document).ready(function(){
  $('form').submit(function(){
    if($('input[type="checkbox"]').length > 0)
    {
      $('input[type="checkbox"]').each(function(){
        $(this).val($(this).prop('checked') ? 1 : 0);
        $(this).prop('checked', true);
        $('body').hide();
      });
    }
    if($('input[type="number"]').length > 0)
    {
      $('input[type="number"]').each(function(){          
        if(this.value == "")
          this.value = 0;
      });
    }
  });
  var i = 1;
  $('.size').keypress(function(e){
    if (e.keyCode >= 48 && e.keyCode <= 57) {
      return true;
    }
    return false;
  });
});
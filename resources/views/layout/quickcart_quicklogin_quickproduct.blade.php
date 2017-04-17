<div class="lockbody"></div>
{{-- cart --}}
<div class="quickcart">
    <input type="button" name="close" value="X" class="btn btn-danger" style="float: right;">
    <h3>Your Cart</h3>
<form class="formbtn-pay">
    <table style="width: 100%;" class="tbcartlist table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Del</th>
            </tr>
        </thead>
        <tbody class="cartlist">
            
        </tbody>                                                
    </table>    
</form>
</div>

{{-- login --}}
<div class="quicklogin">
    <input type="button" name="close" value="X" class="btn btn-danger" style="float: right;">
    <h3>Login Form</h3>
    {!!Form::open(['route' => 'cusproduct.login', 'method' => 'POST','class' => 'form-horizontal quickloginform'])!!}
            <input type="text" name="User" placeholder="User" class="nhat6" required>
            <input type="password" name="password" class="nhat6" placeholder="Password" required minlength="6" maxlength="32"><br>
            <input type="radio" name="radioLogin" checked="" value="is_login">
            <span>Tôi đã có tài khoản</span><br>
            <input type="radio" name="radioLogin" value="not_login">
            <span>Đặt hàng không cần đăng nhập</span><br>
            <input type="submit" value="Continue" class="btn btn-success">
    {!!Form::close()!!}
</div>
{{-- product show --}}
<div class="quickproduct">

</div>
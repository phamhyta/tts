<div>
    <div>
        <h2>Xin chào {{$cus->full_name}}</h2>
        <p>Email này để giúp bạn lấy lại mật khẩu tài khoản đã bị quên</p>
        <p>Vui lòng click vào link dưới đây để đặt lại mật khẩu</p>
        <p>Chú ý: Mã xác nhận chỉ có hiệu lực trong vòng 72h</p>
        <p>
            <a href="{{route('account.password.get',['customer'=>$cus -> id, 'token' => $cus -> token])}}" 
            style="display: inline-block; background:green; color: #fff; padding:7px 25px; font-weight:bold">Đặt lại mật khẩu</a>
        </p>
    </div>
</div>
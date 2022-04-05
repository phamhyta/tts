@extends('front-end.app')
@section('content')
@if(session('status'))
    {{session('status')}}
@endif
<form method="POST" action="{{route('client.login.store')}}">
    @csrf
    <div class="mt-20 pt-16" style="background-image: url('https://cohet.vn/upload/data/images/BACKGROUND-%202-TECK/hinh-nen-one-piece_102505879.jpg'); min-height: 600px; font-family: Raleway;">
        <div class="w-2/3 md:w-1/2 xl:w-1/3 px-10 py-4 flex-col m-auto bg-black/[.5] text-center text-white rounded">
            <div class="font-light text-xl">Đăng nhập</div>
            <div class="mt-4">
                <input class="placeholder:text-sm rounded w-5/6  h-8 text-black px-5"
                        type="text" name="username" id="username" placeholder="Tài khoản">
                </div>
            <div class="mt-3">
                <input class="placeholder:text-sm rounded w-5/6 h-8 text-black px-5"
                        type="password" name="password" id="password" placeholder="Mật khẩu">
            </div>
            @error('username')
                <div class="pt-2 text-sm" style="color: red;">
                    {{$message}}
                </div>
            @enderror
            <div class="mt-5">
                <input type="submit" class="m-auto w-5/6 py-1 px-2 bg-orange-600 rounded-md text-center
                    hover:bg-orange-500" value="Đăng nhập">
            </div>
            <div class="mt-4 m-auto flex justify-between w-5/6 text-xs">
                <div class="italic hover:underline"><a href="{{ route('account.password.forget')}}">  Quên mật khẩu ? </a></div>
            </div>
            <div class="mt-3 w-5/6 m-auto">
                <div class="strike">
                    <span class="text-xs">hoặc</span>
                </div>
            </div>
            <div class="mt-3 text-xs">Nếu bạn chưa là thành viên, <a href="{{route('client.register.index')}}" class="text-orange-500 hover:underline">đăng ký</a> tại đây !</div>
        </div>
    </div>
</form>
@endsection

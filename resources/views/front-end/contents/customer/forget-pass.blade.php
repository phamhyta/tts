@extends('front-end.app')
@section('content')
<div class="mt-20 bg-gray-100">
        <form action="{{route('account.password.forgetstore')}}" method="POST" role="form">
            @csrf
            <div class="grid justify-items-stretch p-2">
                <div class="mt-10 text-center text-orange-600 font-bold text-xl">
                    Lấy lại mật khẩu
                </div>
                <div class="justify-self-center sm:w-2/3 md:w-7/12 p-2 w-full drop-shadow-md bg-white mt-4 mb-5 rounded-md">
                    <div class="md:ml-8 mt-2 md:mr-8 lg:mt-8">
                        <div class="font-bold text-center">Nhập Email mà bạn đã đăng ký tài khoản</div>
                        <div class="">
                            <input class="w-full mt-1 mb-4 text-black text-sm outline-none border border-1 py-2 pl-2 rounded" id="email" name="email" type="email">
                            @error('email') <small class="help-block">{{$message}}</small> @enderror
                            @if (session('yes'))
                            <div class="alert text-center alert-success">
                                <p>{{ session('yes') }}</p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="justify-self-center py-8">
                    <button type="submit" class="px-3 py-2 hover:bg-black rounded bg-orange-600 text-md text-white font-bold">Gửi mail xác nhận</button>
                </div>
            </div>
        </form>
   
</div>
@endsection
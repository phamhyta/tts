@extends('front-end.app')
@section('content')
<form method="POST" action="{{ route('client.register.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="mt-20 pt-10 pb-20" style="background-image: url('https://cohet.vn/upload/data/images/BACKGROUND-%202-TECK/hinh-nen-one-piece_102505879.jpg'); min-height:600px">
        <div class="px-10 py-6 flex-col justify-center w-11/12 md-7/12 xl:w-5/12 bg-white m-auto rounded" style="color: #383838;">
            <div class="font-bold text-lg text-center" style="color: #EF562D">Đăng ký</div>
            {{-- username --}}
            <div class="mt-6 text-center">
                <input class="placeholder:text-sm px-3 rounded w-5/6 h-8" type="text" id="username" name="username"
                        placeholder="Tên tài khoản" style="border:solid 1px #BABABA"
                        value="{{old('username')}}" required>
                @error('username')
                <div style="color: red;">
                    {{$message}}
                </div>
                @enderror
            </div>
            {{-- email --}}
            <div class="mt-3 text-center">
                <input class="placeholder:text-sm px-3 rounded w-5/6 h-8" id="email" name="email" type="email"
                        placeholder="Địa chỉ email" style="border:solid 1px #BABABA"
                        value="{{old('email')}}" required>
                @error('email')
                <div style="color: red;">
                    {{$message}}
                </div>
                @enderror
            </div>
            {{-- password --}}
            <div class="mt-3 m-auto w-5/6 flex justify-between">
                <div>
                    <input class="placeholder:text-sm px-3 rounded w-11/12 h-8" id="password" name="password" type="password"
                            placeholder="Mật khẩu" style="border:solid 1px #BABABA">
                    @error('password')
                    <div style="color: red;">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                {{-- confirm password --}}
                <div class="flex justify-end">
                    <input class="placeholder:text-sm px-3 rounded w-11/12 h-8"
                        id="password_confirmation" name="password_confirmation" type="password"
                        placeholder="Nhập lại mật khẩu" style="border:solid 1px #BABABA">
                </div>
            </div>
            {{-- full_name --}}
            <div class="mt-3 text-center">
                <input class="placeholder:text-sm px-3 rounded w-5/6 h-8" type="text" id="full_name" name="full_name"
                        placeholder="Họ tên đầy đủ" style="border:solid 1px #BABABA"
                        value="{{old('full_name')}}" required>
                @error('full_name')
                <div style="color: red;">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="mt-6 m-auto w-5/6 text-xs">
                <input type="checkbox" class="mr-1" style="accent-color: #f97316;" required>
                Tôi đồng ý với các điều khoản, điều kiện & chính sách
            </div>
            <div class="mt-5 w-5/6 m-auto">
                <input type="submit"
                    class="text-white w-full py-1 px-2 bg-orange-600 rounded-md text-center hover:bg-orange-500"
                    value="Đăng ký" style="font-family: Raleway">
            </div>
        </div>
    </div>
</form>
@endsection

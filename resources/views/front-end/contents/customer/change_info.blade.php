@extends('front-end.app')
@section('content')

<form method="POST" action="{{ route('client.change-info.update') }}" enctype="multipart/form-data">
    @csrf
    <div class="mt-20 bg-gray-100">
        <div class="md:mx-12 flex">
            <div class="hidden lg:block w-1/6 mt-24">
                <img src="{{ asset('images/front-end/quang-cao-1.png') }}"alt="">
            </div>
            <div class="w-full lg:w-2/3">
                <div class="mt-10 text-center text-orange-600 font-bold text-xl">
                    Thông tin cá nhân
                </div>
                <div class="md:mx-12 p-2 drop-shadow-md bg-white mt-7 mb-5 rounded-md">
                    <div class="md:flex mx-3">
                        <div class="md:w-1/4 lg:ml-12 mt-8 font-bold">Họ và tên</div>
                        <div class="md:w-2/3 md:pr-8 lg:pr-16">
                            <input class="w-full pl-4 md:mt-8 text-black text-sm outline-none border border-1 py-2 pl-2 rounded" type="text"
                            id="full_name" name="full_name"
                            value="{{ $full_name[0]->full_name }}" required>
                        </div>
                    </div>
                    <div class="md:flex mx-3">
                        <div class="md:w-1/4 lg:ml-12 mt-8 font-bold">Tên đăng nhập</div>
                        <div class="md:w-2/3 md:pr-8 lg:pr-16">
                            <input class="w-full pl-4 md:mt-8 text-black text-sm outline-none border border-1 py-2 pl-2 rounded" type="text"
                            id="username" name="username"
                            value="{{ $full_name[0]->username }}" required>
                        </div>
                    </div>
                    <div class="md:flex mx-3">
                        <div class="md:w-1/4 lg:ml-12 mt-3 sm:mt-8 font-bold">Địa chỉ Email</div>
                        <div class="md:w-2/3 md:pr-16">
                            <input class="w-full pl-4 md:mt-4 text-black text-sm outline-none border border-1 py-2 pl-2 rounded" type="text"
                            id="email" name="email" type="email"
                            value="{{ $full_name[0]->email }}" required>
                            @error('email')
                            <div style="color: red;">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="py-2 mb-6 md:py-8 grid justify-items-stretch">
                <div class="justify-self-center">
                    <input type="submit"
                    class="md:px-6 px-28 py-2 hover:bg-black rounded bg-orange-600 text-md text-white font-bold"
                    value="Lưu lại">
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

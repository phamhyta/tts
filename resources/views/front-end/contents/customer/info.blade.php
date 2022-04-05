@extends('front-end.app')
@section('content')

<form method="POST" action="" enctype="multipart/form-data">
    @csrf
    <div class="mt-20 bg-gray-100">
        <div class="justify-between md:mx-12 flex">
            <div class="w-full lg:w-2/3">
                    @if (session('success'))
                        <div class="alert text-center pt-4 alert-success">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
                <div class="md:mx-12 p-2 drop-shadow-md bg-white mt-7 mb-5 rounded-md">
                    <div class="md:flex mx-3">
                        <div class="md:w-1/4 lg:ml-12 mt-8 font-bold">Họ và tên</div>
                        <div class="md:w-2/3 md:pr-8 lg:pr-16">
                            <input class="w-full pl-4 md:mt-8 text-black text-sm outline-none border border-1 py-2 pl-2 rounded" type="text" 
                            id="full_name" name="full_name"
                            value="{{ $full_name[0] -> full_name}}" readonly>
                        </div>
                    </div>
                    <div class="md:flex mx-3">
                        <div class="md:w-1/4 lg:ml-12 mt-8 font-bold">Username</div>
                        <div class="md:w-2/3 md:pr-8 lg:pr-16">
                            <input class="w-full pl-4 md:mt-8 text-black text-sm outline-none border border-1 py-2 pl-2 rounded" type="text" 
                            id="username" name="username"
                            value="{{ $full_name[0] -> username}}" readonly>
                        </div>
                    </div>
                    <div class="md:flex mx-3">
                        <div class="md:w-1/4 lg:ml-12 mt-3 sm:mt-8 font-bold">Địa chỉ Email</div>
                        <div class="md:w-2/3 md:pr-16">
                            <input class="w-full pl-4 md:mt-4 text-black text-sm outline-none border border-1 py-2 pl-2 rounded" type="text" 
                            id="email" name="email" type="email"
                            value="{{ $full_name[0]->email }}" readonly>
                        </div>
                    </div>
                    <div class="md:flex mx-3">
                        <div class="md:w-1/4 lg:ml-12 mt-2 md:mt-8 font-bold">Thay đổi mật khẩu</div>
                        <div class="md:w-1/2 md:mt-8 md:pr-16">
                            <a href="" class="text-orange-600 hover:text-gray-500 font-bold">Chỉnh sửa</a>
                        </div>
                    </div>
                    <div class="md:flex mx-3">
                        <div class="md:w-1/4 lg:ml-12 mt-2 md:mt-8 font-bold">Thay đổi thong tin</div>
                        <div class="md:w-1/2 md:mt-8 md:pr-16">
                            <a href="{{ route('client.change-info.index') }}" class="text-orange-600 hover:text-gray-500 font-bold">Chỉnh sửa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection

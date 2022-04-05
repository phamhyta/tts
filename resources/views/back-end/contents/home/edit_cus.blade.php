@extends('back-end.app')
@section('content')
<div class="flex-1 h-full overflow-x-hidden overflow-y-auto ">
    <main>
        <div class="flex items-center pt-20 justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Customer | Edit</h1>
        </div>
        <!-- Content -->
        <div>
            <form class=" rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{route('admin.cus.edit', ['id' => $customer->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" >
                        Họ tên đầy đủ
                        <span class=" text-base">*</span>
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 
                                leading-tight focus:outline-none focus:shadow-outline text-dark" 
                    id="full_name" name="full_name" type="text" placeholder="Nhập tên" 
                    value="{{ $customer->full_name }}" required>
                </div>
                @error('full_name')
                <div style="color: red;">
                    {{$message}}
                </div>
                @enderror   
                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-6">
                        <label class="block text-sm font-bold mb-2" >
                            Tên đăng nhập
                            <span class=" text-base">*</span>
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 
                                    leading-tight focus:outline-none focus:shadow-outline text-dark"
                                id="username" name="username" type="text" placeholder="Nhập tên đăng nhập"
                                value="{{ $customer->username }}" required>
                    </div>
                    @error('username')
                    <div style="color: red;">
                        {{$message}}
                    </div>
                    @enderror

                    <div class="mb-6">
                        <label class="block  text-sm font-bold mb-2" >
                            Email
                            <span class="text-base">*</span>
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 
                                    leading-tight focus:outline-none focus:shadow-outline text-dark"
                                id="email" name="email" type="email" placeholder="Nhập email"
                                value="{{ $customer->email }}" required>
                    </div>
                    @error('email')
                    <div style="color: red;">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <button class=" border-2 font-bold py-2 px-4 rounded-xl focus:outline-none focus:shadow-outline dark:hover:bg-primary-darker hover:bg-gray-300" type="submit">
                        Cập nhật
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
@endsection
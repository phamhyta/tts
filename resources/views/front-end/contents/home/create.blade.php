@extends('front-end.app')
@section('content')
<div class="mt-20 flex">
    <form class=" w-10/12 rounded px-8 pt-6 pb-8 mb-4 flex justify-between" method="POST"
    action="{{ route('client.create.store') }}" enctype="multipart/form-data"
    id="form-id">
        @csrf
        <div class="w-3/4 mr-10 flex-col">
            <div class="border rounded-xl bg-white p-7 mb-10">
                <div class="text-center mb-5 text-4xl font-semibold" style="color: #EF562D;">
                    Đăng tin
                </div>
                <div class="font-semibold text-lg mb-2" style="color: #696969;">
                    Thông tin bài viết
                </div>
                <div class="mb-4">
                    <label class="block text-base font-bold mb-2 text-black" >
                        Tiêu đề
                        <span class=" text-base">*</span>
                    </label>
                    <textarea name="title" id="title"
                            class="w-full border border-gray-300 rounded resize-none outline-none p-2 text-black mb-2" rows="2"
                            placeholder="VD: Bán nhà riêng 50m2 chính chủ Cầu Giấy" required></textarea>
                    <div style="color: #888686;" class="text-sm">
                        Tối thiểu 30 ký tự, tối đa 99 ký tự
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-base font-bold mb-2 text-black" >
                        Mô tả
                        <span class=" text-base">*</span>
                    </label>
                    <textarea name="content" id="content"
                            class="w-full border border-gray-300 rounded resize-none outline-none p-2 text-black mb-2" rows="5"
                            placeholder="Ví dụ : Khu nhà có vị trị thuận lợi, gần công viên, gần trường học"
                            required></textarea>
                    <div style="color: #888686;" class="text-sm">
                        Tối thiểu 30 ký tự, tối đa 3.000 ký tự
                    </div>
                </div>

                <script src="{{ asset('js/frontend/estateForm/ckeditor.js') }}"></script>
            </div>
            <div class="border rounded-xl bg-white p-7 mb-10 text-black">
                <div class="mb-4 text-lg font-medium" style="color: #696969;">
                    Thông tin liên hệ
                </div>

                <div class="mb-6 grid grid-cols-2 gap-4">
                    <div>
                        <label class="block  text-base font-bold mb-2 text-black" >
                            Tên liên hệ
                        </label>
                        <input class="border border-gray-300 rounded outline-none text-black py-2.5 px-3 w-full text-sm"
                        id="contact_name" name="contact_name"
                        type="text" placeholder="Tên liên hệ"
                        value="{{ $full_name[0] ->full_name }}" required>
                    </div>

                    <div>
                        <label class="block  text-base font-bold mb-2 text-black" >
                            Email
                        </label>
                        <input class="border border-gray-300 rounded outline-none text-black py-2.5 px-3 w-full text-sm"
                            id="email" name="email" type="email"
                            value="{{ $full_name[0]->email }}" placeholder="Email" required>
                    </div>

                </div>
            </div>
            <button class="border rounded-xl mb-10 text-white w-full py-2 text-xl font-semibold hover:bg-white" style="border-color: #EF562D; background: #EF562D;" type="submit">
                Đăng tin
            </button>

        </div>
    </form>
</div>
@endsection

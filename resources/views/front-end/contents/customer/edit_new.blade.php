@extends('front-end.app')
@section('content')
<div class="flex-1 h-full overflow-x-hidden overflow-y-auto ">
    <main>
        <div class="flex items-center pt-20 justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold">Chỉnh sửa tin: </h1>
        </div>
        <!-- Content -->
        <div>
            <form class=" rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{route('client.news.store', ['id' => $new[0]->id])}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" >
                        Tiêu đề
                        <span class=" text-base">*</span>
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 
                                leading-tight focus:outline-none focus:shadow-outline text-dark" 
                    id="title" name="title" type="text" placeholder="" 
                    value="{{ $new[0]->title }}" required>
                </div> 
                <div class="mb-4">
                    <label class="block text-sm font-bold mb-2" >
                        Nội dung
                        <span class=" text-base">*</span>
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 
                                leading-tight focus:outline-none focus:shadow-outline text-dark" 
                    id="content" name="content" type="text" placeholder="" 
                    value="{{ $new[0]->content }}" required>
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
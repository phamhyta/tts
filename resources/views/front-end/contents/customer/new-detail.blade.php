@extends('front-end.app')
@section('content')
<div class="flex-1 h-full overflow-x-hidden overflow-y-auto ">
    <main>
        <div class="flex items-center pt-20 justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
            <h1 class="text-2xl font-semibold"> Thông tin chi tiết: </h1>
        </div>
        <!-- Content -->
        <div>
            <div class="w-full ml-2 px-4 xl:px-0 xl:w-11/12 2xl:w-7/12 mr-6">
                <p class="font-bold text-orange-700 mb-1 mt-3">
                    {{ $new -> title }}
                </p>
                <p class="mt-3">
                    {{ $new->content }}
                </p>
                <div class="text-sm mt-3 text-gray-600">
                    Tác giả: {{ $new->full_name }}
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
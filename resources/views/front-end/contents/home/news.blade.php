@extends('front-end.app')
@section('content')
    <div class="mt-20">
        <div class="w-1/4 pt-20">
            <form action="{{route('client.search')}}" method="POST">
                {{ csrf_field() }}
                <div class="relative flex bg-gray-300 p-2 mt-4 ml-4 rounded-3xl text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-0 ml-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                    </svg>
                    <input type="text" name="keyword_submit" placeholder="Search..." class="w-full pl-2 ml-10 outline-none"> 
                    <input type="submit" hidden="true" />
                </div>
            </form>
        </div>
        <div class="w-11/12 md:w-3/4 m-auto pt-6 xl:flex-row justify-between">
        @foreach ($news as $news)   
            <div class="w-full myBox m-auto border border-gray-400 mt-7 flex-col xl:flex-row xl:flex justify-between mb-10 shadow">
                <a href="" class="flex">
                    <div class="w-full ml-2 px-4 xl:px-0 xl:w-11/12 2xl:w-7/12 mr-6">
                        <p class="font-bold text-orange-700 mb-1 mt-3">
                            {{ $news -> title }}
                        </p>
                        <p class="mt-3">
                            {{ $news->content }}
                        </p>
                    </div>
                </a>
            </div>
        @endforeach
        </div>
    </div>
@endsection

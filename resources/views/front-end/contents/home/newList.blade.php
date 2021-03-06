@extends('front-end.app')
@section('content')
<div class="pt-20">
    <div class="w-1/4 pt-20">
            <form action="{{route('client.create.search')}}" method="POST">
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
</div>
<div class="flex-1 pt-4 h-full overflow-x-hidden overflow-y-auto ">
        @if (session('success'))
            <div class="alert text-center pt-4 alert-success">
                <p>{{ session('success') }}</p>
            </div>
        @endif
    <div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
        <h1 class="text-2xl font-semibold">News manager</h1>
    </div>
    <div class="h-screen">
        <div class="mt-2">
            <table class=" w-10/12  mx-auto table-fixed">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6 text-left">Tieu de</th>
                        <th class="py-3 px-6 text-left">Noi dung</th>
                        <th class="py-3 px-6 text-left">Ngay tao tin</th>
                        <th class="py-3 px-6 text-center">Xoa</th>
                    </tr>
                </thead>
                <tbody class="text-sm font-light">
                    @foreach($news as $new)
                    <tr class="border-b border-gray-200 hover:bg-gray-100 hover:text-black">
                        <td class="py-3 px-6 text-center whitespace-nowrap">
                            <div class="flex items-center">
                                <a href="{{route('client.news.edit',['id' => $new->id])}}" name="title" class="align-middle hover:text-gray-400 border-b-2 border-gray-800">
                                    <span class="font-medium">{{$new->title}}</span>
                                </a>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center whitespace-nowrap">
                            <div class="flex items-center">
                                <span class="font-medium">{{$new->content}}</span>
                            </div>
                        </td>
                        <td class="py-3 px-1 text-center">
                            <div class="flex items-center">
                                <span class="font-medium truncate overflow-hidden whitespace-nowrap">{{$new->created_at}}</span>
                            </div>
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <a onclick="return confirm('B???n c?? ch???c l?? mu???n x??a tin n??y?')" href="{{ route('client.news.del', ['id' => $new->id]) }}" 
                                class="active" ui-toggle-class=""><i class="fa fa-times text-danger text"></i></a>  
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

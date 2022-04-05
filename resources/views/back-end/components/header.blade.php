<div class="h-20 w-full flex bg-white text-black border-b-2 border-red-600 z-20 justify-between top-0 fixed">
    <div class="my-auto text-center w-11/12 lg:w-3/12 text-3xl text-orange-600 font-black"><a href="/admin/manager">ADMIN</a></div>
    <div class="w-1/4">
        @if(auth('admin') -> id())
            <div class="hidden lg:block my-auto w-full pt-4 pr-16 font-medium dropdown relative">
                <div class="flex justify-end ">
                    <div class="flex items-center">
                        <img class="inline object-cover w-10 h-10 ring-2 mr-2 rounded-full" src="https://images.pexels.com/photos/2589653/pexels-photo-2589653.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="Profile image"/>
                        <a href="">
                            {{ $full_name[0] -> full_name }}
                        </a>
                    </div>
                </div>
                <ul class="dropdown-menu absolute pt-5 right-0 bg-white ">
                    <li class="">
                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="rounded-b py-2 px-4 block whitespace-no-wrap hover:text-orange-600 font-semibold">
                                Đăng xuất
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            @else
            <div class="hidden w-11/12 mr-12 lg:block mt-4 font-medium">
                <ul class="flex justify-end">
                    <a href="{{ route('admin.login.index') }}"><li class=" mt-1 text-right pr-4 hover:text-orange-600">Đăng nhập</li></a>
                    <a href="{{ route('admin.register.index') }}"><li class="py-1 px-2 text-white bg-orange-600 rounded-md text-center hover:bg-orange-500">
                        Đăng ký
                    </li></a>
                </ul>
            </div>
        @endif
    </div>
</div>



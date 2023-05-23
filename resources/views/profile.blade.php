@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-2 gap-[50px]">
        <div class="flex justify-center">
            <div class="mt-[160px] w-full rounded-[30px] bg-white p-[60px] shadow-xl">
                <div class="mb-[30px] flex justify-between">
                    <div class="text-center">
                        <div class="text-[33px] font-semibold">{{ $b_count }}</div>
                        <div class="text-[18px] font-medium">library books</div>
                    </div>
                    <div class="text-center">
                        <div class="text-[33px] font-semibold">{{ $e_count }}</div>
                        <div class="text-[18px] font-medium">e-books</div>
                    </div>
                </div>
                <div class="text-center text-[28px] font-semibold mb-[30px]">{{ $user->full_name }}</div>
                <form action="{{ route('profile.update') }}" method="post">
                    @csrf
                    <div class="space-y-[26px] flex flex-col justify-center items-center">
                        <div class="flex items-center justify-between gap-[10px] w-full">
                            <span class="text-[23px] font-medium">ID</span>
                            <input name="id" value="{{ str_replace('@iitu.edu.kz', '', $user->email) }}" type="text" class="h-[65px] w-[75%] rounded-[45px] bg-[#EEEEEE] px-[50px] text-[23px]" placeholder="ID" disabled/>
                        </div>
                        <div class="flex items-center justify-between gap-[10px] w-full">
                            <span class="text-[23px] font-medium">Email</span>
                            <input name="email" value="{{ $user->email }}" type="text" class="h-[65px] w-[75%] rounded-[45px] bg-[#EEEEEE] px-[50px] text-[23px]" placeholder="Email" disabled/>
                        </div>
                        <div class="flex items-center justify-between gap-[10px] w-full">
                            <span class="text-[23px] font-medium">Phone</span>
                            <input name="phone" value="{{ $user->phone }}" type="text" class="h-[65px] w-[75%] rounded-[45px] bg-[#EEEEEE] px-[50px] text-[23px]" placeholder="Phone" {{ Route::is('profile.index') ? 'disabled' : '' }}/>
                        </div>
                        @if(Route::is('profile.index'))
                            <a class="grid place-content-center w-[400px] h-[64px] rounded-[50px] bg-[#9F1F19] font-bold text-[30px] text-white" href="{{ route('profile.edit') }}">
                                Edit
                            </a>
                        @endif
                        @if(Route::is('profile.edit'))
                            <button class="grid place-content-center w-[400px] h-[64px] rounded-[50px] bg-[#9F1F19] font-bold text-[30px] text-white" type="submit">
                                Save
                            </button>
                        @endif
                    </div>
                </form>
            </div>
            <img class="absolute z-10 h-[250px] w-[250px] rounded-full border-[6px] border-[#9F1F19] p-[10px]" src="{{ $user->image }}" alt="book"/>
        </div>
        <div class="pt-[110px]">
            <div class="mt-[40px]">
                <div class="mb-[30px] text-[28px] font-semibold">e-books you’ve read</div>
                <div class="flex-col space-y-[20px]">
                    @foreach($book_orders as $book_order)
                        @if($book_order->type == 1)
                            <a class="flex" href="{{ $book_order->book->url }}" target="_blank">
                                <div class="flex items-center">
                                    <img class="h-[230px] w-[220px] rounded-[20px]" src="{{ $book_order->book->image }}" alt="book"/>
                                    <div class="h-[200px] shadow-xl w-full rounded-r-[30px] bg-white p-[20px]">
                                        <div class="text-[26px] font-semibold">{{ $book_order->book->name }}</div>
                                        <div class="text-[16px] line-clamp-3">{{ $book_order->book->body }}</div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="mt-[40px]">
                <div class="mb-[30px] text-[28px] font-semibold">Books on hand</div>
                <div class="flex-col space-y-[20px]">
                    @foreach($book_orders as $book_order)
                        @if($book_order->type == 2)
                            <div class="flex items-center">
                                <img class="h-[230px] w-[220px] rounded-[20px]" src="{{ $book_order->book->image }}" alt="book"/>
                                <div class="h-[200px] shadow-xl w-full rounded-r-[30px] bg-white p-[20px] flex flex-col justify-between">
                                    <div>
                                        <div class="text-[26px] font-semibold">{{ $book_order->book->name }}</div>
                                        <div class="text-[16px] line-clamp-3">{{ $book_order->book->body }}</div>
                                    </div>
                                    <div class="text-[18px] text-[#9F1F19] font-bold"><span class="font-normal">Return date: </span>{{ Carbon\Carbon::parse($book_order->back)->format('d.m.Y') }}</div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <button id="myBtn" class="mt-[35px] flex h-[80px] w-full items-center justify-center rounded-[45px] bg-[#9F1F19] text-[30px] font-bold text-white">Show Library card</button>
    <div id="myModal" class="fixed top-0 left-0 overflow-auto bg-gray-500 bg-opacity-50 w-full h-full" style="display: none;">
        <div class="flex items-center justify-center h-full">
            <div class="w-[450px] bg-white rounded-[30px] px-[30px] pb-[20px]">
                <span class="close cursor-pointer text-[50px] flex justify-end">&times;</span>
                <img src="{{ $user->library_card }}" class="w-full" alt="img">
            </div>
        </div>
    </div>

    <script>
        var modal = document.getElementById("myModal");
        var btn = document.getElementById("myBtn");
        var span = document.getElementsByClassName("close")[0];
        btn.onclick = function () {
            modal.style.display = "block";
        }
        span.onclick = function () {
            modal.style.display = "none";
        }
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
@endsection

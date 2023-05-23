@extends('layouts.app')

@section('content')
	@if(auth()->user()->type == 0)
		<div class="flex flex-col">
			<div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
				<div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
					<div class="overflow-hidden">
						<table class="min-w-full text-left text-sm font-light">
							<thead class="border-b font-medium dark:border-neutral-500">
							<tr>
								<th scope="col" class="px-6 py-4">#</th>
								<th scope="col" class="px-6 py-4">Book name</th>
								<th scope="col" class="px-6 py-4">User name</th>
								<th scope="col" class="px-6 py-4">Handle</th>
							</tr>
							</thead>
							<tbody>
							@foreach($book_orders as $item)
								<tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
									<td class="whitespace-nowrap px-6 py-4 font-medium">{{ $item->id }}</td>
									<td class="whitespace-nowrap px-6 py-4">{{ $item->book->name }}</td>
									<td class="whitespace-nowrap px-6 py-4">{{ $item->user->full_name }}</td>
									<td class="whitespace-nowrap px-6 py-4">
										<form action="{{ route('reciver', $item->id) }}" method="post">
											@csrf
											<button type="submit" class="w-full h-[30px] rounded-[30px] bg-[#9F1F19] font-bold text-white text-[12px]">
												Start time
											</button>
										</form>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	@else
		<swiper-container class="mySwiper my-[80px]" pagination="true">
			<swiper-slide>
				<section class="grid grid-cols-2">
					<div class="mx-auto flex-col justify-center items-center">
						<h2 class="text-[45px] font-semibold mb-[20px]">
							Digital library of IITU
						</h2>
						<p class="text-[24px] mb-[30px]">
							You can easily borrow books, read their electronic versions and have an electronic library card with you
						</p>
						<div class="flex gap-[10px]">
							<a href="#" class="rounded-[30px] bg-[#9F1F19] w-[210px] h-[50px] grid place-content-center font-bold text-white text-[18px]">
								Read
							</a>
							<a href="#" class="rounded-[30px] bg-[#9F1F19] w-[210px] h-[50px] grid place-content-center font-bold text-white text-[18px]">
								Borrow
							</a>
						</div>
					</div>
					<div class="mx-auto">
						<img class="w-[450px] h-full" src="{{ asset('assets/img/hero_1.png') }}" alt="img"/>
					</div>
				</section>
			</swiper-slide>
			<swiper-slide>
				<section class="grid grid-cols-2">
					<div class="mx-auto flex-col justify-center items-center">
						<h2 class="text-[45px] font-semibold mb-[20px]">
							Download our app
						</h2>
						<p class="text-[24px] mb-[30px]">
							Using the application, you can borrow books from the library and read the electronic version of the book through the reader
						</p>
						<div class="flex gap-[10px]">
							<a href="#" class="rounded-[30px] bg-[#9F1F19] w-[210px] h-[50px] grid place-content-center font-bold text-white text-[18px]">
								Read
							</a>
							<a href="#" class="rounded-[30px] bg-[#9F1F19] w-[210px] h-[50px] grid place-content-center font-bold text-white text-[18px]">
								Borrow
							</a>
						</div>
					</div>
					<div class="mx-auto">
						<img class="w-[350px] h-full" src="{{ asset('assets/img/hero_2.png') }}" alt="img"/>
					</div>
				</section>
			</swiper-slide>
		</swiper-container>

        @livewire('show-category')
    @endif
@endsection

@extends('layouts.app')

@section('content')
	<div class="text-[25px] mb-[30px] font-semibold">Results of request</div>
	<div class="grid grid-cols-4 gap-[25px]">
		@foreach($books as $book)
			<div class="flex w-[300px] justify-center">
				<div class="pt-[170px]">
					<div class="rounded-[30px] px-[20px] pb-[35px] pt-[150px] shadow-xl">
						<div class="mb-[10px] text-[20px] font-semibold">{{ $book->name }}</div>
						<div class="mb-[15px] line-clamp-5 text-[18px]">{{ $book->body }}</div>
						<a href="{{ route('book.show', $book) }}" class="flex h-[45px] w-full items-center justify-center rounded-[20px] bg-[#9F1F19] font-bold text-white">Explore</a>
					</div>
				</div>
				<img class="absolute h-[300px] w-[210px] rounded-[20px]" src="{{ $book->image }}" alt="img"/>
			</div>
		@endforeach
	</div>
@endsection
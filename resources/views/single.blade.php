@extends('layouts.app')

@section('content')
	<div class="relative pt-[100px]">
		<div class="w-full rounded-[30px] bg-white px-[60px] py-[30px]">
			<div class="mb-[45px] pl-[260px]">
				<div class="text-[50px] font-semibold">{{ $book->name }}</div>
				<div class="mb-[15px] text-[40px] font-semibold text-[#9F1F19]">{{ $book->author }}</div>
				<div class="inline-block h-[40px] rounded-[10px] border border-[#9F1F19] px-[20px] text-[26px] text-[#9F1F19]">{{ $book->category->name }}</div>
			</div>
			<div class="mb-[45px] grid grid-cols-2 gap-[25px]">
				<a href="{{ route('read', $book) }}" target="_blank" class="flex h-[60px] items-center justify-center rounded-[10px] bg-[#9F1F19] text-[30px] font-semibold text-white">Read</a>
				<a href="{{ route('availability', $book) }}" class="flex h-[60px] items-center justify-center rounded-[10px] bg-[#9F1F19] text-[30px] font-semibold text-white">Availability</a>
			</div>
			<div>
				<div class="mb-[20px] text-[30px] font-semibold">About</div>
				<div class="text-[28px]">{{ $book->body }}</div>
			</div>
		</div>
		<img class="absolute left-[60px] top-0 h-[330px] w-[220px] rounded-[20px]" src="{{ $book->image }}" alt="book"/>
	</div>
@endsection

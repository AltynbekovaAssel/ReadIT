@extends('layouts.app')

@section('content')
	<section class="relative flex flex-wrap lg:h-screen lg:items-center">
		<div class="w-full px-4 py-12 sm:px-6 sm:py-16 lg:w-1/2 lg:px-8 lg:py-24">
			<div class="mx-auto max-w-lg text-center">
				<h1 class="text-[30px] font-semibold">Welcome<br/>Dear IITU student</h1>
				<p class="text-[16px] font-medium">Please enter your ID and Password</p>
			</div>
			<form action="{{ route('login') }}" method="post" class="mx-auto mb-0 mt-8 max-w-md space-y-4">
				@csrf
				<input name="email" type="email" class="w-full px-[50px] rounded-[30px] h-[55px] bg-[#EEEEEE]" placeholder="ID"/>
				<input name="password" type="password" class="w-full px-[50px] rounded-[30px] h-[55px] bg-[#EEEEEE]" placeholder="Password"/>
				<button type="submit" class="w-full h-[50px] rounded-[30px] bg-[#9F1F19] font-bold text-white text-[18px]">
					Login
				</button>
			</form>
		</div>
		<div class="relative bg-[#EEEEEE] h-64 w-full sm:h-96 lg:h-full lg:w-1/2">
			<img src="{{ asset('assets/img/autg_bg.svg') }}" class="absolute inset-0 h-full w-full object-cover" alt="Welcome"/>
		</div>
	</section>
@endsection

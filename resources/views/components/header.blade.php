<header class="pt-[50px] mb-[30px]">
	<div class="flex justify-between">
		<div>
			<a href="{{ route('home') }}">
				<img src="{{ asset('assets/img/logo.svg') }}" alt="logo">
			</a>
		</div>
		<div class="flex">
			<form action="{{ route('book.search') }}" method="post">
                @method('put')
                @csrf
				<input name="search" type="search" class="flex border rounded-[30px] px-[25px] w-[500px] h-[50px] mr-[12px] placeholder:text-[18px] border-black placeholder:text-black" placeholder="Search"/>
			</form>
			@auth
				<form action="{{ route('logout') }}" method="post">
					@csrf
					<button type="submit" class="bg-[#9F1F19] w-[260px] h-[50px] text-white rounded-[30px] grid place-content-center font-bold text-[18px] mr-[33px]">Log out</button>
				</form>
				<a href="{{ route('profile.index') }}">
					<img src="{{ asset('assets/img/person.png') }}" alt="">
				</a>
			@else
				<a href="{{ route('login') }}" class="bg-[#9F1F19] w-[260px] h-[50px] text-white rounded-[30px] grid place-content-center font-bold text-[18px]">Login</a>
			@endauth
		</div>
	</div>
</header>

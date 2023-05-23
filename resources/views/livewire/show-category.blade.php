<div>
    <div class="flex gap-[10px] overflow-x-auto mb-[43px] whitespace-nowrap">
        <button wire:click="category('0')" class="{{ $category_id == 0 ? 'bg-[#9F1F19] text-white' : '' }} rounded-[100px] px-[20px] py-[12px] text-[26px] font-medium">Popular Books</button>
        @foreach($categories as $category)
            <button wire:click="category('{{$category->id}}')" class="{{ $category_id == $category->id ? 'bg-[#9F1F19] text-white' : '' }} rounded-[100px] px-[20px] py-[12px] text-[26px] font-medium">{{ $category->name }}</button>
        @endforeach
    </div>
    <swiper-container class="mySwiper h-[600px]" navigation="true" space-between="25" slides-per-view="4">
        @foreach($books as $book)
            <swiper-slide>
                <div class="relative flex w-[300px] justify-center">
                    <div class="absolute top-[140px] rounded-[30px] px-[20px] pb-[35px] pt-[170px] shadow-xl">
                        <div class="mb-[10px] text-[20px] font-semibold line-clamp-1">{{ $book->name }}</div>
                        <div class="mb-[15px] text-[18px] line-clamp-5">{{ $book->body }}</div>
                        <a href="{{ route('book.show', $book) }}" class="flex h-[45px] w-full items-center justify-center rounded-[20px] bg-[#9F1F19] font-bold text-white">Explore</a>
                    </div>
                    <img class="relative h-[300px] w-[210px] rounded-[20px]" src="{{ $book->image }}" alt="img"/>
                </div>
            </swiper-slide>
        @endforeach
    </swiper-container>
</div>

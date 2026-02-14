<x-main-layout>
    <h1 class="pt-7 text-red-800 text-5xl text-center font-bold">Main page</h1>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    @php
        $filters = [
            '' => 'Latest',
            'popular_last_month' => 'Popular Last Month',
            'popular_last_6months' => 'Popular Last 6 Months',
            'highest_rated_last_month' => 'Highest Rated Last Month',
            'highest_rated_last_6months' => 'Highest Rated Last 6 Months',
        ];
    @endphp
    <div class="fixed top-0 left-0 bg-yellow-500  w-full">
        @foreach ($filters as $key => $label)
            <a href="{{ route('market.index', [...request()->query(), 'filter' => $key]) }}"
                class="bg-green-800  text-white sm:text-sm">{{ $label }}</a>
        @endforeach
    </div>
    <br>
    <a class="bg-black text-red-500 px-4 py-1 rounded-xl shadow-xl shadow-purple-600 fixed active:bg-green-400 active:text-black hover:scale-110 top-2 right-2"
        href="{{ route('market.create') }}">Create</a>
    <div class=" flex justify-center ">
        <div class="bg-purple-500 p-2 w-fit">
            <form action="{{ route('market.index') }}" class="bg-zinc-500 flex flex-col gap-2 px-5 py-2 rounded-sm"
                method="get">
                <input type="text" name="search"
                    class="bg-yellow-200 rounded-md  placeholder:text-right text-left placeholder:text-green-800"
                    value="{{ request('search') }}" placeholder="search" id="">

                <div class="flex gap-1">
                    <button
                        class="text-xl hover:scale-105 px-8 py-2 rounded-full bg-orange-700 text-white">search</button>
                    <a href="{{ route('market.index') }}"
                        class="bg-gray-200 px-5 py-2 rounded-md hover:bg-red-500 text-black w-fit">clear</a>
                </div>
            </form>
        </div>
    </div>
    <ul class="flex justify-center items-center gap-2 flex-col ">
        @forelse ($products as $product)
            <li class="border border-black w-fit bg-green-200 px-4 py-2">
                <a href="{{ route('market.show', $product) }}">
                    <div>
                        @if (Storage::disk('public')->exists($product->product_image))
                            <img class="h-20 mx-auto w-20" src="{{ Storage::url($product->product_image) }}"
                                alt="">
                        @endif
                        <p>{{ $product->title }}</p>
                        @if ($product->old_price)
                            <span class="line-through text-red-400 text-sm">{{ $product->old_price }}$</span>
                        @endif
                        <span class="text-2xl text-green-600 underline">{{ $product->price }}$</span>
                        <br>
                        <x-star-rating :rating="$product->reviews_avg_rating" />
                        <span class="text-2xl">
                            {{ $product->reviews_count }} rating
                        </span>
                        <x-like-button :market="$product" />
                    </div>
                </a>
            </li>
        @empty
            <p>There is NO products</p>
        @endforelse
    </ul>
</x-main-layout>

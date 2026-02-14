<x-main-layout>
    <div class="w-fit bg-orange-300 mx-auto mt-2  px-4 py-2 rounded-md">
        <h1 class="text-4xl text-black text-center mx-4 font-bold">{{ $market->title }}</h1>
    </div>

    <div class="mx-auto mt-4 flex flex-col gap-2 bg-gray-500 p-4 mb-4 rounded-md w-fit">
        <img src="{{ Storage::url($market->product_image) }}" class="w-36 h-63" alt="">
        <div class="flex gap-2 items-center">
            <p class="line-through text-white text-xl font-bold">old price: {{ $market->old_price }}</p>
            <p class="text-red-600 text-3xl font-bold">Price:{{ $market->price }}</p>
        </div>
        <div class="flex gap-3 items-center">
            <h2 class="text-4xl text-green-500 font-bold">{{ $market->type }}</h2>
            <h2 class="text-xl text-yellow-400 font-extrabold">contact us: {{ $market->phone_number }}</h2>
        </div>
        @if ($market->description)
            <p class="text-sm text-white w-15">{{ $market->description }}</p>
        @endif
    </div>
    <a class="bg-blue-500 px-8 py-2 rounded-full text-red-500 text-2xl hover:bg-green-500 fixed top-1 right-2"
        href="{{ route('market.edit', $market) }}">Edit</a>
    <form action="{{ route('market.destroy', $market) }}" method="post">
        @csrf
        @method('DELETE')
        <button
            class="bg-red-500 px-8 py-2 rounded-full text-black text-2xl hover:bg-green-500 fixed top-1 left-2">Delete</button>
    </form>
    <a class="bg-zinc-500 px-8 py-2 rounded-full text-red-500 text-2xl hover:bg-green-500 fixed bottom-2 left-1"
        href="{{ route('market.review.create', $market) }}">Add review</a>

    <div class=" flex flex-col gap-3">
        @forelse ($market->reviews as $item)
            <div class="bg-green-200 p-4  text-center">
                <p>{{ $item->review }}</p>
                <p>created at {{ $item->created_at->format('M d Y') }}</p>
                <x-star-rating :rating="$item->rating" />

            </div>

        @empty
            <p>There is no reviewss</p>
        @endforelse
    </div>
</x-main-layout>

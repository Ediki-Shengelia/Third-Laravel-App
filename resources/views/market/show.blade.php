<x-main-layout>
    <h1>{{ $market->title }}</h1>
    <img src="{{ Storage::url($market->product_image) }}" class="w-36 h-63" alt="">
    <p class="line-through">{{ $market->old_price }}</p>
    <p>{{ $market->price }}</p>
    <h2>{{ $market->type }}</h2>
    <h2>{{ $market->phone_number }}</h2>
    @if ($market->description)
        <p>{{ $market->description }}</p>
    @endif
    <a href="{{ route('market.edit', $market) }}">Edit</a>
    <form action="{{ route('market.destroy', $market) }}" method="post">
        @csrf
        @method('DELETE')
        <button>Delete</button>
    </form>
    <a href="{{ route('market.review.create', $market) }}">Add review</a>

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

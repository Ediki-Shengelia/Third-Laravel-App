<x-main-layout>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <h1>Main page</h1>
    <a href="{{ route('market.create') }}">Create</a>
    <ul>
        @forelse ($products as $product)
            <li>
                <a href="{{ route('market.show', $product) }}">
                    <div>
                        <img class="h-20 w-20" src="{{ Storage::url($product->product_image) }}" alt="">
                        <p>{{ $product->title }}</p>
                        @if ($product->old_price)
                            <span class="line-through">{{ $product->old_price }}</span>
                        @endif
                        <span>{{ $product->price }}</span>
                    </div>
                </a>
            </li>
        @empty
            <p>There is NO products</p>
        @endforelse
    </ul>
</x-main-layout>

<x-main-layout>
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
    <h1>Main page</h1>
    @php
        $filters = [
            '' => 'Latest',
            'popular_last_month' => 'Popular Last Month',
            'popular_last_6months' => 'Popular Last 6 Months',
            'highest_rated_last_month' => 'Highest Rated Last Month',
            'highest_rated_last_6months' => 'Highest Rated Last 6 Months',
        ];
    @endphp
    @foreach ($filters as $key => $label)
        <a href="{{ route('market.index', [...request()->query(), 'filter' => $key]) }}"
            class="bg-red-200">{{ $label }}</a>
    @endforeach
    <br>
    <a href="{{ route('market.create') }}">Create</a>
    <form action="{{ route('market.index') }}" method="get">
        <input type="text" name="search" value="{{ request('search') }}" id="">
        <button>search</button>
        <a href="{{ route('market.index') }}">clear</a>
    </form>

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

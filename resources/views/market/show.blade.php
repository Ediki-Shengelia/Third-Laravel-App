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
</x-main-layout>

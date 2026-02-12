<x-main-layout>
    <h1>{{ $market->title }}</h1>
    <form action="{{ route('market.update', $market) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <select name="type">
            <option value="">Select an option</option>

            @foreach ($raxac as $item)
                <option value="{{ $item }}" @selected(old('type', $market->type) == $item)>
                    {{ $item }}
                </option>
            @endforeach
        </select>

        @error('type')
            <div>{{ $message }}</div>
        @enderror

        <input placeholder="title" type="text" name="title" value="{{ $market->title }}" id="">
        @error('title')
            <p>{{ $message }}</p>
        @enderror
        <input type="number" name="price" value="{{ $market->price }}" placeholder="Current price" id="">
        @error('price')
            <p>{{ $message }}</p>
        @enderror
        <input type="number" name="old_price" value="{{ $market->old_price }}" placeholder="Old price" id="">
        @error('old_price')
            <p>{{ $message }}</p>
        @enderror
        <input type="file" name="product_image" id="">
        @error('product_image')
            <p>{{ $message }}</p>
        @enderror
        <input type="tel" name="phone_number" value="{{ $market->phone_number }}" id=""
            placeholder="Number">
        @error('phone_number')
            <p>{{ $message }}</p>
        @enderror
        <textarea name="description" placeholder="Description" id="" cols="20" rows="3">{{ $market->description }}</textarea>
        @error('description')
            <p>{{ $message }}</p>
        @enderror

        <input type="text" name="location" placeholder="LOcation" value="{{ $market->location }}" id="">
        @error('location')
            <p>{{ $message }}</p>
        @enderror
        <button>edit</button>
    </form>
</x-main-layout>

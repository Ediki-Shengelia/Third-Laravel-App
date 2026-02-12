<x-main-layout>
    <h1>Creating page</h1>
    <form action="{{ route('market.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <select name="type" id="">
            <option value="">Select an option</option>
            @foreach ($type as $item)
                <option value="{{ $item }}" {{ old('type') === $item ? 'selected' : '' }}>{{ $item }}
                </option>
            @endforeach
        </select>
        @error('type')
            <p>{{ $message }}</p>
        @enderror
        <input placeholder="title" type="text" name="title" value="{{ old('title') }}" required id="">
        @error('title')
            <p>{{ $message }}</p>
        @enderror
        <input type="number" name="price" value="{{ old('price') }}" placeholder="Current price" id=""
            required>
        @error('price')
            <p>{{ $message }}</p>
        @enderror
        <input type="number" name="old_price" value="{{ old('old_price') }}" placeholder="Old price" id="">
        @error('old_price')
            <p>{{ $message }}</p>
        @enderror
        <input type="file" name="product_image" required id="">
        @error('product_image')
            <p>{{ $message }}</p>
        @enderror
        <input type="tel" name="phone_number" value="{{ old('phone_number') }}" id="" required
            placeholder="Number">
        @error('phone_number')
            <p>{{ $message }}</p>
        @enderror
        <textarea name="description" placeholder="Description" id="" cols="20" rows="3">{{ old('description') }}</textarea>
        @error('description')
            <p>{{ $message }}</p>
        @enderror

        <input type="text" name="location" placeholder="LOcation" required value="{{ old('location') }}"
            id="">
        @error('location')
            <p>{{ $message }}</p>
        @enderror
        <button>create</button>
    </form>
</x-main-layout>

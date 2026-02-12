<x-main-layout>
    <div class="flex justify-center items-center h-screen">
        <div class="bg-gray-500 w-fit h-fit p-4 rounded-2xl shadow-2xl shadow-red-600">
            <h1 class="text-center text-yellow-300 mb-4  font-bold text-4xl">Creating page</h1>
            <form action="{{ route('market.store') }}"
                class="mx-auto p-4 rounded-xl flex flex-col gap-4 w-fit bg-zinc-300 h-fit" method="post"
                enctype="multipart/form-data">
                @csrf
                <select class="bg-green-100 text-red-500 hover:bg-yellow-200  rounded-md text-center" name="type"
                    id="">
                    <option value="">Select an option</option>
                    @foreach ($type as $item)
                        <option value="{{ $item }}" {{ old('type') === $item ? 'selected' : '' }}>
                            {{ $item }}
                        </option>
                    @endforeach
                </select>
                @error('type')
                    <p class="text-red-500 text-xl text-center">{{ $message }}</p>
                @enderror
                <input placeholder="title" type="text" name="title"
                    class="focus:outline-none bg-blue-200 rounded-sm placeholder:text-xl active:bg-zinc-950 active:text-white placeholder:text-red-500 placeholder:text-left text-right"
                    value="{{ old('title') }}" required id="">
                @error('title')
                    <p class="text-red-500 text-xl text-center">{{ $message }}</p>
                @enderror
                <input
                    class="focus:outline-none bg-blue-200 rounded-sm placeholder:text-xl active:bg-zinc-950 active:text-white placeholder:text-red-500 placeholder:text-left text-right"
                    type="number" name="price" value="{{ old('price') }}" placeholder="Current price" id=""
                    required>
                @error('price')
                    <p class="text-red-500 text-xl text-center">{{ $message }}</p>
                @enderror
                <input
                    class="focus:outline-none bg-blue-200 rounded-sm placeholder:text-xl active:bg-zinc-950 active:text-white placeholder:text-red-500 placeholder:text-left text-right"
                    type="number" name="old_price" value="{{ old('old_price') }}" placeholder="Old price"
                    id="">
                @error('old_price')
                    <p class="text-red-500 text-xl text-center">{{ $message }}</p>
                @enderror
                <input
                    class="focus:outline-none bg-blue-200 rounded-sm placeholder:text-xl active:bg-zinc-950 active:text-white placeholder:text-red-500 placeholder:text-left text-right"
                    type="file" name="product_image" required id="">
                @error('product_image')
                    <p class="text-red-500 text-xl text-center">{{ $message }}</p>
                @enderror
                <input
                    class="focus:outline-none bg-blue-200 rounded-sm placeholder:text-xl active:bg-zinc-950 active:text-white placeholder:text-red-500 placeholder:text-left text-right"
                    type="tel" name="phone_number" value="{{ old('phone_number') }}" id="" required
                    placeholder="Number">
                @error('phone_number')
                    <p class="text-red-500 text-xl text-center">{{ $message }}</p>
                @enderror
                <textarea
                    class="focus:outline-none bg-blue-200 rounded-sm placeholder:text-xl active:bg-zinc-950 active:text-white placeholder:text-red-500 placeholder:text-left text-right"
                    name="description" placeholder="Description" id="" cols="20" rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xl text-center">{{ $message }}</p>
                @enderror

                <input
                    class="focus:outline-none bg-blue-200 rounded-sm placeholder:text-xl active:bg-zinc-950 active:text-white placeholder:text-red-500 placeholder:text-left text-right"
                    type="text" name="location" placeholder="LOcation" required value="{{ old('location') }}"
                    id="">
                @error('location')
                    <p class="text-red-500 text-xl text-center">{{ $message }}</p>
                @enderror
                <button
                    class="bg-red-400 w-full text-white py-2 rounded-md hover:scale-105 hover:bg-slate-100 hover:text-black">create</button>
            </form>
        </div>
    </div>
</x-main-layout>

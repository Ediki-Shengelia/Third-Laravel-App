<x-main-layout>
    <h1>{{ $market->title }}</h1>
    <form action="{{ route('market.review.store', $market) }}" method="POST">
        @csrf

        <label for="rev">Review</label>
        <textarea name="review" name="rev" id="" cols="30" rows="10">{{ old('review') }}</textarea>
        <br>
        <label for="rating">Rating</label>
        <select name="rating" id="rating">
            <option value="">Add rating</option>
            @for ($i = 1; $i < 6; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
        <button>Add Review</button>
    </form>
</x-main-layout>

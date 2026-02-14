<form action="{{ route('like', $market) }}" method="post">
    @csrf
    <button>
        {{ $market->isLikedByUser(auth()->user()) ? '❤️' : '🤍' }}
        {{ $market->likes()->count() }}
    </button>
</form>

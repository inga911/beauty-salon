<form action="{{ route('back-vote', $specialist) }}" method="post">
    <div class="stars">
        @for ($i = 1; $i < 6; $i++)
            <input name="star[]" type="checkbox" id="_{{ $i . '-' . $specialist->id }}" data-star="{{ $i }}"
                {{ $specialist->rate >= $i ? 'checked' : '' }}>
            <label class="star{{ ceil($specialist->rate) == $i && $specialist->rate != $i ? ' half' : '' }}"
                for="_{{ $i . '-' . $specialist->id }}"></label>
        @endfor
        <div class="result">
            @if ($specialist->rate)
                {{ $specialist->rate }} <span>({{$specialist->votes}} votes)</span>
            @else
                <span>No ratings yet</span>
            @endif
        </div>
        @if ($specialist->showVoteButton)
            <button type="submit" class="btn btn-info">Vote</button>
        @endif
    </div>
    @csrf
    @method('put')
</form>

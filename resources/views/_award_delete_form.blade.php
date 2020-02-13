<form action="{{ route('delete_award') }}" method="POST">
    @csrf
    <input type="text" name="award_id" value="{{ $award->id }}" hidden>
    <button class="fa fa-window-close award-delete-button" type="submit"></button>
</form>
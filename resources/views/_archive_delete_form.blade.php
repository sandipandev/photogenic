<form action="{{ route('delete_archive') }}" method="POST">
    @csrf
    <input type="text" name="archive_id" value="{{ $archive->id }}" hidden>
    <button class="fa fa-window-close archive-delete-button" type="submit"></button>
</form>
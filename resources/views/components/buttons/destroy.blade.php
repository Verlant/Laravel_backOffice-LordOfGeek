<!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
<form method="POST" action="{{$action}}" class="btn-red">
    @method('DELETE')
    @csrf
    <button type="submit">{{ __('Delete') }}</button>
</form>
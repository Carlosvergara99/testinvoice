<form   method="post" action="{{ route('user.destroy', $user->id) }}">
   @csrf
   @method('DELETE')
   <button type="submit" class="btn btn-danger" onclick="return confirm('esta seguro de eliminar el usuario?')">Eliminar</button>
</form>
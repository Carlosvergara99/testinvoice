<form   method="post" action="{{ route('customer.destroy', $customer->id) }}">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Esta seguro de eliminar el Cliente ?')">Eliminar</button>
 </form>
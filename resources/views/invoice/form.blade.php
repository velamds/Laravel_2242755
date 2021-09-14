@extends('layout')

@section('title','New Invoice')
@section('encabezado','New Invoice')
@section('content')
<form action="{{ route('invoice.save') }}" method="post">
    @csrf
    <div class="mb-3 row">
        <label for="product" class="col-sm-2 col-form-label">Product</label>
        <div class="col-sm-6">
          <select name="product[]" id="product" class="form-select">
              @foreach ($products as $product)
                  <option value="{{$product->id}}">{{$product->name}}</option>
              @endforeach
          </select>
        </div>
        <div class="col-sm-2">
            <input type="number" name="quantity[]" class="form-control">
        </div>
        <div class="col-sm-2">
            <label for="" id="TotalProducto"></label>
        </div>
        @error('name')
          <p class="text-danger">
            {{ $message }}
          </p>
        @enderror
    </div>
    <div class="row">
      <div class="col-sm-11"></div>
      <div class="col-sm-1">
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
</form>
@endsection
@section('script')
<script>
    alert('hola')

    function addProduct(){
        
    }
</script>
@endsection
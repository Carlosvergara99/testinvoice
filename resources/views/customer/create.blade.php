@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Cliente</div>

                <div class="card-body">
                    
                    <form method="POST" action="{{ route('customer.store') }}">
                        @csrf
                        
                        <div class="row ">
                            <div class="form-group col-md-6">
                                <label  class="form-control-label"> Nombre</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="nombre">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
               
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="form-control-label">Nit</label>
                                <input id="nit" type="number" class="form-control @error('nit') is-invalid @enderror" name="nit" value="{{ old('nit') }}" required autocomplete="nit" placeholder="Nit">

                                @error('nit')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror                                  
                            </div>
                        </div>
                        <div class="row ">
                            <div class="form-group col-md-6">
                            <label  class="form-control-label"> Direccion</label>
                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Direccion">

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
        
                           </div>
                           <div class="form-group col-md-6">
                            <label for="" class="form-control-label">Cuidad</label>
                            <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" placeholder="Cuidad">

                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                           @enderror                                  
                         </div>
                        </div>

                        <div class="row ">
                        <div class="form-group col-md-6">
                                <label for="" class="form-control-label"></label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror                                  
                            </div>

                            <div class="form-group col-md-6">
                                <label for="" class="form-control-label">Telefono</label>
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Telefono">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror                                  
                           </div>
                        </div>
                        
                            <div class="row ">
                                <div  for="price" class=" form-group col-md-6">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                                   <button type="submit" class="btn btn-warning  float-right">Crear Cliente</button>
                                 </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
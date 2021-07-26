@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Usuario</div>

                <div class="card-body">
                    
                    <form method="post" action="{{ route('user.update', $user->id) }}">
                       @csrf
                       @method('PATCH')
                        
                        <div class="row ">
                            <div class="form-group col-md-6">
                                <label  class="form-control-label"> Nombre</label>
                                <input value="{{$user->name}}" name="name" type="text" class="form-control" required autocomplete="name" autofocus placeholder="nombre">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
               
                            </div>
                            <div class="form-group col-md-6">
                                <label for="" class="form-control-label">Email</label>
                                <input name="email" type="email" class="form-control" value="{{$user->email}}" required autocomplete="email" placeholder="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror                                  
                            </div>
                        </div>
                        
                        <div class="row ">
                            <div  for="password" class=" form-group col-md-6">
                                <span>Contraseña</span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password" placeholder="Contraseña">
                           
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                 @enderror
                            </div>

                            <div  for="password-confirm" class=" form-group col-md-6">
                                <span> Confirmar Contraseña</span>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Confirmar Contraseña">
                             </div>
                             

                        </div>
                            <div class="row ">
                                <div  for="price" class=" form-group col-md-6">
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                                   <button type="submit" class="btn btn-warning  float-right">Actualizar Usuario</button>
                                 </div>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
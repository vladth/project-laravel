@if(Auth::check())
    @if (Auth::user()->idrol == 1)    
       @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <span>Usuario no registrado revise el formulario y llene el formulario nuevamente.</span>
            </div>
       @endif
    <div class="form-group row">
                <label class="col-md-3 form-control-label" for="nombre">Nombre</label>
                <div class="col-md-9">
                    <input type="text" value="{{ old('nombre') }}" id="nombre" name="nombre" class="form-control" placeholder="Ingrese el Nombre" required  pattern="^[a-zA-Z_áéíóúñ°\s]{0,100}$" title="Solo se acepta letras y maximo 100 caracteres">
                    <div class="text-danger">
                        {!!$errors->first('nombre','<span class="help-block">:message</span>')!!}
                    </div>
                </div>
    </div>
    
    <div class="form-group row">
                <label class="col-md-3 form-control-label" for="direccion">Dirección</label>
                <div class="col-md-9">
                    <input type="text" value="{{ old('direccion') }}" id="direccion" name="direccion" class="form-control" placeholder="Ingrese la dirección" required pattern="^[a-zA-Z0-9_áéíóúñ°\s]*{0,70}$" title="Solo se acepta 70 caracteres">
                    <div class="text-danger">
                        {!!$errors->first('direccion','<span class="help-block">:message</span>')!!}
                    </div>
                </div>
    </div>

     <div class="form-group row">
            <label class="col-md-3 form-control-label" for="documento">Documento</label>
            
            <div class="col-md-9">
            
                <select class="form-control" name="tipo_documento" id="tipo_documento">
                                                
                    <option value="0" disabled>Seleccione</option>
                    <option value="CI">CI</option>
                    <option value="NIT">NIT</option>

                </select>
                <div class="text-danger">
                    {!!$errors->first('tipo_documento','<span class="help-block">:message</span>')!!}
                </div>
            </div>
                                       
    </div>
    
    
     <div class="form-group row">
                <label class="col-md-3 form-control-label" for="num_documento">Número documento</label>
                <div class="col-md-9">
                    <input type="text" value="{{ old('num_documento') }}" id="num_documento" name="num_documento" class="form-control" placeholder="Ingrese el número documento" required pattern="^[0-9\s]{0,20}$" title="Solo se acepta números y un maximo de 20 caracteres">
                    <div class="text-danger">
                        {!!$errors->first('num_documento','<span class="help-block">:message</span>')!!}
                    </div>
                </div>
    </div>

    <div class="form-group row">
            <label class="col-md-3 form-control-label" for="expedito">Expedido</label>
            
            <div class="col-md-9">
            
                <select class="form-control" name="expedito" id="expedito">
                                               
                    <option value="0" disabled>Seleccione</option>
                    <option value="LA PAZ">LA PAZ</option>
                    <option value="COCHABAMBA">COCHABAMBA</option>
                    <option value="CHUQUISACA">CHUQUISACA</option>
                    <option value="BENI">BENI</option>
                    <option value="ORURO">ORURO</option>
                    <option value="PANDO">PANDO</option>
                    <option value="POTOSI">POTOSI</option>
                    <option value="SANTA CRUZ">SANTA CRUZ</option>
                    <option value="TARIJA">TARIJA</option>
                    
                </select>
                <div class="text-danger">
                    {!!$errors->first('expedito','<span class="help-block">:message</span>')!!}
                </div>
            </div>
                                       
     </div>

    <div class="form-group row">
                <label class="col-md-3 form-control-label" for="telefono">Telefono</label>
                <div class="col-md-9">
                  
                    <input type="text" value="{{ old('telefono') }}" id="telefono" name="telefono" class="form-control" placeholder="Ingrese el telefono" required pattern="^[0-9\s]{0,20}$" title="Solo se acepta números y un maximo de 20 caracteres">
                    <div class="text-danger">
                        {!!$errors->first('telefono','<span class="help-block">:message</span>')!!}
                    </div>
                       
                </div>
    </div>

    <div class="form-group row">
                <label class="col-md-3 form-control-label" for="telefono">Correo</label>
                <div class="col-md-9">
                  
                <input type="email" value="{{ old('email') }}" class="form-control" id="email" name="email" placeholder="Ingrese el correo" required>
                    <div class="text-danger">
                        {!!$errors->first('email','<span class="help-block">:message</span>')!!}
                    </div>
                </div>
    </div>

     <div class="form-group row">
            <label class="col-md-3 form-control-label" for="rol">Rol</label>
            
            <div class="col-md-9">
            
                <select class="form-control" name="id_rol" id="id_rol">
                                                
                <option value="0" disabled>Seleccione</option>
                @foreach($roles as $rol)
                  
                   <option value="{{$rol->id}}">{{$rol->nombre}}</option>
                        
                @endforeach

                </select>
                    <div class="text-danger">
                        {!!$errors->first('id_rol','<span class="help-block">:message</span>')!!}
                    </div>
            </div>
                                       
    </div>

    <div class="form-group row">
                <label class="col-md-3 form-control-label" for="usuario">Usuario</label>
                <div class="col-md-9">
                  
                    <input type="text" value="{{ old('usuario') }}" id="usuario" name="usuario" class="form-control" placeholder="Ingrese el usuario" required pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,70}$" title="Solo se acepta 70 caracteres maximo">
                    <div class="text-danger">
                        {!!$errors->first('usuario','<span class="help-block">:message</span>')!!}
                    </div>  
                </div>
    </div>

     <div class="form-group row">
                <label class="col-md-3 form-control-label" for="password">Contraseña </label>
                <div class="col-md-9">
                  
                    <input type="password" value="{{ old('password') }}" id="password" name="password" class="form-control" placeholder="Ingrese la contraseña" required pattern="^[a-zA-Z0-9_áéíóúñ°\s]{0,30}$" title="Solo se acepta 30 caracteres">
                    <div class="text-danger">
                        {!!$errors->first('password','<span class="help-block">:message</span>')!!}
                    </div>
                </div>
    </div>

    <div class="form-group row">
                <label class="col-md-3 form-control-label" for="imagen">Imagen</label>
                <div class="col-md-9">
                  
                    <input type="file" id="imagen" name="imagen">
                       
                </div>
    </div>



    <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Cerrar</button>
        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>&nbsp;&nbsp;Guardar</button>
        
    </div>

@else
        <!-- Page Content -->
                
        <div class="hero-inner">
            <div class="content content-full">
                <div class="py-30 text-center">
                    <div class="display-3">
                        <h3 class="text-danger "><i class="fa fa-lock text-danger"></i> | 401</h3>
                    </div>
                    <h1 class="h2 font-w700 mt-30 mb-10 text-danger block-title">¡Vaya! Acabas de encontrar una página de error.</h1>
                    <h2 class="h3 font-w400 text-muted mb-20 text-info">Lo sentimos pero no está autorizado para acceder a esta página.</h2>
                    <a class="btn btn-hero btn-rounded btn-alt-secondary" href="{{url('/home')}}">
                                    <i class="fa fa-arrow-left mr-10"></i>
                    </a>
                </div>
            </div>
        </div>
            
    <!-- END Page Content -->
    @endif
@endif
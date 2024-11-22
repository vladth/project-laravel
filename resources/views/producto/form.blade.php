@if(Auth::check())
    @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2 or Auth::user()->idrol == 4)

    @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <span>Producto no registrado revise el formulario y llene el formulario nuevamente.</span>
            </div>
    @endif
    <div class="form-group row">
            <label class="col-md-3 form-control-label" for="titulo">Categoría</label>
            
            <div class="col-md-9">
            
                <select class="form-control" name="id" id="id">
                                                
                <option value="0" disabled>Seleccione</option>
                
                @foreach($categorias as $cat)
                  
                   <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                        
                @endforeach

                </select>
                
            </div>
                                       
    </div>
    
    
    <div class="form-group row">
                <label class="col-md-3 form-control-label" for="codigo">Código</label>
                <div class="col-md-9">
                    <input type="text" value="{{ old('codigo') }}" id="codigo" name="codigo" class="form-control" placeholder="Ingrese el Código" required pattern="^[a-zA-Z0-9_áéíóúñ°s]*{0,50}$" title="Solo se acepta 50 caracteres">
                    <div class="text-danger">
                        {!!$errors->first('codigo','<span class="help-block">:message</span>')!!}
                    </div>
                </div>
    </div>
    
    <div class="form-group row">
                <label class="col-md-3 form-control-label" for="stock">Stock</label>
                <div class="col-md-9">
                    <input type="text" id="stock" name="stock" class="form-control" placeholder="0" disabled>
                </div>
    </div>

     <div class="form-group row">
                <label class="col-md-3 form-control-label" for="nombre">Nombre</label>
                <div class="col-md-9">
                    <input type="text" value="{{ old('nombre') }}" id="nombre" name="nombre" class="form-control" placeholder="Ingrese la nombre" required  pattern="^[a-zA-Z_áéíóúñ°\s]*{0,60}$" title="Solo se acepta letras y maximo 60 caracteres">
                    <div class="text-danger">
                        {!!$errors->first('nombre','<span class="help-block">:message</span>')!!}
                    </div>
                </div>
    </div>

    <div class="form-group row">
                <label class="col-md-3 form-control-label" for="descripcion">Descripción</label>
                <div class="col-md-9">
                    <textarea class="form-control" type="text" value="{{ old('nombre') }}" id="descripcion" name="descripcion" rows="6" placeholder="Detalles del Producto" style="margin-top: 0px; margin-bottom: 0px; height: 80px;"></textarea required pattern="^[a-zA-Z0-9_áéíóúñ°\s]*{0,100}$" title="Solo se acepta 100 caracteres">
                    <div class="text-danger">
                        {!!$errors->first('descripcion','<span class="help-block">:message</span>')!!}
                    </div>
                </div>
    </div>

     <div class="form-group row">
                <label class="col-md-3 form-control-label" for="nombre">Precio Venta Unitario</label>
                <div class="col-md-9">
                    <input type="number" value="{{ old('nombre') }}" id="precio_venta" name="precio_venta" class="form-control" placeholder="Ingrese el precio venta" required pattern="[0-9'.]{0,20}$" title="Solo se acepta números" step="any">
                    <div class="text-danger">
                        {!!$errors->first('precio_venta','<span class="help-block">:message</span>')!!}
                    </div>
                </div>
    </div>

    <div class="form-group row">
                <label class="col-md-3 form-control-label" for="descuento">Descuento %</label>
                <div class="col-md-9">
                    <input type="number" value="{{ old('descuento') }}" id="descuento" name="descuento" class="form-control" placeholder="Ingrese Descuento" required pattern="[0-9]{0,3}$" title="Solo se acepta números">
                    <div class="text-danger">
                        {!!$errors->first('descuento','<span class="help-block">:message</span>')!!}
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
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp; Cerrar</button>
        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i>&nbsp; Guardar</button>
        
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
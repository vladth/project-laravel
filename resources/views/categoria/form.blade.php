@if(Auth::check())
    @if (Auth::user()->idrol == 1 or Auth::user()->idrol == 2 or Auth::user()->idrol == 4)

    @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <span>Categoria no registrado revise el formulario y llene el formulario nuevamente.</span>
            </div>
    @endif
    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="text-input">Categoría</label>
        <div class="col-md-9">
            <input type="text" value="{{ old('nombre') }}" name="nombre" id="nombre" class="form-control" placeholder="Nombre de categoría" required pattern="[A-Z\ÁÉÍÓÚÑ]*" title="Solo se acepta 50 caracteres">
            <div class="text-danger">
                {!!$errors->first('nombre','<span class="help-block">:message</span>')!!}
            </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-3 form-control-label" for="des">Descripción</label>
        <div class="col-md-9">
        <input type="text" value="{{ old('descripcion') }}" name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese descripcion" required pattern="^[a-zA-Z0-9_áéíóúñ°\s]*{0,200}$" title="Solo se acepta 70 caracteres">
        <div class="text-danger">
            {!!$errors->first('descripcion','<span class="help-block">:message</span>')!!}
        </div>
        </div>
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</button>
        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Guardar</button>
        
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
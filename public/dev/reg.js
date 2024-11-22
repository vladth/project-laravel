
$('#abrirmodalEditar').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var nombre_modal_editar = button.data('nombre')
    var descripcion_modal_editar = button.data('descripcion')
    var id_categoria = button.data('id_categoria')
    var modal = $(this)

    modal.find('.modal-body #nombre').val(nombre_modal_editar);
    modal.find('.modal-body #descripcion').val(descripcion_modal_editar);
    modal.find('.modal-body #id_categoria').val(id_categoria);
})
/******************************************************/

$('#cambiarEstado').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var id_categoria = button.data('id_categoria')
    var modal = $(this)

    modal.find('.modal-body #id_categoria').val(id_categoria);
})

/***********************************************************/

$('#abrirmodalEditar').on('show.bs.modal', function(event) {
    
    var button = $(event.relatedTarget)
    var tipo_plan_cuenta_modal_editar = button.data('tipo_plan_cuenta')
    var cuenta_modal_editar = button.data('cuenta')
    var tipo_cuenta_modal_editar = button.data('tipo_cuenta')
    var id_cuenta = button.data('id_cuenta')
    var modal = $(this)
    
    modal.find('.modal-body #tipo_plan_cuenta').val(tipo_plan_cuenta_modal_editar);
    modal.find('.modal-body #cuenta').val(cuenta_modal_editar);
    modal.find('.modal-body #tipo_cuenta').val(tipo_cuenta_modal_editar);
    modal.find('.modal-body #id_cuenta').val(id_cuenta);
})

$('#cambiarEstado').on('show.bs.modal', function(event) {
    
    var button = $(event.relatedTarget)
    var id_cuenta = button.data('id_cuenta')
    var modal = $(this)
   
    modal.find('.modal-body #id_cuenta').val(id_cuenta);
})

$('#abrirmodalEditar').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    
    var id_categoria_modal_editar = button.data('id_categoria')
    var nombre_modal_editar = button.data('nombre')
    var descripcion_modal_editar = button.data('descripcion')
    var precio_venta_modal_editar = button.data('precio_venta')
    var descuento_venta_modal_editar = button.data('descuento')
    var codigo_modal_editar = button.data('codigo')
    var stock_modal_editar = button.data('stock')
    
    var id_producto = button.data('id_producto')
    var modal = $(this)
    
    modal.find('.modal-body #id').val(id_categoria_modal_editar);
    modal.find('.modal-body #nombre').val(nombre_modal_editar);
    modal.find('.modal-body #descripcion').val(descripcion_modal_editar);
    modal.find('.modal-body #precio_venta').val(precio_venta_modal_editar);
    modal.find('.modal-body #descuento').val(descuento_venta_modal_editar);
    modal.find('.modal-body #codigo').val(codigo_modal_editar);
    modal.find('.modal-body #stock').val(stock_modal_editar);
    
    modal.find('.modal-body #id_producto').val(id_producto);
})

$('#cambiarEstado').on('show.bs.modal', function(event) {
    
    var button = $(event.relatedTarget)
    var id_producto = button.data('id_producto')
    var modal = $(this)
    
    modal.find('.modal-body #id_producto').val(id_producto);
})

$('#abrirmodalEditar').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var nombre_modal_editar = button.data('nombre')
    var tipo_documento_modal_editar = button.data('tipo_documento')
    var num_documento_modal_editar = button.data('num_documento')
    var expedito_modal_editar = button.data('expedito')
    var direccion_modal_editar = button.data('direccion')
    var telefono_modal_editar = button.data('telefono')
    var email_modal_editar = button.data('email')
    var id_proveedor = button.data('id_proveedor')
    var modal = $(this)

    modal.find('.modal-body #nombre').val(nombre_modal_editar);
    modal.find('.modal-body #tipo_documento').val(tipo_documento_modal_editar);
    modal.find('.modal-body #num_documento').val(num_documento_modal_editar);
    modal.find('.modal-body #expedito').val(expedito_modal_editar);
    modal.find('.modal-body #direccion').val(direccion_modal_editar);
    modal.find('.modal-body #telefono').val(telefono_modal_editar);
    modal.find('.modal-body #email').val(email_modal_editar);
    modal.find('.modal-body #id_proveedor').val(id_proveedor);
})

$('#cambiarEstado').on('show.bs.modal', function(event) {
    
    var button = $(event.relatedTarget)
    var id_proveedor = button.data('id_proveedor')
    var modal = $(this)
    
    modal.find('.modal-body #id_proveedor').val(id_proveedor);
})

$('#abrirmodalEditar').on('show.bs.modal', function(event) {
   
    var button = $(event.relatedTarget)
    var nombre_modal_editar = button.data('nombre')
    var tipo_documento_modal_editar = button.data('tipo_documento')
    var num_documento_modal_editar = button.data('num_documento')
    var expedito_modal_editar = button.data('expedito')
    var direccion_modal_editar = button.data('direccion')
    var telefono_modal_editar = button.data('telefono')
    var email_modal_editar = button.data('email')
    var id_cliente = button.data('id_cliente')
    var modal = $(this)
    
    modal.find('.modal-body #nombre').val(nombre_modal_editar);
    modal.find('.modal-body #tipo_documento').val(tipo_documento_modal_editar);
    modal.find('.modal-body #num_documento').val(num_documento_modal_editar);
    modal.find('.modal-body #expedito').val(expedito_modal_editar);
    modal.find('.modal-body #direccion').val(direccion_modal_editar);
    modal.find('.modal-body #telefono').val(telefono_modal_editar);
    modal.find('.modal-body #email').val(email_modal_editar);
    modal.find('.modal-body #id_cliente').val(id_cliente);
})

$('#cambiarEstado').on('show.bs.modal', function(event) {
    
    var button = $(event.relatedTarget)
    var id_cliente = button.data('id_cliente')
    var modal = $(this)
    
    modal.find('.modal-body #id_cliente').val(id_cliente);
})


$('#abrirmodalEditar').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var nombre_modal_editar = button.data('nombre')
    var tipo_documento_modal_editar = button.data('tipo_documento')
    var num_documento_modal_editar = button.data('num_documento')
    var expedito_modal_editar = button.data('expedito')
    var direccion_modal_editar = button.data('direccion')
    var telefono_modal_editar = button.data('telefono')
    var email_modal_editar = button.data('email')

    var id_rol_modal_editar = button.data('id_rol')
    var usuario_modal_editar = button.data('usuario')

    var id_usuario = button.data('id_usuario')
    var modal = $(this)

    modal.find('.modal-body #nombre').val(nombre_modal_editar);
    modal.find('.modal-body #tipo_documento').val(tipo_documento_modal_editar);
    modal.find('.modal-body #num_documento').val(num_documento_modal_editar);
    modal.find('.modal-body #expedito').val(expedito_modal_editar);
    modal.find('.modal-body #direccion').val(direccion_modal_editar);
    modal.find('.modal-body #telefono').val(telefono_modal_editar);
    modal.find('.modal-body #email').val(email_modal_editar);
    modal.find('.modal-body #id_rol').val(id_rol_modal_editar);
    modal.find('.modal-body #usuario').val(usuario_modal_editar);

    modal.find('.modal-body #id_usuario').val(id_usuario);
})

$('#cambiarEstado').on('show.bs.modal', function(event) {
   
    var button = $(event.relatedTarget)
    var id_usuario = button.data('id_usuario')
    var modal = $(this)
   
    modal.find('.modal-body #id_usuario').val(id_usuario);
})

$('#cambiarEstadoCompra').on('show.bs.modal', function(event) {
   
    var button = $(event.relatedTarget)
    var id_compra = button.data('id_compra')
    var modal = $(this)
    
    modal.find('.modal-body #id_compra').val(id_compra);
})

$('#cambiarEstadoVenta').on('show.bs.modal', function(event) {
   
    var button = $(event.relatedTarget)
    var id_venta = button.data('id_venta')
    var modal = $(this)
    
    modal.find('.modal-body #id_venta').val(id_venta);
})

$('#cambiarEstadoAsiento').on('show.bs.modal', function(event) {
    
    var button = $(event.relatedTarget)
    var id_asiento = button.data('id_asiento')
    var modal = $(this)
    
    modal.find('.modal-body #id_asiento').val(id_asiento);
})

$('#cambiarEstadoRol').on('show.bs.modal', function(event) {
    
    var button = $(event.relatedTarget)
    var id_rol = button.data('id_rol')
    var modal = $(this)
   
    modal.find('.modal-body #id_rol').val(id_rol);
})

		//Desvanecer ventana alert
		window.setTimeout(function() {
		    $(".alert").fadeTo(1500, 0).slideDown(1000, function() {
		        $(this).remove();
		    });
		}, 20000); //en 3 segundos
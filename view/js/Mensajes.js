class Mensajes {
  AgregarEmpleado() {
    swal("¡Registro exitoso!", "Se ha registrado el empleado", "success");
  }

  ExisteEmpleado() {
    swal(
      "El empleado que trata de ingresar ya existe",
      "Verifica los datos",
      "error"
    );
  }

  ErrorBD() {
    swal({
      title: "Ha ocurrido un error",
      icon: "error",
    });
  }

  ErrorComboTI() {
    swal({
      title: "Debe seleccionar un tipo de identificación para el empleado",
      icon: "error",
    });
  }

  ErrorComboRol() {
    swal({
      title: "Debe seleccionar el rol del empleado",
      icon: "error",
    });
  }

  ErrorComboEstado() {
    swal({
      title: "Debe seleccionar el estado del empleado",
      icon: "error",
    });
  }

   EliminacionEmpleadoEfectiva() {
    swal("Se ha eliminado correctamente el empleado", {
      icon: "success",
    });
  }
  
  EliminarEmpleado() {
    swal("Digite la identificación del empleado que desea eliminar: ", {
      content: "input",
    }).then((value) => {
      swal({
        title: `¿Seguro que desea eliminar al empleado con identificación: ${value}?`,
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: "../controller/DAOBean.php",
            type: "POST",
            data: { valor: value },
            success: function(response) {
              // Manejar la respuesta del servidor
              console.log(response);
              // Llamar a la función de eliminación exitosa
            },
            error: function(xhr, status, error) {
              // Manejar el error de la solicitud
              console.log(error);
            }
          });
        } else {
          swal("¡Has cancelado el proceso de eliminación!");
        }
      });
    });
  }

}

const clMensajes = new Mensajes();

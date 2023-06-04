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

  static EliminacionEmpleadoEfectiva() {
    swal("Se ha eliminado correctamente el empleado", {
      icon: "success",
    });
  }

  static EliminacionEmpleadoNoEfectiva() {
    swal(
      "El empleado que tratas de eliminar no existe",
      "Verifica los datos",
      "error"
    );
  }

  EliminarEmpleado() {
    swal({
      title: "Digite la identificación del empleado que desea eliminar:",
      content: "input",
    }).then((value) => {
      if (value) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../controller/DAOBean.php", true);
        xhr.setRequestHeader(
          "Content-Type",
          "application/x-www-form-urlencoded"
        );
        var data = "valor=" + encodeURIComponent(value);
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            var responseText = xhr.responseText;
            var startIndex = responseText.indexOf("{");
            var endIndex = responseText.lastIndexOf("}");
            var jsonResponse = responseText.substring(startIndex, endIndex + 1);
            var response = JSON.parse(jsonResponse);
            var valor = response.valor;
            console.log("Respuesta del servidor: " + valor);
            if (valor === 1) {
              Mensajes.EliminacionEmpleadoEfectiva();
            } 
            if (valor === 2) {
              Mensajes.EliminacionEmpleadoNoEfectiva();
            }
            else {
              Mensajes.ErrorBD();
            }
          }
        };
        xhr.send(data);
      } else {
        swal("¡Has cancelado el proceso de eliminación!");
      }
    });
  }
}

const clMensajes = new Mensajes();

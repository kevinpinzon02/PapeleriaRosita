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

  AsignarContraseña() {
    swal("¡Asignación exitosa!", "Se ha asignado un usuario al empleado", "success");
  }

  NoExisteUsuario() {
    swal(
      "El empleado que trata de ingresar no existe",
      "Verifica los datos",
      "error"
    );
  }

  AgregarProveedor() {
    swal("¡Registro exitoso!", "Se ha registrado el proveedor", "success");
  }

  ExisteProveedor() {
    swal(
      "El proveedor que trata de ingresar ya existe",
      "Verifica los datos (NIT del proveedor)",
      "error"
    );
  }

  AgregarProducto() {
    swal("¡Registro exitoso!", "Se ha registrado el producto", "success");
  }

  ExisteProducto() {
    swal(
      "El producto que trata de ingresar ya existe",
      "Verifica los datos",
      "error"
    );
  }

  AgregarPedido() {
    swal("¡Registro exitoso!", "Se ha registrado el pedido", "success");
  }

  ExistePedido() {
    swal(
      "El pedido que trata de ingresar ya existe",
      "Verifica los datos",
      "error"
    );
  }

  static ErrorBD() {
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

  ErrorUsuarioNoExiste() {
    swal({
      title: "Los datos ingresados son incorrectos",
      text: "Verifica la información",
      icon: "error",
    });
  }

  Prueba2(){
    console.log("aaaaaaa")
  }

  ErrorComboEstado() {
    swal({
      title: "Debe seleccionar el estado",
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
          }
        };
        xhr.send(data);
      } else {
        swal("¡Has cancelado el proceso de eliminación!");
      }
    });
  }

  static EliminacionProductoEfectiva() {
    swal("Se ha eliminado correctamente el producto", {
      icon: "success",
    });
  }

  static EliminacionProductoNoEfectiva() {
    swal(
      "El producto que tratas de eliminar no existe",
      "Verifica los datos",
      "error"
    );
  }

  EliminarProducto() {
    swal({
      title: "Digite el producto que deseas eliminar:",
      content: "input",
    }).then((value) => {
      if (value) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../controller/DAOBean.php", true);
        xhr.setRequestHeader(
          "Content-Type",
          "application/x-www-form-urlencoded"
        );
        var data = "valorPR=" + encodeURIComponent(value);
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
              Mensajes.EliminacionProductoEfectiva();
            }
            if (valor === 2) {
              Mensajes.EliminacionProductoNoEfectiva();
            } 
          }
        };
        xhr.send(data);
      } else {
        swal("¡Has cancelado el proceso de eliminación!");
      }
    });
  }

  static EliminacionProveedorEfectiva() {
    swal("Se ha eliminado correctamente el proveedor", {
      icon: "success",
    });
  }

  static EliminacionProveedorNoEfectiva() {
    swal(
      "El proveedor que tratas de eliminar no existe",
      "Verifica los datos",
      "error"
    );
  }

  EliminarProveedor() {
    swal({
      title: "Digite el NIT del proveedor que deseas eliminar:",
      content: "input",
    }).then((value) => {
      if (value) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../controller/DAOBean.php", true);
        xhr.setRequestHeader(
          "Content-Type",
          "application/x-www-form-urlencoded"
        );
        var data = "valo=" + encodeURIComponent(value);
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            var responseText = xhr.responseText;
            var startIndex = responseText.indexOf("{");
            var endIndex = responseText.lastIndexOf("}");
            var jsonResponse = responseText.substring(startIndex, endIndex + 1);
            console.log("Donde está mal:  "+jsonResponse);
            var response = JSON.parse(jsonResponse);
            console.log(response);
            var valor = response.valor;
            console.log("Respuesta del servidor: " + valor);
            if (valor === 1) {
              Mensajes.EliminacionProveedorEfectiva();
            }
            if (valor === 2) {
              Mensajes.EliminacionProveedorNoEfectiva();
            } 
          }
        };
        xhr.send(data);
      } else {
        swal("¡Has cancelado el proceso de eliminación!");
      }
    });
  }

  static EliminacionPedidoEfectiva() {
    swal("Se ha eliminado correctamente el pedido", {
      icon: "success",
    });
  }

  static EliminacionPedidoNoEfectiva() {
    swal(
      "El pedido que tratas de eliminar no existe",
      "Verifica los datos",
      "error"
    );
  }

  EliminarPedido() {
    swal({
      title: "Digita el código del pedido que deseas eliminar:",
      content: "input",
    }).then((value) => {
      if (value) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "../controller/DAOBean.php", true);
        xhr.setRequestHeader(
          "Content-Type",
          "application/x-www-form-urlencoded"
        );
        var data = "valorPED=" + encodeURIComponent(value);
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
              Mensajes.EliminacionPedidoEfectiva();
            }
            if (valor === 2) {
              Mensajes.EliminacionPedidoNoEfectiva();
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

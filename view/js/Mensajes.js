class Mensajes{
    AgregarEmpleado(){
        swal("¡Registro exitoso!", "Se ha registrado el empleado", "success");
    }

    ExisteEmpleado(){
        swal("El empleado que trata de ingresar ya existe", "Verifica los datos", "error");
    }

    ErrorBD(){
        swal({
            title: "Ha ocurrido un error",
            icon: "error",
          });    
    }

    ErrorComboTI(){
        swal({
            title: "Debe seleccionar un tipo de identificación para el empleado",
            icon: "error",
          });  
    }

    ErrorComboRol(){
        swal({
            title: "Debe seleccionar el rol del empleado",
            icon: "error",
          });  
    }

    ErrorComboEstado(){
        swal({
            title: "Debe seleccionar el estado del empleado",
            icon: "error",
          });  
    }
}
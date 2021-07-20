$("#nombre_registro").change(function(){
    validarExistente("#nombre_registro", "Nombre")
});

$("#email_registro").change(function(){
    validarExistente("#email_registro", "Correo Electronico")
});


function validarExistente(idElemento, tipoElemento){
     var nombre = $(idElemento).val();
     var datos = new FormData();
     datos.append("nombre", nombre);

   $.ajax({
      url: "ajax/ajax.php",
      method: "POST",
      data: datos,
      cache: true,
      contentType: false,
      processData: false,
      before:  function(){
          
      },
      success: function(respuesta){
          console.log(respuesta);
          if(respuesta === "1" || respuesta === 1 ){
              $(idElemento).val("");
              $(idElemento).select();
              document.querySelector("div[for='mensaje_error']").innerHTML="El "+tipoElemento+" de usuario ya existe.";
          }else{
              document.querySelector("div[for='mensaje_error']").innerHTML="";
          }
      },
      error:   function(respuesta){
          console.log("ocurio un error: " + respuesta);
      },
      complete: function(){
          
      }
   });
   
}

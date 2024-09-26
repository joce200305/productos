const enviar_datos = () => {
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;
    let data = new FormData();
    data.append("email",email);
    data.append("password", password);
    fetch("app/controller/login.php", {
        method: "POST",
        body: data
    }).then(respuesta => respuesta.json())
        .then(respuesta => {
            if (respuesta[0]==1) {
                alert(respuesta[1]);
                window.location="index.php";
            }else{
                alert(respuesta[1]);
            }

        })
}
 document.getElementById("btn_saludar").addEventListener("click",() =>{
    enviar_datos();
 })


//URI: es una URL interna o sea dentro del mismo proyecto para que asi podamos acceder
//URL es una URLE externa porque se puede accder desde cualquie lugar
//htttp es un protocolo para el envio y recepcion de datos
//then es un promesa


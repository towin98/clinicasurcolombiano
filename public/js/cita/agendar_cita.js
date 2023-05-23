import {SweetAlert} from './sweetAlert.js';

class AgendarCita {
    constructor(){ }

    fnServiciosCita(){
        const selected = this.options[this.selectedIndex].text;
        // Mucho cuidado, el nombre Cirugía es el mismo presente en tabla servicio_citas por si se llega a cambiar.
        if (selected == "Cirugía") {
            $adjuntar_documentacion.classList.remove("d-none");
        }else{
            $adjuntar_documentacion.classList.add('d-none');
        }
    }

    fnValidarCita(e){
        document.getElementById("loading").style.display = "flex";
        const objSweetAlert = new SweetAlert();
        e.preventDefault();
        if (document.querySelector("#terminos_condiciones").checked) {
            let $form = this;

            const formData = new FormData(this);
            const token = document.getElementsByName('csrf-token')[0].content;
            const myHeader = new Headers({
                "X-CSRF-TOKEN": token
            });
            let url = {
                method: 'POST',
                headers: myHeader,
                body: formData
            };

            let error = false;
            fetch('/guardar-cita', url)
            .then(response => {
                if (response.status == 409) {
                    error = true;
                }
                return response.json();
            })
            .then(data => {
                if (error == true) {
                    document.getElementById("loading").style.display = "none";
                    objSweetAlert.fnError(data.message, "Por favor verifique...");
                    let listaSpan = document.querySelectorAll(".span-error");

                    for (const span of listaSpan) {
                        let elem_padre = span.parentElement;
                        elem_padre.removeChild(span);
                    }

                    for (let index = 0; index < $form.length; index++) {
                        if ($form[index].name != "") {
                            let campo = $form[index].name;

                            if (data.errors[campo]) {
                                let span = document.createElement("span");
                                span.classList.add("span-error");
                                span.style.display = "inline-block";
                                let texto = document.createTextNode(data.errors[campo][0]);
                                span.appendChild(texto);
                                let elem_padre = $form[index].parentElement;
                                elem_padre.appendChild(span);
                            }
                        }
                    }

                }else{
                    document.getElementById("loading").style.display = "none";
                    objSweetAlert.fnExito(data.message, "Exitoso");
                }
            })
            .catch(function(error) {
                //location.reload();
                document.getElementById("loading").style.display = "none";
                console.log('Hubo un problema con la petición :' + error.message);
            });
        }else{
            document.getElementById("loading").style.display = "none";
            objSweetAlert.fnInfo("Por favor acepte términos y condiciones", "Verifique...");
        }
    }
}
/*Elementos del DOM*/
const $servicios_cita         = document.querySelector('#id_servicios_cita');
const $adjuntar_documentacion = document.querySelector('#adjuntar-documentacion');
const $form                   = document.querySelector('#form-agendar-cita');

/*Instancia de clase*/
let objAgendarCita = new AgendarCita();


/*Eventos*/
$servicios_cita.addEventListener("change", objAgendarCita.fnServiciosCita);
$form.addEventListener("submit", objAgendarCita.fnValidarCita);





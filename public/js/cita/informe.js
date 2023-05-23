import {SweetAlert} from './sweetAlert.js';

class Informe {
    constructor(){}

    fnInforme(e){
        const $form = document.querySelector('#formInforme');
        const objSweetAlert = new SweetAlert();
        const obInforme = new Informe();
        const formData = new FormData($form);

        e.preventDefault();

        document.querySelector("#agregar-errores").innerHTML = "";
        if (obInforme.fnValidarConsulta() == false) {

            document.querySelector("#errores").style.display = "none";

            let error = false;
            fetch(`/informe/${formData.get("fechaInicial")}/${formData.get("fechaFinal")}`, formData)
            .then(response => {
                if (response.status == 409) {
                    error = true;
                }
                return response.json();
            })
            .then(data => {
                if (error == false) {
                    let registros = data.data;
                    let $body_table = document.getElementById("body_table");

                    let agregar_info = "";
                    for (let index = 0; index < registros.length; index++) {
                        agregar_info += `
                        <tr>
                            <td class="px-6 py-4 border border-black-600">
                                <p class="text-gray-500 text-sm font-semibold tracking-wide">${registros[index].created_at}</p>
                            </td>
                            <td class="px-6 py-4 border border-black-600">
                                <p class="text-gray-500 text-sm font-semibold tracking-wide">${registros[index].nombres} ${registros[index].apellidos}</p>
                            </td>
                            <td class="px-6 py-4 border border-black-600">
                                <p class="text-gray-500 text-sm font-semibold tracking-wide">${registros[index].numero_documento}</p>
                            </td>
                            <td class="px-6 py-4 border border-black-600">
                                <p class="text-gray-500 text-sm font-semibold tracking-wide">${registros[index].ciudad}</p>
                            </td>
                            <td class="px-6 py-4 text-center border border-black-600">
                                <p class="text-gray-500 text-sm font-semibold tracking-wide">${registros[index].n_telefono}</p>
                            </td>
                            <td class="px-6 py-4 text-center border border-black-600">
                                <p class="text-gray-500 text-sm font-semibold tracking-wide">${registros[index].correo}</p>
                            </td>
                            <td class="px-6 py-4 text-center border border-black-600">
                            <p class="text-gray-500 text-sm font-semibold tracking-wide">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    <a href="/citas-informe/consulta/${registros[index].id}">Ver</a>
                                </button>
                            </p>
                            </td>
                        </tr>
                        `;
                    }
                    $body_table.innerHTML = agregar_info;

                }
            })
            .catch(function(error) {
                //location.reload();
                console.log('Hubo un problema con la petición :' + error.message);
            });
        }
    }

    fnValidarConsulta(){
        const $form = document.querySelector('#formInforme');
        const formData = new FormData($form);
        document.querySelector("#errores").style.display = "block";
        let validacion = false;
        if (moment(formData.get("fechaInicial"), 'YYYY-MM-DD',true).isValid() == false) {
            let p = document.createElement("p");
            let texto = document.createTextNode("La fecha inicial es requerida.");
            p.appendChild(texto);
            let $agregarErrores = document.querySelector("#agregar-errores");
            $agregarErrores.appendChild(p);
            validacion = true;
        }

        if (formData.get("fechaInicial") > formData.get("fechaFinal")) {
            let p = document.createElement("p");
            let texto = document.createTextNode("La fecha final debe ser una fecha posterior o igual a la fecha inicial.");
            p.appendChild(texto);
            let $agregarErrores = document.querySelector("#agregar-errores");
            $agregarErrores.appendChild(p);
            validacion = true;
        }

        if (moment(formData.get("fechaFinal") , 'YYYY-MM-DD',true).isValid() == false) {
            let p = document.createElement("p");
            let texto = document.createTextNode("La fecha final es requerida.");
            p.appendChild(texto);
            let $agregarErrores = document.querySelector("#agregar-errores");
            $agregarErrores.appendChild(p);
            validacion = true;
        }
        return validacion;
    }
}

/*Instanciando clase*/
const obInforme = new Informe();

const $btnBuscar = document.querySelector('#btn-buscar');

const $informeExcel = document.querySelector('#informeExcel');
$btnBuscar.addEventListener("click", obInforme.fnInforme);
// $informeExcel.addEventListener("click", obInforme.fnInformeExcel);


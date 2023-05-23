@extends('estructura.estructura')

@section('css')
<style>

    label{
        color: #00948A;
        font-weight: bold;
    }

    .span-error{ color: red; font-size: 0.8em; }

    .contenedor-agendar-cita{
        padding-left: 130px !important;
        padding-right: 130px !important;
    }

    #loading {
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        position: fixed;
        opacity: 0.7;
        background-color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    @media screen and (max-width: 992px) {
        .contenedor-agendar-cita{
            padding-right: 0 !important;
            padding-left: 0 !important;
        }
    }
</style>
@endsection

@section("agendar_cita")
<div class="container pt-4 pl-5 contenedor-agendar-cita">
    <div id="loading" style="display: none">
        <div class="spinner-border" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div>
        <h3 class="text-center">Agenda Tu Cita</h3>
        <hr>
        <p class="fs-6">
            Los campos con (<b class="text-danger">*</b>) son requeridos.
        </p>
    </div>

    <form class="row p-3 border border-1 rounded m-0" id="form-agendar-cita">
        <div class="col-md-6 text-center">
            <label for="nombres" class="form-label">Nombres <b class="text-danger">*</b></label>
            <input type="txt" class="form-control" name="nombres" id="nombres">
        </div>
        <div class="col-md-6 text-center">
            <label for="apellidos" class="form-label">Apellidos <b class="text-danger">*</b></label>
            <input type="text" class="form-control" name="apellidos" id="apellidos">
        </div>
        <div class="col-12 text-center">
            <label for="correo" class="form-label">Correo Electrónico <b class="text-danger">*</b></label>
            <input type="email" class="form-control" name="correo" id="correo">
        </div>
        <div class="col-md-6 text-center">
            <label for="id_tipo_documento" class="form-label">Tipo de Documento <b class="text-danger">*</b></label>
            <select id="id_tipo_documento" class="form-select" name="id_tipo_documento">
                <option value="">Elegir una opción</option>
                @foreach ($tiposDocumentos as $tipoDocumento)
                    <option value="{{ $tipoDocumento->id_codigo }}">{{ $tipoDocumento->descripcion }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6 text-center">
            <label for="numero_documento" class="form-label">N° de Documento <b class="text-danger">*</b></label>
            <input type="text" class="form-control" name="numero_documento" id="numero_documento">
        </div>
        <div class="col-md-6 text-center">
            <label for="ciudad" class="form-label">Ciudad <b class="text-danger">*</b></label>
            <input type="text" class="form-control" name="ciudad" id="ciudad">
        </div>
        <div class="col-md-6 text-center">
            <label for="n_telefono" class="form-label">N° de Teléfono <b class="text-danger">*</b></label>
            <input type="text" class="form-control" name="n_telefono" id="n_telefono">
        </div>
        <div class="col-12 text-center">
            <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento <b class="text-danger">*</b></label>
            <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento">
        </div>
        <div class="col-12 text-center">
            <label for="convenio_paciente" class="form-label">Convenio del paciente <b class="text-danger">*</b></label>
            <input type="text" class="form-control" name="convenio_paciente" id="convenio_paciente">
        </div>
        <div class="col-12 text-center">
            <label for="id_servicios_cita" class="form-label">Servicios que requiere para su cita <b class="text-danger">*</b></label>
            <select id="id_servicios_cita" class="form-select" name="id_servicios_cita">
                <option value="">Elegir una opción</option>
                @foreach ($serviciosCita as $servicioCita)
                    <option value="{{ $servicioCita->id }}">{{ $servicioCita->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 text-center">
            <label for="especialidad" class="form-label">Especialidad <b class="text-danger">*</b></label>
            <select id="especialidad" class="form-select" name="especialidad">
                <option value="">Elegir una opción</option>
                <option value="oftalmologia">Oftalmología</option>
            </select>
        </div>
        <div class="col-12 text-center">
            <label for="observacion" class="form-label">Observaciones</label>
            <textarea class="form-control" name="observacion" id="observacion" rows="3"></textarea>
        </div>

        <div class="pt-2 d-none" id="adjuntar-documentacion">
            <hr>
            <p>Adjuntar Documentación
                <br>
                <b style="color: #00948A">Formatos: png, jpeg, pdf, docx</b>
            </p>
            <table class="table table-bordered border-Secondary">
                <thead class="text-center">
                    <tr class="bg-light">
                        <th>Documento</th>
                        <th>Cargar</th>
                        <th>Quitar</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <th>Documento de identidad</th>
                        <td>
                            <input type="file" name="arc_documento_identidad" title="Subir Documento de identidad">
                        </td>
                        <td class="d-flex justify-content-center">
                            <img src="{{ asset('img-sistema/img-quitar.png') }}" alt="quitar" title="Remover archivo subido" style="cursor: pointer" onclick="fnLimpiarArchivo('arc_documento_identidad')">
                        </td>
                    </tr>
                    <tr>
                        <th>Autorización EPS</th>
                        <td>
                            <input type="file" name="arc_autorizacion_eps" title="Subir Autorización EPS">
                        </td>
                        <td class="d-flex justify-content-center">
                            <img src="{{ asset('img-sistema/img-quitar.png') }}" alt="quitar" title="Remover archivo subido" style="cursor: pointer" onclick="fnLimpiarArchivo('arc_autorizacion_eps')">
                        </td>
                    </tr>
                    <tr>
                        <th>Examen Prequirúrgicos</th>
                        <td>
                            <input type="file" name="arc_examen_prequirurgicos" title="Subir Examen Prequirúrgicos">
                        </td>
                        <td class="d-flex justify-content-center">
                            <img src="{{ asset('img-sistema/img-quitar.png') }}" alt="quitar" title="Remover archivo subido" style="cursor: pointer" onclick="fnLimpiarArchivo('arc_examen_prequirurgicos')">
                        </td>
                    </tr>
                    <tr>
                        <th>Exámenes Biométricos</th>
                        <td>
                            <input type="file" name="arc_examenes_biometricos" title="Subir Exámenes Biométricos">
                        </td>
                        <td class="d-flex justify-content-center">
                            <img src="{{ asset('img-sistema/img-quitar.png') }}" alt="quitar" title="Remover archivo subido" style="cursor: pointer" onclick="fnLimpiarArchivo('arc_examenes_biometricos')">
                        </td>
                    </tr>
                    <tr>
                        <th>Consentimiento informado</th>
                        <td>
                            <input type="file" name="arc_consentimiento_informado" title="Subir Consentimiento informado">
                        </td>
                        <td class="d-flex justify-content-center">
                            <img src="{{ asset('img-sistema/img-quitar.png') }}" alt="quitar" title="Remover archivo subido" style="cursor: pointer" onclick="fnLimpiarArchivo('arc_consentimiento_informado')">
                        </td>
                    </tr>
                    <tr>
                        <th>Fecha de registro</th>
                        <td>
                            <input type="file" name="arc_fecha_registro" title="Subir Fecha de registro">
                        </td>
                        <td class="d-flex justify-content-center">
                            <img src="{{ asset('img-sistema/img-quitar.png') }}" alt="quitar" title="Remover archivo subido" style="cursor: pointer" onclick="fnLimpiarArchivo('arc_fecha_registro')">
                        </td>
                    </tr>
                    <tr>
                        <th>Orden Medica</th>
                        <td>
                            <input type="file" name="arc_orden_medica" title="Subir Orden Medica">
                        </td>
                        <td class="d-flex justify-content-center">
                            <img src="{{ asset('img-sistema/img-quitar.png') }}" alt="quitar" title="Remover archivo subido" style="cursor: pointer" onclick="fnLimpiarArchivo('arc_orden_medica')">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-12 pt-2 text-center">
            <div class="form-check d-flex justify-content-center">
                <input class="form-check-input" type="checkbox" id="terminos_condiciones">
                <p>
                    Acepto los términos y condiciones y la política de tratamiento de los datos personales
                </p>
            </div>
            <button type="submit" class="btn btn-primary ">Enviar</button>
        </div>
    </form>
</div>
@endsection

@section('js')
    <script src="{{ asset('js/cita/agendar_cita.js') }}" type="module"></script>

    <script>
        function fnLimpiarArchivo(nameCampoArchivo){
            document.getElementsByName(nameCampoArchivo)[0].value = "";
        }
    </script>
@endsection

<x-app-layout>
    <div class=" bg-white sm:container sm:mx-auto mx-4 mt-7 pt-7 rounded-lg text-green-600">
        <form class="mx-auto w-full max-w-2xl">
            <div class="w-full pb-5">
                <p class="text-center text-3xl font-bold">Cita</p>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-green-600 text-center" for="grid-first-name">
                        Nombres
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight" type="text" value="{{ $cita->nombres }}" disabled>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-green-600 text-center" for="grid-last-name">
                        Apellidos
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight" id="grid-last-name" type="text" value="{{ $cita->apellidos }}" disabled>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-green-600 text-center" for="grid-password">
                        Correo electronico
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight" value="{{ $cita->correo }}" id="grid-password" disabled>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-green-600 text-center" for="grid-first-name">
                        Tipo de documento
                    </label>
                    <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" disabled>
                        @foreach ($tiposDocumento as $tipoDocumento)
                            <option @if ($tipoDocumento->id_codigo == $cita->id_tipo_documento) selected @endif>{{ $tipoDocumento->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-green-600 text-center" for="grid-last-name">
                        N° de Documento
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight" id="grid-last-name" value="{{ $cita->numero_documento }}" type="text" disabled>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-green-600 text-center" for="grid-first-name">
                        Ciudad
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight" type="text" value="{{ $cita->ciudad }}" disabled>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-green-600 text-center" for="grid-last-name">
                        N° de Télefono
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight" id="grid-last-name" type="text" value="{{ $cita->n_telefono }}" disabled>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-green-600 text-center" for="grid-password">
                        Fecha de nacimiento
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight" id="grid-password" value="{{ $cita->fecha_nacimiento }}" disabled>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-green-600 text-center" for="grid-password">
                        Convenio del paciente
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight" id="grid-password" value="{{ $cita->convenio_paciente }}" disabled>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-green-600 text-center" for="grid-password">
                        Servicios que requiere para su cita
                    </label>
                    <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" disabled>
                        @foreach ($serviciosCita as $servicio)
                            <option @if ($servicio->id == $cita->id) selected @endif>{{ $servicio->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-green-600 text-center" for="grid-password">
                        Especialidad
                    </label>
                    <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" disabled>
                        <option selected>{{ $cita->especialidad }}</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 text-green-600 text-center" for="grid-password">
                        Observaciones
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight" id="grid-password" value="{{ $cita->observacion }}" disabled>
                </div>
            </div>
            <table class="w-full mb-5 rounded-lg overflow-hidden">
                <thead class="bg-gray-900">
                    <tr class="text-white">
                        <th class="font-semibold text-sm uppercase px-6 py-4 border border-black-600 text-center">Documento</th>
                        <th class="border border-black-600"></th>
                    </tr>
                </thead>
                <tbody class="divide-gray-200" id="body_table">
                    <tr>
                        <th class="px-6 py-4 border border-black-600">Documento de identidad</th>
                        <td class="text-center px-6 py-4 border border-black-600">
                            @if ($cita->arc_documento_identidad != "")
                                <a href="{{ asset($cita->arc_documento_identidad) }}" download>
                                    <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                        <span>Descargar</span>
                                    </button>
                                </a>
                            @else
                                <p class="text-red-400">Archivo no cargado</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="px-6 py-4 border border-black-600">Autorización EPS</th>
                        <td class="text-center px-6 py-4 border border-black-600">
                            @if ($cita->arc_autorizacion_eps != "")
                                <a href="{{ asset($cita->arc_autorizacion_eps) }}" download>
                                    <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                        <span>Descargar</span>
                                    </button>
                                </a>
                            @else
                                <p class="text-red-400">Archivo no cargado</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="px-6 py-4 border border-black-600">Examen Prequirúrgicos</th>
                        <td class="text-center px-6 py-4 border border-black-600">
                            @if ($cita->arc_examen_prequirurgicos != "")
                                <a href="{{ asset($cita->arc_examen_prequirurgicos) }}" download>
                                    <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                        <span>Descargar</span>
                                    </button>
                                </a>
                            @else
                                <p class="text-red-400">Archivo no cargado</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="px-6 py-4 border border-black-600">Exámenes Biométricos</th>
                        <td class="text-center px-6 py-4 border border-black-600">
                            @if ($cita->arc_examenes_biometricos != "")
                                <a href="{{ asset($cita->arc_examenes_biometricos) }}" download>
                                    <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                        <span>Descargar</span>
                                    </button>
                                </a>
                            @else
                                <p class="text-red-400">Archivo no cargado</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="px-6 py-4 border border-black-600">Consentimiento informado</th>
                        <td class="text-center px-6 py-4 border border-black-600">
                            @if ($cita->arc_consentimiento_informado != "")
                                <a href="{{ asset($cita->arc_consentimiento_informado) }}" download>
                                    <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                        <span>Descargar</span>
                                    </button>
                                </a>
                            @else
                                <p class="text-red-400">Archivo no cargado</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="px-6 py-4 border border-black-600">Fecha de registro</th>
                        <td class="text-center px-6 py-4 border border-black-600">
                            @if ($cita->arc_fecha_registro != "")
                                <a href="{{ asset($cita->arc_fecha_registro) }}" download>
                                    <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                        <span>Descargar</span>
                                    </button>
                                </a>
                            @else
                                <p class="text-red-400">Archivo no cargado</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="px-6 py-4 border border-black-600">Orden Medica</th>
                        <td class="text-center px-6 py-4 border border-black-600">
                            @if ($cita->arc_orden_medica != "")
                                <a href="{{ asset($cita->arc_orden_medica) }}" download>
                                    <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
                                        <span>Descargar</span>
                                    </button>
                                </a>
                            @else
                                <p class="text-red-400">Archivo no cargado</p>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</x-app-layout>

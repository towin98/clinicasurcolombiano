<x-app-layout>
    <div class="py-3">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden  sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class='overflow-x-auto w-full'>
                        <form id="formInforme" action="/citas-informe/excel" method="POST">
                            @csrf
                            <div class="md:flex md:justify-around	">
                                <div class="md:flex md:items-center mb-6">
                                    <div class="md:w-1/3">
                                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="fechaInicial">
                                            Fecha Inicial
                                        </label>
                                    </div>
                                    <div class="md:w-2/3">
                                        <input type="date" name="fechaInicial" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="fechaInicial">
                                    </div>
                                </div>
                                <div class="md:flex md:items-center mb-6">
                                    <div class="md:w-1/3">
                                        <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="fechaFinal">
                                            Fecha Final
                                        </label>
                                    </div>
                                    <div class="md:w-2/3">
                                        <input type="date" name="fechaFinal" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="fechaFinal">
                                    </div>
                                </div>
                                <div class="md:flex md:items-center mb-6">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" title="Buscar registros en el rango de fechas" id="btn-buscar">Buscar</button>
                                </div>
                                <div class="md:flex md:items-center mb-6">
                                    <a href="#" id="informeExcel">
                                        <button type="submit">
                                            <img src="{{ asset('img-sistema/icono-excel.png') }}" class="w-10 cursor-pointer" alt="Excel" title="Descargar Excel con registros">
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </form>

                        <div role="alert" class="pb-5 mx-auto max-w-4xl" id="errores" @if ($errors->any()) style="display: block" @else style="display: none" @endif>
                            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                                Errores
                            </div>
                            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700" id="agregar-errores">
                                @if ($errors->any())
                                <ul>
                                @endif
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                @if ($errors->any())
                                </ul>
                                @endif
                            </div>
                        </div>

                        <table class='mx-auto max-w-4xl w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
                            <thead class="bg-gray-900">
                                <tr class="text-white text-left">

                                <th class="font-semibold text-sm uppercase px-6 py-4 border border-black-600 text-center">Fecha Registro</th>
                                <th class="font-semibold text-sm uppercase px-6 py-4 border border-black-600 text-center">Nombre Completo</th>
                                <th class="font-semibold text-sm uppercase px-6 py-4 border border-black-600 text-center">Numero Documento</th>
                                <th class="font-semibold text-sm uppercase px-6 py-4 border border-black-600 text-center">Ciudad</th>
                                <th class="font-semibold text-sm uppercase px-6 py-4 border border-black-600 text-center">Telefono</th>
                                <th class="font-semibold text-sm uppercase px-6 py-4 border border-black-600 text-center">Correo</th>
                                <th class="font-semibold text-sm uppercase px-6 py-4 border border-black-600 text-center">Consultar</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200" id="body_table">
                                <tr>
                                    <td class="px-6 py-4 border border-black-600"></td>
                                    <td class="px-6 py-4 border border-black-600"></td>
                                    <td class="px-6 py-4 border border-black-600"></td>
                                    <td class="px-6 py-4 border border-black-600"></td>
                                    <td class="px-6 py-4 border border-black-600"></td>
                                    <td class="px-6 py-4 border border-black-600"></td>
                                    <td class="px-6 py-4 border border-black-600"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/cita/informe.js') }}" type="module"></script>
</x-app-layout>



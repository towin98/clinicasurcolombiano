<?php

namespace App\Http\Controllers;

use App\Exports\CitasExport;
use App\Models\Cita;
use App\Models\ServicioCita;
use App\Models\TipoDocumento;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CitaController extends Controller
{
    /**
     * Retorna vista del formulario para agendar cita.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposDocumentos = TipoDocumento::all();
        $serviciosCita   = ServicioCita::all();
        return view("cita.agendar_cita", compact(["tiposDocumentos", "serviciosCita"]));
    }

    /**
     * Muestra vista para generar informe.
     *
     * @return \Illuminate\Http\Response
     */
    public function informeView()
    {
        return view('cita.informe_cita');
    }

    /**
     * Informe de citas entre un rango de fecha.
     *
     * @return \Illuminate\Http\Response
     */
    public function informe($fechaInicial, $fechaFinal)
    {
        $registrosCitas = Cita::select([
                "id",
                "created_at",
                "nombres",
                "apellidos",
                "numero_documento",
                "ciudad",
                "n_telefono",
                "correo"
            ])
            ->whereBetween('created_at', [$fechaInicial . " 00:00:00", $fechaFinal . " 23:00:00"])
            ->get();

            return response()->json([
                'data' => $registrosCitas
            ], 200);
    }

    /**
     * Informe de citas entre un rango de fecha.
     *
     * @return \Illuminate\Http\Response
     */
    public function informeExcel(Request $request)
    {
        $objValidator = Validator::make($request->all(),  Cita::$rulesInforme, Cita::$messagesValidatorsInforme);
        if($objValidator->fails()){
            return back()
            ->withErrors($objValidator)
            ->withInput();
        }

        $registrosCitas = Cita::select([
            "created_at",
            "nombres",
            "apellidos",
            "numero_documento",
            "ciudad",
            "n_telefono",
            "correo"
        ])
        ->whereBetween('created_at', [$request->fechaInicial. " 00:00:00", $request->fechaFinal . " 23:00:00"])
        ->get()
        ->toArray();

        // Columnas títulos
        $headings = array();
        $headings[] = 'Fecha Registro';
        $headings[] = 'Nombres';
        $headings[] = 'Apellidos';
        $headings[] = 'Numero documento';
        $headings[] = 'Ciudad';
        $headings[] = 'Telefono';
        $headings[] = 'Correo';

        $parametros = array();
        $parametros['data']     = $registrosCitas;
        $parametros['headings'] = $headings;
        $parametros['title']    = 'informe'.date('YmdHis');

        return Excel::download(new CitasExport($parametros), 'informe'.date('YmdHis').'.xlsx', null);
    }

    /**
     * Guarda una cita.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $objValidator = Validator::make($request->all(),  Cita::$rules, Cita::$messagesValidators);
        if($objValidator->fails()){
            return response()->json([
                'message' => 'Error de Validación de Datos',
                'errors'  => $objValidator->errors()
            ], 409);
        }

        $arc_documento_identidad      = $this->obtenerArchivo($request->arc_documento_identidad, $request, "arc_documento_identidad");
        $arc_autorizacion_eps         = $this->obtenerArchivo($request->arc_autorizacion_eps, $request, "arc_autorizacion_eps");
        $arc_examen_prequirurgicos    = $this->obtenerArchivo($request->arc_examen_prequirurgicos, $request, "arc_examen_prequirurgicos");
        $arc_examenes_biometricos     = $this->obtenerArchivo($request->arc_examenes_biometricos, $request, "arc_examenes_biometricos");
        $arc_consentimiento_informado = $this->obtenerArchivo($request->arc_consentimiento_informado, $request, "arc_consentimiento_informado");
        $arc_fecha_registro           = $this->obtenerArchivo($request->arc_fecha_registro, $request, "arc_fecha_registro");
        $arc_orden_medica             = $this->obtenerArchivo($request->arc_orden_medica, $request, "arc_orden_medica");

        Cita::create([
            'nombres'                       => strtoupper(trim($request->nombres)),
            'apellidos'                     => strtoupper(trim($request->apellidos)),
            'correo'                        => strtoupper(trim($request->correo)),
            'id_tipo_documento'             => trim($request->id_tipo_documento),
            'numero_documento'              => trim($request->numero_documento),
            'ciudad'                        => strtoupper(trim($request->ciudad)),
            'n_telefono'                    => trim($request->n_telefono),
            'fecha_nacimiento'              => $request->fecha_nacimiento,
            'convenio_paciente'             => strtoupper(trim($request->convenio_paciente)),
            'id_servicios_cita'             => $request->id_servicios_cita,
            'especialidad'                  => strtoupper(trim($request->especialidad)),
            'observacion'                   => strtoupper(trim($request->observacion)),
            'arc_documento_identidad'       => $arc_documento_identidad,
            'arc_autorizacion_eps'          => $arc_autorizacion_eps,
            'arc_examen_prequirurgicos'     => $arc_examen_prequirurgicos,
            'arc_examenes_biometricos'      => $arc_examenes_biometricos,
            'arc_consentimiento_informado'  => $arc_consentimiento_informado,
            'arc_fecha_registro'            => $arc_fecha_registro,
            'arc_orden_medica'              => $arc_orden_medica,
        ]);

        return response()->json([
            'message' => 'La solicitud se ha enviado con exito.'
        ], 201);
    }

    /**
     * Muestra vista de cita con la informacion respectiva.
     *
     * @param  int  $id Id de la cita
     * @return \Illuminate\Http\Response
     */
    public function showCita(Cita $cita)
    {
        $serviciosCita = ServicioCita::all();
        $tiposDocumento = TipoDocumento::all();
        return view("cita.consultar_cita", compact("cita", "serviciosCita", "tiposDocumento"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function obtenerArchivo($archivo,Request $request, $nombreCampo){
        if ($archivo != "") {
            $file = $request->file($nombreCampo);
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->move($nombreCampo,  $fileName);
            return  $nombreCampo ."/".$fileName;
        }else{
            return "";
        }
    }
}

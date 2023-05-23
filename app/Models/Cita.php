<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    // Siguiendo reglas eloquent

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'nombres',
        'apellidos',
        'correo',
        'id_tipo_documento',
        'numero_documento',
        'ciudad',
        'n_telefono',
        'fecha_nacimiento',
        'convenio_paciente',
        'id_servicios_cita',
        'especialidad',
        'observacion',
        'arc_documento_identidad',
        'arc_autorizacion_eps',
        'arc_examen_prequirurgicos',
        'arc_examenes_biometricos',
        'arc_consentimiento_informado',
        'arc_fecha_registro',
        'arc_orden_medica',
    ];

    /**
     * Reglas de validación para el recurso crear.
     *
     * @var array
     */
    public static $rules = [
        'nombres'                       => 'required|string|max:50',
        'apellidos'                     => 'required|string|max:50',
        'correo'                        => 'required|email|max:50',
        'id_tipo_documento'             => 'required',
        'numero_documento'              => 'required|numeric|digits_between:6,11',
        'ciudad'                        => 'required|string|max:30',
        'n_telefono'                    => 'required|numeric|digits_between:6,11',
        'fecha_nacimiento'              => 'required|date',
        'convenio_paciente'             => 'required|string|max:50',
        'id_servicios_cita'             => 'required',
        'especialidad'                  => 'required|string|max:30',
        'observacion'                   => 'nullable|string|max:255',
        'arc_documento_identidad'       => 'nullable|mimes:jpg,png,jpeg,pdf,docx,doc|max:1024', //kb',
        'arc_autorizacion_eps'          => 'nullable|mimes:jpg,png,jpeg,pdf,docx,doc|max:1024', //kb',
        'arc_examen_prequirurgicos'     => 'nullable|mimes:jpg,png,jpeg,pdf,docx,doc|max:1024', //kb',
        'arc_examenes_biometricos'      => 'nullable|mimes:jpg,png,jpeg,pdf,docx,doc|max:1024', //kb',
        'arc_consentimiento_informado'  => 'nullable|mimes:jpg,png,jpeg,pdf,docx,doc|max:1024', //kb',
        'arc_fecha_registro'            => 'nullable|mimes:jpg,png,jpeg,pdf,docx,doc|max:1024', //kb',
        'arc_orden_medica'              => 'nullable|mimes:jpg,png,jpeg,pdf,docx,doc|max:1024', //kb',
    ];

    /**
     *
     *
     * @var array
     */
    public static $rulesInforme = [

        // Campos no pertenecen a la tabla.
        'fechaInicial'  => 'required|date',
        'fechaFinal'    => 'required|date|after_or_equal:fechaInicial'
    ];

    /**
     *
     *
     * @var array
     */
    public static $messagesValidatorsInforme = [
        'fechaInicial.required'                   => 'La fecha inicial es requerida.',
        'fechaInicial.date'                       => 'La fecha inicial debe de ser un formato dd/mm/aaaa.',
        'fechaFinal.required'                     => 'La fecha final es requerida.',
        'fechaFinal.date'                         => 'La fecha final debe de ser un formato dd/mm/aaaa.',
        'fechaFinal.after_or_equal'               => 'La fecha final debe ser una fecha posterior o igual a la fecha inicial.'


    ];

    /**
     * Reglas de validación para el recurso actualizar.
     *
     * @var array
     */
    public static $rulesUpdate = [
    ];

    /**
     * Mensajes personalizados conforme a la reglas de validación.
     *
     * @var array
     */
    public static $messagesValidators = [
        'nombres.required'                    => 'El campo Nombre es requerido.',
        'nombres.max'                         => 'El campo Nombres no puede superar los 50 carácteres.',
        'apellidos.required'                  => 'El campo Apellidos es requerido.',
        'apellidos.max'                       => 'El campo Apellidos no puede superar los 50 carácteres.',
        'correo.required'                     => 'El campo correo electronico es requerido.',
        'correo.email'                        => 'El correo electronico no es válido.',
        'correo.max'                          => 'El correo electronico no puede superar los 50 carácteres.',
        'id_tipo_documento.required'          => 'El campo Tipo de Documento es requerido.',
        'numero_documento.required'           => 'El campo Número de Documento es requerido.',
        'numero_documento.numeric'            => 'El campo Número de Documento debe ser númerico.',
        'numero_documento.digits_between'     => 'El campo Número de Documento debe contener minimo 6 digitos y maximo 11.',
        'ciudad.required'                     => 'El campo Ciudad es requerido.',
        'ciudad.max'                          => 'La Ciudad no puede superar los 30 carácteres.',
        'n_telefono.required'                 => 'El campo Número de Telefono es requerido.',
        'n_telefono.numeric'                  => 'El campo Número de Telefono debe ser númerico',
        'n_telefono.digits_between'           => 'El campo Número de Telefono debe contener minimo 6 digitos y maximo 11.',
        'fecha_nacimiento.required'           => 'La fecha de nacimiento es requerida.',
        'fecha_nacimiento.date'               => 'La fecha de nacimiento debe de ser un formato YYYY-MM-DD',
        'convenio_paciente.required'          => 'El campo convenio del paciente es requerido.',
        'convenio_paciente.max'               => 'La campo convenio del paciente no puede superar los 50 carácteres.',
        'id_servicios_cita.required'          => 'El campo Servicios que requiere para su cita es requerido.',
        'especialidad.required'               => 'El campo Especialidad es requerido.',
        'especialidad.max'                    => 'La campo Especialidad no puede superar los 30 carácteres.',
        'observacion.max'                     => 'La campo Observacion no puede superar los 255 carácteres.',

        'arc_documento_identidad.mimes'       => 'El archivo de Documento de Identidad debe ser un archivo de tipo: jpg, png, jpeg, pdf, docx o doc.',
        'arc_autorizacion_eps.mimes'          => 'El archivo de autorización EPS debe ser un archivo de tipo: jpg, png, jpeg, pdf, docx o doc.',
        'arc_examen_prequirurgicos.mimes'     => 'El archivo de Exámen Prequirúrgicos debe ser un archivo de tipo: jpg, png, jpeg, pdf, docx o doc.',
        'arc_examenes_biometricos.mimes'      => 'El archivo de Exámenes Biométricos debe ser un archivo de tipo: jpg, png, jpeg, pdf, docx o doc.',
        'arc_consentimiento_informado.mimes'  => 'El archivo de Consentimiento informado debe ser un archivo de tipo: jpg, png, jpeg, pdf, docx o doc.',
        'arc_fecha_registro.mimes'            => 'El archivo de Fecha_registro debe ser un archivo de tipo: jpg, png, jpeg, pdf, docx o doc.',
        'arc_orden_medica.mimes'              => 'El archivo de Orden Medica debe ser un archivo de tipo: jpg, png, jpeg, pdf, docx o doc.',

        'arc_documento_identidad.max'       => 'El tamaño del archivo de Documento de Identidad debe ser de máximo de 1024 MB.',
        'arc_autorizacion_eps.max'          => 'El tamaño del archivo de autorización EPS debe ser de máximo de 1024 MB.',
        'arc_examen_prequirurgicos.max'     => 'El tamaño del archivo de Exámen Prequirúrgicos debe ser de máximo de 1024 MB.',
        'arc_examenes_biometricos.max'      => 'El tamaño del archivo de Exámenes Biométricos debe ser de máximo de 1024 MB.',
        'arc_consentimiento_informado.max'  => 'El tamaño del archivo de Consentimiento informado debe ser de máximo de 1024 MB.',
        'arc_fecha_registro.max'            => 'El tamaño del archivo de Fecha_registro debe ser de máximo de 1024 MB.',
        'arc_orden_medica.max'              => 'El tamaño del archivo de Orden Medica debe ser de máximo de 1024 MB.',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d' ,
        'updated_at' => 'datetime:Y-m-d'
    ];
}

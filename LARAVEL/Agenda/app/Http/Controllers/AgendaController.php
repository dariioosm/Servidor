<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Persona;
use App\Models\Imagen;

class AgendaController extends Controller
{
    public function create()
    {
        $personas = Persona::all();
        $imagenes = Imagen::all();
        return view('agenda.create', compact('personas', 'imagenes'));
    }

    public function store(Request $request)
    {
        // Validación de los datos recibidos del formulario
        $request->validate([
            'persona' => 'required|exists:personas,idpersona',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'imagen' => 'required|exists:imagenes,idimagen'
        ]);
    
        // Guardar la nueva entrada en la tabla agenda
        Agenda::create([
            'idpersona' => $request->persona,
            'idimagen' => $request->imagen,
            'fecha' => $request->fecha,
            'hora' => $request->hora
        ]);
    
        // Redireccionar de nuevo al formulario con mensaje de éxito
        return redirect()->route('agenda.create')->with('success', 'Entrada añadida correctamente');
    }
    

    public function show(Request $request)
{
    $personas = Persona::all();

    $agenda = Agenda::select(
            'imagenes.imagen',
            'agenda.fecha',
            'agenda.hora',
            'personas.nombre',
            'personas.apellidos'
        )
        ->join('imagenes', 'imagenes.idimagen', '=', 'agenda.idimagen')
        ->join('personas', 'personas.idpersona', '=', 'agenda.idpersona')
        ->where('agenda.idpersona', $request->persona)
        ->where('agenda.fecha', $request->fecha)
        ->get();

    return view('agenda.show', compact('agenda', 'personas'));
}


}
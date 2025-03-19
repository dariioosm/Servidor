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
        $request->validate([
            'persona' => 'required',
            'fecha' => 'required|date',
            'hora' => 'required|date_format:H:i',
            'imagen' => 'required'
        ]);

        Agenda::create([
            'idpersona' => $request->persona,
            'idimagen' => $request->imagen,
            'fecha' => $request->fecha,
            'hora' => $request->hora
        ]);

        return redirect()->route('agenda.create')->with('success', 'Entrada añadida correctamente');
    }

    public function show(Request $request)
    {
        $agenda = Agenda::select('pictogramas.imagen', 'agenda.fecha', 'agenda.hora')
            ->join('pictogramas', 'pictogramas.id', '=', 'agenda.idimagen')
            ->where('agenda.idpersona', $request->persona)
            ->where('agenda.fecha', $request->fecha)
            ->get();

        return view('agenda.show', compact('agenda'));
    }
}

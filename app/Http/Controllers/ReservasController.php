<?php

namespace App\Http\Controllers;

use App\Models\ReservasModel;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    public function index()
    {
        return ReservasModel::orderBy('fecha')->orderBy('hora')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'   => 'required|string|max:255',
            'fecha'    => 'required|date',
            'hora'     => 'required|date_format:H:i',
            'personas' => 'required|integer|min:1|max:50',
            'telefono' => 'nullable|string|max:30',
            'email'    => 'nullable|email',
            'estado'   => 'nullable|in:pendiente,confirmada,cancelada',
        ]);

        $reserva = ReservasModel::create($validated);
        return response()->json($reserva, 201);
    }

    public function show($id)
    {
        $reserva = ReservasModel::find($id);
        if (!$reserva) {
            return response()->json(['error' => 'Reserva no encontrada'], 404);
        }
        return $reserva;
    }

    public function update(Request $request, $id)
    {
        $reserva = ReservasModel::find($id);
        if (!$reserva) {
            return response()->json(['error' => 'Reserva no encontrada'], 404);
        }

        $validated = $request->validate([
            'nombre'   => 'sometimes|required|string|max:255',
            'fecha'    => 'sometimes|required|date',
            'hora'     => 'sometimes|required|date_format:H:i',
            'personas' => 'sometimes|required|integer|min:1|max:50',
            'telefono' => 'nullable|string|max:30',
            'email'    => 'nullable|email',
            'estado'   => 'nullable|in:pendiente,confirmada,cancelada',
        ]);

        $reserva->update($validated);
        return $reserva;
    }

    public function destroy($id)
    {
        $reserva = ReservasModel::find($id);
        if (!$reserva) {
            return response()->json(['error' => 'Reserva no encontrada'], 404);
        }

        $reserva->delete();
        return response()->noContent();
    }
}

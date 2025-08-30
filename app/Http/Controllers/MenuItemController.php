<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        return MenuItem::orderBy('categoria')->orderBy('nombre')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'categoria' => 'nullable|string|max:100',
            'disponible' => 'boolean',
        ]);

        return MenuItem::create($data);
    }

    public function show(MenuItem $menuItem)
    {
        return $menuItem;
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $data = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'sometimes|required|numeric|min:0',
            'categoria' => 'nullable|string|max:100',
            'disponible' => 'boolean',
        ]);

        $menuItem->update($data);
        return $menuItem;
    }

    public function destroy(MenuItem $menuItem)
    {
        $menuItem->delete();
        return response()->noContent();
    }
}

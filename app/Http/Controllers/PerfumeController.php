<?php

namespace App\Http\Controllers;

use App\Models\Perfume;
use Illuminate\Http\Request;

class PerfumeController extends Controller
{
    public function index(Request $request)
    {
        $query = Perfume::query();

        $allowedFilters = ['brand', 'scent'];

        foreach ($allowedFilters as $field) {
            if ($request->filled($field)) {
                $query->where($field, $request->query($field));
            }
        }

        return response()->json($query->get(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'scent' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'volume' => 'required|integer|min:1',
        ]);

        return response()->json(Perfume::create($validated), 201);
    }

    public function show(Perfume $perfume)
    {
        return response()->json($perfume, 200);
    }

    public function update(Request $request, Perfume $perfume)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'scent' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'volume' => 'required|integer|min:1',
        ]);

        $perfume->update($validated);

        return response()->json($perfume, 200);
    }

    public function destroy(Perfume $perfume)
    {
        $perfume->delete();

        return response()->noContent();
    }
}

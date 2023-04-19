<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    public function table()
    {
        $foods = Food::all();
        return view('food.table', compact('foods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();

        try {

            Food::create([
                'name' => $request->name,
            ]);

            DB::commit();
            return back()->with('success', 'Submited');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();

        try {

            $get = Food::findOrFail($id);
            $get->update([
                'name' => $request->name,
            ]);

            DB::commit();
            return back()->with('success', 'Updated');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {

            $get = Food::findOrFail($id);
            $get->delete();

            DB::commit();
            return back()->with('success', 'Deleled');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function edit($id)
    {
        $get = Food::findOrFail($id);
        return view('food.edit', compact('get'));
    }
}

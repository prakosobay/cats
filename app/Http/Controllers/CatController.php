<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Cat, MasterType};

class CatController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'type_id' => ['numeric', 'required'],
            'color' => ['required', 'string', 'max:255'],
            'food' => ['required', 'string', 'max:255'],
        ]);

        DB::begintrasaction();

        try {

            Cat::create([
                'name' => $request->name,
                'gender' => $request->gender,
                'type_id' => $request->type_id,
                'color' => $request->color,
                'food' => $request->food,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function edit($id)
    {
        $cat = Cat::findOrFail($id);
        $types = MasterType::all();
        return view('cat.edit', compact('cat', 'types'));
    }

    public function update(Request $request, $id)
    {

    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {

            $get = Cat::findOrFail($id);
            $get->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}

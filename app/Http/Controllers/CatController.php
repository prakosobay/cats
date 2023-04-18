<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Cat, MasterType};

class CatController extends Controller
{
    public function index()
    {
        $cats = Cat::with('typeId:id,name')->get();
        return view('dashboard', compact('cats'));
    }

    public function tambah()
    {
        $types = MasterType::all();
        return view('tambah', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'type_id' => ['required'],
            'color' => ['required', 'string', 'max:255'],
            'food' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();

        try {

            Cat::create([
                'name' => $request->name,
                'gender' => $request->gender,
                'type_id' => $request->type_id,
                'color' => $request->color,
                'food' => $request->food,
            ]);

            DB::commit();
            return back()->with('success', 'Submited');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function edit($id)
    {
        $cat = Cat::findOrFail($id);
        $types = MasterType::all();
        return view('edit', compact('cat', 'types'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'type_id' => ['numeric', 'required'],
            'color' => ['required', 'string', 'max:255'],
            'food' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();

        try {

            $get = Cat::findOrFail($id);
            $get->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'type_id' => $request->type_id,
                'color' => $request->color,
                'food' => $request->food,
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

            $get = Cat::findOrFail($id);
            $get->delete();

            DB::commit();
            return back()->with('success', 'Deleted');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}

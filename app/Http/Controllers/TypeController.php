<?php

namespace App\Http\Controllers;

use App\Models\MasterType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    public function table()
    {
        $types = MasterType::all();
        return view('type.table', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        DB::beginTransaction();

        try {

            MasterType::create([
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

            $get = MasterType::findOrFail($id);
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

            $get = MasterType::findOrFail($id);
            $get->delete();

            DB::commit();
            return back()->with('success', 'Deleted');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function edit($id)
    {
        $type = MasterType::findOrFail($id);
        return view('type.edit', compact('type'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{Cat, Food, MasterType};

class CatController extends Controller
{
    public function index()
    {
        $cats = DB::table('cats')
            ->join('cat_foods', 'cat_foods.cat_id', '=', 'cats.id')
            ->join('foods', 'cat_foods.food_id', '=', 'foods.id')
            ->join('master_types', 'cats.type_id', '=', 'master_types.id')
            ->select('cats.*', 'foods.name as food_name', 'master_types.name as type_name')
            ->get();
        return view('dashboard', compact('cats'));
    }

    public function tambah()
    {
        $types = MasterType::all();
        $foods = Food::all();
        return view('tambah', compact('types', 'foods'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'type_id' => ['required'],
            'color' => ['required', 'string', 'max:255'],
            'food_id' => ['required'],
        ]);

        DB::beginTransaction();

        try {

            Cat::create([
                'name' => $request->name,
                'gender' => $request->gender,
                'type_id' => $request->type_id,
                'color' => $request->color,
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
        $foods = Food::all();
        return view('edit', compact('cat', 'types', 'foods'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
            'type_id' => ['numeric', 'required'],
            'color' => ['required', 'string', 'max:255'],
            'food' => ['required'],
        ]);

        DB::beginTransaction();

        try {

            $get = Cat::findOrFail($id);
            $get->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'type_id' => $request->type_id,
                'color' => $request->color,
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

    public function type_sum()
    {
        $sum = DB::table('cats')
            ->join('master_types', 'cats.type_id', '=', 'master_types.id')
            ->select('master_types.name as type', 'gender', DB::raw('count(*) as count'))
            ->groupBy('type', 'gender')
            ->get();
            // dd($sum);
        return view('typeSum', compact('sum'));
    }

    public function food_sum()
    {
        return view('foodSum', compact('sum'));
    }

    public function spend_sum()
    {
        return view('spendSum', compact('sum'));
    }
}

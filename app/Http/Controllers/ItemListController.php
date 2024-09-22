<?php

namespace App\Http\Controllers;

use App\Models\ItemList as ListModel;
use Illuminate\Http\Request;

class ItemListController extends Controller
{
    public function index()
    {
        $lists = ListModel::all();
        return response()->json($lists);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $list = ListModel::create($request->all());
        return response()->json($list, 201);
    }
}

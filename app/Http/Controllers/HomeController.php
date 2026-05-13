<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $types = Type::orderBy('name')->get();

        $query = Product::query()
            ->with('type')
            ->where('quantity', '>', 0)
            ->where('price', '>', 0);


        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }

        if ($request->type_id) {
            $query->where('type_id', $request->type_id);
        }

        /* pode ser feito assim também */
        /*->when($request->type_id, function ($query, $typeId) {
                $query->where('type_id', $typeId);
            })
            ->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })*/

        $products = $query->orderBy('name')->get();

        return view('welcome', compact('products', 'types'));
    }
}

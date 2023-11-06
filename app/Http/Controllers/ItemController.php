<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
class ItemController extends Controller
{
    public function index()
    {
        $items = auth()->user()->items;
return view('items.index', [
            'items' => Item::sortByNameAsc()->filter(
                        request(['search'])
                    )->paginate(6)->withQueryString()
        ]);
    }
    public function create()
    {
        return view('items.create');
    }
    public function store() 
    {
        $attributes = request()->validate(
            [
                'name' => 'required',
                'quantity' => 'required',
                'description' => 'required'
               
            ]
            );
            $attributes['user_id'] = auth()->id();
            Item::create($attributes);
            return redirect('/');
    }
    public function edit(Item $item) 
    {
        return view('items.edit',['item' => $item]);
    }
    public function update(Item $item)
    {
        $attributes = request()->validate(
            [
                'name' => 'required',
                'quantity' => 'required',
                'description' => 'required'
               
            ]
            );
            $item->update($attributes);
            return redirect('/')->with('success', 'Item Updated!');; 
    }
    public function destroy(Item $item)
    {
           $item->delete();
           return back()->with('success', 'Item Deleted!');
    }
}

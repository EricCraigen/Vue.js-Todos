<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Item::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_item = new Item;
        $new_item->name = $request->item['name'];
        $new_item->group = $request->item['group'];
        $new_item->save();

        return $new_item;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existing_item = Item::find($id);
        if ($existing_item) {
            $existing_item->group = $request->item['group'] ? $request->item['group'] : null;
            $existing_item->status = $request->item['status'] ? $request->item['status'] : null;
            $existing_item->completed = $request->item['completed'] ? true : false;
            $existing_item->completed_at = $request->item['completed'] ? now() : null;
            $existing_item->save();
            return $existing_item;
        } else {
            return "Item not found!";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existing_item = Item::find($id);
        if ($existing_item) {
            $existing_item->delete();
            return "Item successfully deleted!";
        } else {
            return "Item not found!";
        }
    }
}

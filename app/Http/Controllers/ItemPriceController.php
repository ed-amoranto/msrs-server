<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemPriceRequest;
use App\Models\ItemPrice;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ItemPriceController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ItemPrice::get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemPriceRequest $request)
    {
        //get validated data
        $validated = $request->validated();
        //manually insert created_by and created_at
        foreach ($validated as $ind => $val) {
            $validated[$ind] = array_merge(
                $validated[$ind],
                ["created_by" => Auth::user()->id],
                ["created_at" => Carbon::now()->toDateTimeString()]
            );
        }
        //Batch Insert the record
        $items = ItemPrice::insert($validated);
        return $this->success([
            'items' => $validated,
        ], 'Registered Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        return 'test';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

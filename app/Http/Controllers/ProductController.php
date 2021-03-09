<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        var_dump($request);

        if (isset($request->sku) && isset($request->code) && isset($request->active) && isset($request->price)) {

            $validated = $request->validate([
                'sku' => 'required|unique:posts|max:20',
                'code' => 'required|unique:posts|max:20',
                'active' => 'required',
                'price' => 'required'

            ]);

            if($validated){
                $product = new Product();
                $product->setSku($request->sku);
                $product->setCode($request->code);
                $product->setActive($request->active);
                $product->setPrice($request->price);

                $product->save();

                return response()->json([
                    'code' => '200',
                    'msg' => 'Everything fine',
                ]);

            }else{
                return response()->json([
                    'code' => '502',
                    'msg' => 'request Failed',
                ]);
            }
        }

        return response()->json([
            'code' => '501',
            'msg' => 'error in creation',
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

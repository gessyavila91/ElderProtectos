<?php

namespace App\Http\Controllers;

use App\Models\matComponent;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);

        return view('product.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function create(Request $request) {
        return view('product.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return string
     */
    public function valid(Request $request){
        $response = [
            'data' => null,
            'result' => false,
            'msg' => 'Error',
        ];

        $data = [];


        if (isset($request->matCode)){

            if (preg_match('/M-C[A-Z]+-F[A-Z]+-L[A-Z]+/',$request->matCode)) {

                if (count(explode("-", $request->matCode)) == 4) {

                    $separeCode = explode("-", $request->matCode);

                    if($separeCode[0] = 'm') {
                        if (substr($separeCode[1],0,1) == 'C') {
                            $macComponentColor = DB::table('mat_components')
                                ->where('code',substr($separeCode[1],1,strlen($separeCode[1])-1))
                                ->Where('type','C')
                                ->first();
                            $data['matComponnentColor'] = ((array)$macComponentColor);

                            if (isset($macComponentColor)) {
                                $data['matComponnentColor'] = ((array)$macComponentColor);
                            }else{
                                $data['matComponnentColor'] = 'Colo NotFound';
                            }

                        }
                        if (substr($separeCode[2],0,1) == 'F') {
                            $macComponentFrame = DB::table('mat_components')
                                ->where('code',substr($separeCode[2],1,strlen($separeCode[2])-1))
                                ->Where('type','F')
                                ->first();

                            if (isset($macComponentFrame)) {
                                $data['matComponnentFrame'] = ((array)$macComponentFrame);
                            }else{
                                $data['matComponnentFrame'] = 'Frame NotFound';
                            }

                        }
                        if (substr($separeCode[3],0,1) == 'L') {
                            $macComponentLogo = DB::table('mat_components')
                                ->where('code',substr($separeCode[3],1,strlen($separeCode[3])-1))
                                ->Where('type','L')
                                ->first();

                            if (isset($macComponentLogo)) {
                                $data['matComponnentLogo'] = ((array)$macComponentLogo);
                            }else{
                                $data['matComponnentLogo'] = 'Logo NotFound';
                            }
                        }

                        $data['matCode']            = $request->matCode;

                        $response['result']             = true;
                        $response['msg']                = 'Mat Code Fine';
                        $response['data'] = $data;

                    }else{

                        $response['data'] = $request->matCode;
                        $response['msg']  = 'Invalid Code: code isnot a MatCode';

                    }

                }else{

                    $response['data']=$request->matCode;
                    $response['msg'] ='Invalid Format PlaymatFormat';
                }
            }else{
                $response['data'] = $request->matCode;
                $response['msg'] = 'Invalid code format';
            }
        } else {
            $response['msg'] = 'invalid Code';
        }

        return response()->json($response);

    }

    /**
     * Store a new Product
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'sku' => 'required',
            'code' => 'required',
            'price' => 'required'
        ]);

        Product::create($request->all());

        return redirect()->route('product.index')
            ->with('success', 'Product created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', compact('product'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $product->update($request->all());

        return redirect()->route('product.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')
            ->with('success', 'Product deleted successfully');
    }
}

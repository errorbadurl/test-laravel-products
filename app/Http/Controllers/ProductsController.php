<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Validator;

class ProductsController extends Controller
{

    public function index()
    {
        $data = Products::get();
        return view('products', ['data' => $data]);
    }

    public function productCreate(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:191',
                'price' => 'required|min:0',
            ]);

            if ($validator->fails())
            {
                return redirect('/product-create')->withErrors($validator);
            }

            $product = new Products;
            $product->name = $request->name;
            $product->price = $request->price;
            $product->save();

            return redirect('/')->with('success', 'Product created successfully.');
        }

        return view('productsCreate');
    }

    public function productUpdate(Request $request, $id=null)
    {
        if ($id)
        {
            $product = Products::find($id);

            if ($product)
            {
                if ($request->isMethod('post'))
                {
                    $validator = Validator::make($request->all(), [
                        'name' => 'required|max:191',
                        'price' => 'required|min:0',
                    ]);

                    if ($validator->fails())
                    {
                        return redirect('/product-update/{$id}')->withErrors($validator);
                    }

                    $product = Products::find($id);
                    $product->name = $request->name;
                    $product->price = $request->price;
                    $product->save();

                    return redirect('/')->with('success', 'Product updated successfully.');
                }

                return view('productsUpdate', $product);
            }
        }

        return redirect('/')->withErrors(['Product does not exist.']);
    }

    public function productDelete($id=null)
    {
        if ($id)
        {
            $product = Products::find($id);

            if ($product)
            {
                $product->delete();
                return redirect('/')->with('success', 'Product deleted successfully.');
            }
        }

        return redirect('/')->withErrors(['Something went wrong.']);
    }

}

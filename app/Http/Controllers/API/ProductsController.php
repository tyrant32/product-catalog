<?php
declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

/**
 * Class ProductsController
 * @package App\Http\Controllers\API
 */
class ProductsController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index()
    {
        $products = Product::where(['user_id' => Auth::user()->id])
            ->all();
    
        return response()
            ->json($products->jsonSerialize(), Response::HTTP_OK);
    }
    
    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
    
        return response()->json($product->jsonSerialize(), Response::HTTP_OK);
    }
    
    /**
     * @return JsonResponse
     */
    public function create()
    {
        request()->merge([
            'user_id' => Auth::user()->id
        ]);
        
        $product = Product::create(request()->all());
    
        return response($product->jsonSerialize(), Response::HTTP_CREATED);
    }
    
    /**
     * @param $id
     * @return JsonResponse
     */
    public function update($id)
    {
        request()->merge([
            'user_id' => Auth::user()->id
        ]);
        
        $product = Product::findOrFail($id);
        $product->fill(request()->all());
        $product->save();
    
        return response(null, Response::HTTP_OK);
    }
    
    /**
     * @param $id
     * @return JsonResponse
     */
    public function delete($id)
    {
        Product::destroy($id);
    
        return response(null, Response::HTTP_OK);
    }
}

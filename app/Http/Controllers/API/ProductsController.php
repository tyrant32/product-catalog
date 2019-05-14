<?php
declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use Auth;
use Cache;
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
        $products = Cache::remember(md5('products-list'), 60, function () {
            return (new Product)
                ->where(['user_id' => Auth::user()->id])
                ->get();
        });
    
        return response()
            ->json($products->jsonSerialize(), Response::HTTP_OK);
    }
    
    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $product = Cache::remember(md5('product-show-'.$id), 60, function () use ($id) {
            return (new Product)->where(['user_id' => Auth::user()->id])
                ::findOrFail($id);
        });
    
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
    
        Cache::flush();
    
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
    
        Cache::flush();
    
        return response(null, Response::HTTP_OK);
    }
    
    /**
     * @param $id
     * @return JsonResponse
     * @throws \Exception
     */
    public function delete($id)
    {
        (new Product)
            ->where(['id' => $id])
            ->where(['user_id' => Auth::user()->id])
            ->delete();
    
        Cache::flush();
    
        return response(null, Response::HTTP_OK);
    }
}

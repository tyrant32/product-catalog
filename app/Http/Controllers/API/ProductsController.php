<?php
declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\JsonResponse;

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
        return response()->json((new Product)->paginate());
    }
    
    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        return response()->json([]);
    }
    
    /**
     * @return JsonResponse
     */
    public function create()
    {
        return response()->json([]);
    }
    
    /**
     * @param $id
     * @return JsonResponse
     */
    public function update($id)
    {
        return response()->json([]);
    }
    
    /**
     * @param $id
     * @return JsonResponse
     */
    public function delete($id)
    {
        return response()->json([]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\Product\ProductService;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    protected $productService;

    /**
     * ProductController constructor.
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }


    /**
     * Display a paginated list of products based on the provided quantity.
     * 
     * @param ProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ProductRequest $request)
{
    $quantity = $request->input('quantity', 10); // Default to 10 if not provided
    $products = $this->productService->getPaginatedProducts($quantity);

    // Convert the paginated result into an array
    $paginated = $products->toArray();

    // Customize the response to match the required structure
    $customResponse = [
        'total' => $paginated['total'],
        'per_page' => $paginated['per_page'],
        'current_page' => $paginated['current_page'],
        'last_page' => $paginated['last_page'],
        'first_page_url' => $paginated['first_page_url'],
        'last_page_url' => $paginated['last_page_url'],
        'next_page_url' => $paginated['next_page_url'],
        'prev_page_url' => $paginated['prev_page_url'],
        'path' => $paginated['path'],
        'from' => $paginated['from'],
        'to' => $paginated['to'],
        'data' => ProductResource::collection($products)->resolve(),
    ];

    return response()->json($customResponse, 200);
}

    /**
     * Store a newly created product in storage.
     * 
     * @param ProductRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductRequest $request)
    {
        $productData = $request->validated();
        $product = $this->productService->createProduct($productData);

        return (new ProductResource($product))
            ->response()
            ->setStatusCode(201);
    }
}

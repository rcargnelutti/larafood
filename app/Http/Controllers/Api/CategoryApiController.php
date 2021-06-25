<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function categoriesByTenant(TenantFormRequest $request)
    {
        // if (!$request->token_company){
        //     return response()->json(['message' => 'Token Not Found'], 404);
        // }

        //return $this->categoryService->getCategoriesById($request->id);
        return CategoryResource::collection($this->categoryService->getCategoriesById($request->token_company));
    }
}

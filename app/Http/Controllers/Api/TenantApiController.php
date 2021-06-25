<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TenantResource;
use App\Models\Tenant;
use App\Services\TenantService;
use Illuminate\Http\Request;

class TenantApiController extends Controller
{
    protected $tenantService;

    public function __construct(TenantService $tenantService)
    {
        $this->tenantService = $tenantService;
    }

    public function index(Request $request)
    {
        //dd('chegou na index');
        $per_page = (int) $request->get('per_page', 15);
        return TenantResource::collection($this->tenantService->getAllTenants($per_page));
    }

    public function show($id)
    {
        $tenant = $this->tenantService->getTenantById($id);
        return new TenantResource($tenant);
    }

}

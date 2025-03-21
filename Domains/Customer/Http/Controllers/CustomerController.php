<?php

namespace Domains\Customer\Http\Controllers;

use App\Http\Controllers\Controller;
use Domains\Customer\Http\Requests\DeleteCustomerRequest;
use Domains\Customer\Http\Requests\StoreCustomerRequest;
use Domains\Customer\Http\Requests\UpdateCustomerRequest;
use Domains\Customer\Services\CustomerService;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(CustomerService $customerService): JsonResponse
    {
        return $customerService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request, CustomerService $customerService): JsonResponse
    {
        return $customerService->store($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, CustomerService $customerService): JsonResponse
    {
        return $customerService->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, string $id, CustomerService $customerService): JsonResponse
    {
        return $customerService->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeleteCustomerRequest $request, string $id, CustomerService $customerService): JsonResponse
    {
        // not found (error 404 has been addressed in DeleteCustomerRequest so no need to check)
        return $customerService->destroy($id);
    }
}

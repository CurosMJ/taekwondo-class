<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\Admin\Product\IndexProduct;
use App\Http\Requests\Admin\Product\StoreProduct;
use App\Http\Requests\Admin\Product\UpdateProduct;
use App\Http\Requests\Admin\Product\DestroyProduct;
use Brackets\AdminListing\Facades\AdminListing;
use App\Models\Product;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param  IndexProduct $request
     * @return Response|array
     */
    public function index(IndexProduct $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Product::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'description', 'cost_price', 'selling_price'],

            // set columns to searchIn
            ['id', 'name', 'description']
        );

        if ($request->ajax()) {
            return ['data' => $data];
        }

        return view('admin.product.index', ['data' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('admin.product.create');

        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreProduct $request
     * @return Response|array
     */
    public function store(StoreProduct $request)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Store the Product
        $product = Product::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/products'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  Product $product
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Product $product)
    {
        $this->authorize('admin.product.show', $product);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product $product
     * @return Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Product $product)
    {
        $this->authorize('admin.product.edit', $product);

        return view('admin.product.edit', [
            'product' => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateProduct $request
     * @param  Product $product
     * @return Response|array
     */
    public function update(UpdateProduct $request, Product $product)
    {
        // Sanitize input
        $sanitized = $request->validated();

        // Update changed values Product
        $product->update($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/products'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  DestroyProduct $request
     * @param  Product $product
     * @return Response|bool
     * @throws \Exception
     */
    public function destroy(DestroyProduct $request, Product $product)
    {
        $product->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    }

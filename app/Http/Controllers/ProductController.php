<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductSearchResource;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductController extends Controller
{
    /**
     * @var ProductRepositoryInterface $productRepository 
     */
    private $productRepository;

    /**
     * ProductController Constructor
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $products = [];

        if (isset($request->keyword) && !empty($request->keyword)) {
            if (isset($request->forAjax) && $request->forAjax != 0) {
                return response()->json(ProductSearchResource::collection(
                    $products = $this->productRepository
                        ->searchAll('title', $request->keyword)
                ));
            } else {
                $products = $this->productRepository
                    ->searchAllPaginated('title', $request->keyword, 25);
            }
        } else {
            $products = $this->productRepository->paginated(25);
        }

        return view('products.index', [
            'products' => $products,
            'keyword' => $request->keyword ?? ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->productRepository->rules());

        $data = $request->except(['_token', 'image']);

        if ($request->has('image')) {
            $data['image'] = $request->file('image')->store('images');            
        }
                
        $this->productRepository->create($data);

        return redirect()->route('products.index')
            ->with('success', __('Created Successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('products.show', [
            'product' => $this->productRepository->find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.edit', [
            'product' => $this->productRepository->find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate($this->productRepository->rules());

        $data = $request->except(['_token', 'image']);
        
        if ($request->has('image')) {
            $imagePath = $request->file('image')->store('images');            
            $data['image'] = $imagePath;
        }
        
        $this->productRepository->update($id, $data);

        return redirect()->route('products.index')
            ->with('success', __('Updated Successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productRepository->delete($id);

        return redirect()->route('products.index')
            ->with('success', __('Deleted Successfully'));
    }
}

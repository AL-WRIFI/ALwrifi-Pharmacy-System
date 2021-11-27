<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\PharmacyRepositoryInterface;

class PharmacyController extends Controller
{
    /**
     * @var PharmacyRepositoryInterface $pharmacyRepository 
     */
    private $pharmacyRepository;

    /**
     * PharmacyController Constructor
     */
    public function __construct(PharmacyRepositoryInterface $pharmacyRepository)
    {
        $this->pharmacyRepository = $pharmacyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pharmacies.index', [
            'pharmacies' => $this->pharmacyRepository->paginated(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pharmacies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->pharmacyRepository->rules());

        $data = $request->except(['_token', 'logo']);

        if ($request->has('logo')) {
            $data['logo'] = $request->file('logo')->store('images');            
        }
                
        $this->pharmacyRepository->create($data);

        return redirect()->route('pharmacies.index')
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
        return view('pharmacies.show', [
            'pharmacy' => $this->pharmacyRepository->find($id)
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
        return view('pharmacies.edit', [
            'pharmacy' => $this->pharmacyRepository->find($id)
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
        $request->validate($this->pharmacyRepository->rules());

        $data = $request->except(['_token', 'logo']);
        
        if ($request->has('logo')) {
            $logoPath = $request->file('logo')->store('images');            
            $data['logo'] = $logoPath;
        }
        
        $this->pharmacyRepository->update($id, $data);

        return redirect()->route('pharmacies.index')
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
        $this->pharmacyRepository->delete($id);

        return redirect()->route('pharmacies.index')
            ->with('success', __('Deleted Successfully'));
    }

    /**
     * Show the form for adding product to pharmacy.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addProductView($id)
    {
        return view('pharmacies.add_product', ['id' => $id]);
    }

    /**
     * Add product to pharmacy.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Request $request)
    {
        $this->pharmacyRepository->attach(
            $request->pharmacy_id, 
            'products',
            $request->product_id,
            [
                'price' => $request->price,
                'quantity' => $request->quantity,
            ]
        );

        return redirect()->route('pharmacies.show', $request->pharmacy_id)
            ->with('success', __('Added Successfully'));
    }

    /**
     * Remove product from pharmacy.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removeProduct(Request $request)
    {
        $this->pharmacyRepository->detach(
            $request->pharmacy_id, 
            'products',
            $request->product_id
        );

        return redirect()->route('pharmacies.show', $request->pharmacy_id)
            ->with('success', __('Removed Successfully'));
    }
}

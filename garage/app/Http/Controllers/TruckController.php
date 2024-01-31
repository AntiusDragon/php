<?php

namespace App\Http\Controllers;

use App\Models\Truck;
use App\Models\Mechanic;
use App\Http\Requests\StoreTruckRequest;
use App\Http\Requests\UpdateTruckRequest;
use Illuminate\Http\Request;

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sorts = Truck::getSorts();
        $sortBy = $request->query('sort', '');
        $perPageSelect = Truck::getPerPageSelect();
        $perPage = (int) $request->query('per_page', 0);
        $s = $request->query('s', ''); // tai ko ieškom
        $trucks = Truck::query();

        if ($s) {
            $keywords = explode(' ', $s);
            if (count($keywords) > 1) {
                $trucks = $trucks->where(function ($query) use ($keywords) {
                    foreach (range(0, 1) as $index) {
                        $query->orWhere('brand', 'like', '%'.$keywords[$index].'%')
                        ->where('plate', 'like', '%'.$keywords[1 - $index].'%');
                    }
                });
            } else {
                $trucks = $trucks
                    ->where('brand', 'like', "%{$s}%")
                    ->orWhere('plate', 'like', "%{$s}%");
            }
        }

        $trucks = match($sortBy) {
            'model_asc' => $trucks->orderBy('brand'),
            'model_desc' => $trucks->orderByDesc('brand'),
            default => $trucks,
        };
        if ($perPage > 0) {
            $trucks = $trucks->paginate($perPage)->withQueryString();
        } else {
            $trucks = $trucks->get();
        }

        return view('trucks.index', [
            'trucks' => $trucks,
            'sorts' => $sorts,
            'sortBy' => $sortBy,
            'perPageSelect' => $perPageSelect,
            'perPage' => $perPage,
            's' => $s,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mechanics = Mechanic::all();

        return view('trucks.create', [
            'mechanics' => $mechanics,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTruckRequest $request)
    {
        Truck::create($request->all());

        return redirect()->route('trucks-index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Truck $truck)
    {
        return view('trucks.show', [
            'truck' => $truck,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Truck $truck)
    {
        $mechanics = Mechanic::all();
        
        return view('trucks.edit', [
            'truck' => $truck,
            'mechanics' => $mechanics,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTruckRequest $request, Truck $truck)
    {
        $truck->update($request->all());

        return redirect()->route('trucks-index');
    }

        /**
     * Confirm remove the specified resource from storage.
     */

     public function delete(Truck $truck)
     {
        return view('trucks.delete', [
            'truck' => $truck,
        ]);
     }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Truck $truck)
    {
        $truck->delete();

        return redirect()->route('trucks-index');
    }
}

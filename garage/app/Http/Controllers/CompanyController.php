<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        // $companies = Company::all();
        
        return view('companies.index', [
            'sorts' => Company::getSorts(),
        ]);
    }

    public function create()
    {
        //
    }

    public function store(StoreCompanyRequest $request)
    {
        $id = Company::create($request->all())->id;

        //json respone
        return response()->json([
            'message' => 'Jūs esate šaunuolis. Įmonė sėkmingai sukurta!',
            'id' => $id
        ]);
    }

    public function list(Request $request)
    {
        $companies = Company::query();

        if ($request->has('sort')) {
            match($request->input('sort')) {
                'name_asc' => $companies->orderBy('name'),
                'name_desc' => $companies->orderByDesc('name'),
                default => $companies,
            };
        }

        $companies = $companies->paginate(10)->withQueryString();

        // dump($companies->toArray());

        $html = view('companies.list', [
            'companies' => $companies,
            ])->render();

        return response()->json([
            'html' => $html,
        ]);
    }

    public function delete(Company $company)
    {
        $html = view('companies.delete', ['company' => $company])->render();

        return response()->json([
            'html' => $html,
        ]);
    }

    public function show(Company $company)
    {
        $html = view('companies.show', ['company' => $company])->render();
        return response()->json([
            'html' => $html,
        ]);
    }

    public function edit(Company $company)
    {
        $html = view('companies.edit', ['company' => $company])->render();
        return response()->json([
            'html' => $html,
        ]);
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->all());
        
        return response()->json([
            'message' => 'Jūs daugiau nei šaunuolis. Įmonė sėkmingai atnaujinta!'
        ]);
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return response()->json([
            'message' => 'Jums pavyko! Įmonė sėkmingai ištrinta!'
        ]);
    }
}

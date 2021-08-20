<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::latest()->paginate(10);

        return view('admin.companies.index', compact('companies'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateCompanies($request, 'store');

        $image_name = time().$request->logo->getClientOriginalName(); 
        //$request->logo->move(public_path('images'), $image_name);
        $request->logo->storeAs('public', $image_name);
        //$request->logo = time().'.'.$request->logo->extension();
        
        $company = Companies::create($request->all());
        $logo = $image_name ;
        $company->logo = $logo;

        $company->save();

        return redirect()->route('companies.index')
            ->with('success', 'Company created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $companies, $id)
    {
        $company = $companies->find($id);
        return view('admin.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(Companies $companies, $id)
    {
        $company = $companies->find($id);
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Companies $companies, $id)
    {
        $this->validateCompanies($request, 'update');

        $companies->find($id)->update($request->all());

        return redirect()->route('companies.index')
            ->with('success', 'Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companies $companies, $id)
    {
        $companies->find($id)->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully');
    }


    /**
     * validate Companies.
     *
     * @param $request
     */
    public function validateCompanies(Request $request, $action)
    {
        $regex = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';
        if($action == 'store'){
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'website' => 'required|regex:'.$regex,
                'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=150,min_height=150',
            ]); 
        }
        else{
           $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'website' => 'required|regex:'.$regex,
            ]); 
        }
        

    }
}

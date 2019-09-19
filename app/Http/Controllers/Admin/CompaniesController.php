<?php

namespace App\Http\Controllers\Admin;

use App\Companies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Companies::latest()->paginate(10);
        return view('admin.companies.index' , compact('data'))
            ->with('i',(request()->input('page', 1) -1) *10);

//        $companies = Companies::all();
//        return view('admin.companies.index', compact('companies'));
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
        {
            $request->validate([
                'name'         =>    'required',
                'email'        =>    'required',
                'logo'         =>    'required',
                'website'      =>    'required'

            ]);
            $form_data = array(
                'name'    => $request->name,
                'email'   => $request->email,
                'logo'    => $request->logo,
                'website' => $request->website
            );
            Companies::create($form_data);
            return redirect()->route('admin.companies.index')
                ->with('success', 'Data Added successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $companies)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function edit(Companies $companies)
    {
        return view('admin.companies.edit',compact('companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Companies $companies)
    {
        $companies->update($request->all());
        return redirect()->route('admin.companies.index')
            ->with('success', 'Data is successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companies $companies)
    {
        $companies-> delete();
        return redirect()->route('admin.companies.index')
            ->with('success', 'Data is successfully delete!');
    }
}

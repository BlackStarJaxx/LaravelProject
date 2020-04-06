<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Mail\CompanyFormMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Redirect,Response,DB,Config;
use Datatables;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::latest()->paginate(200);
        return view('admin.companies.index' , ["companies"=>$companies])
            ->with((request()->input('page')));

    }

    public function create()
    {
        $companies=Company::all();

        return view('admin.companies.create',["companies"=>$companies]);
    }

    public function store(StoreCompanyRequest $request)
    {
        $data=$request->validated();
        if($request->logo){
            $path = $request->logo->store('public/uploads');
            $data['logo']=asset(str_replace('public','storage',$path));
        }

        Mail::to('blackstarjaxx07@gmail.com')->send(new CompanyFormMail($request->all()));

        Company::create($data);
          return redirect()->route('admin.companies.index')
            ->with('success', 'Data Added Successfully');
    }
    public function show(Company $companies)
    {
        //
    }

    public function edit(Company $companies, $id)
    {
        $companies = Company::find($id);

        return view('admin.companies.edit',compact('companies'));
    }

    public function update(UpdateCompanyRequest $request, Company $companies, $id )
    {
        $data=$request->validated();
        if($request->logo){
            $path = $request->logo->store('public/uploads');
            $data['logo']=asset(str_replace('public','storage',$path));
        }
            $companies = Company::find($id);

            $companies->update($data);
            return redirect()->route('admin.companies.index')
                ->with('success', 'Data is successfully updated!');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('admin.companies.index')
            ->with('success', 'Data is successfully delete!');
    }

}



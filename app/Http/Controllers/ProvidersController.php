<?php

namespace App\Http\Controllers;

use File;
use Session;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProvidersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['provider'])->except('show');
    }

    public function company(Request $request)
    {
        $user = Auth::user();
        $company = $user->company()->first();
        return view('Job_Provider.company',compact('user','company'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required|unique:companies',
            'street' => 'string|required',
            'city' => 'string|required',
            'phone' => 'required|max:10',
            'site_link' => 'url|nullable',
            'description' => 'string|required',
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->street = $request->street;
        $company->city = $request->city;
        $company->phone = $request->phone;
        $company->site_link = $request->site_link;
        $company->description = $request->description;
        $company->user_id = auth()->user()->id;
        $company->save();
        return redirect()->back();
        Session::flash('success','Company Information Saved!');

    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'string|required',
            'street' => 'string|required',
            'city' => 'string|required',
            'phone' => 'required|max:10',
            'site_link' => 'url|nullable',
            'description' => 'string|required',
        ]);

        $user = Auth::user();
        $company = $user->company()->first();
        $company->name = $request->name;
        $company->street = $request->street;
        $company->city = $request->city;
        $company->phone = $request->phone;
        $company->site_link = $request->site_link;
        $company->description = $request->description;
        $company->user_id = $user->id;
        $company->save();
        return redirect()->back();
        Session::flash('success','Company Information Saved!');

    }

    public function storeLogo(Request $request)
    {
        $user = Auth::user();
        $company = $user->company()->first();

        //delete old file
        if($company->logo){
            File::delete(public_path('logo/'. $company->logo));
        }
        //store new file
        if($request->hasFile('companyLogo')){
            $image = $request->file('companyLogo');
            $type = pathinfo($image, PATHINFO_EXTENSION);
            $filename = time().'.'.$image->GetClientOriginalExtension();
            $location = $request->file('companyLogo')->storeAs('public/logo', $filename);
            $company->logo = $filename;
        }
        $company->save();
        Session::flash('success','Company logo added Successfully!');
        return redirect()->back();

    }

    public function show($id) //user_id
    {
        $company = Company::where('user_id', $id)->first();
        return view('Job_Provider.show',compact('company'));

    }
}

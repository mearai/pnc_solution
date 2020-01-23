<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Mail\NewUserNotification;
use Illuminate\Support\Facades\Mail;
class CompanyController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data = company::simplePaginate(10);
       return view('companies' , ['compines' => $data]); //
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addCompanies'); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



    
        try {
            request()->validate([
             'cname' => 'required',
             'cemail' => 'required',
             'cwebsite' => 'required',

            'clogo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|dimensions:min_width=100,min_height=100',

        ]);

           $uploaded_image = '';
        if($request->hasFile('clogo')){
          $imageName = time().'.'.request()->clogo->getClientOriginalExtension();

            request()->clogo->move(public_path('/assets'), $imageName);


         $inserted =    Company::create([
          'name' => $request->get('cname'),
          'email'=> $request->get('cemail'),
          'logo'=> $imageName,
          'website'=> $request->get('cwebsite')
        ]);
           if($inserted){
            return back()->with('success', 'You have just created one item');
            Mail::to('mearani@gmail.com')->send(new NewUserNotification);
           }else{

            return back()->with('error', 'erronr in inserted data');
           }
            


            
}




 } catch (\Exception $ex) {
            DB::rollback();
            throw $ex;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id ,Company $company)
    {
        $company = Company::where('id', $id)->first();
     return view('viewCompany' , ['company' => $company]); 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id , Company $company)
    {
        $company = Company::where('id', $id)->first();
     return view('editCompany' , ['company' => $company]); //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update($id , Request $request, Company $company)
    {

         


          try {
            request()->validate([
             'cname' => 'required',
             'cemail' => 'required',
             'cwebsite' => 'required',]);
            $company = Company::where('id', $id)->first();
           $uploaded_image = '';
            if($request->hasFile('clogo')){
                $imageName = time().'.'.request()->clogo->getClientOriginalExtension();

                request()->clogo->move(public_path('/assets'), $imageName);

                $company->logo = $imageName;
           
            }

            $company->name = $request->get('cname');
            $company->email = $request->get('cemail');
           
            $company->website = $request->get('cwebsite');
            $company->save();
             return back()->with('success', 'You have just update one item');

            } catch (\Exception $ex) {
            DB::rollback();
            throw $ex;
        }


        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id , Company $company)
    {
      
       // $deletedRows = Company::where('id', $id)->delete();

         $user = Company::findOrFail($id);

        $user->employes()->delete();

        $user->delete();



        if($user){

    return back()->with('success', 'You have just delete one item');
        }

    }
}

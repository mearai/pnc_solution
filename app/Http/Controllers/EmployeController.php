<?php

namespace App\Http\Controllers;

use App\Employe;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data = Employe::simplePaginate(10);
       return view('employes' , ['employes' => $data]); //
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::all();

        return view('addEmploye' , ['companies' => $company]); //
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
             'fname' => 'required',
             'lname' => 'required',
             'email' => 'required|email',
             'company_id' => 'required',
             'phone' => 'required|numeric',

        ]);

         Employe::create([
          'first_name' => $request->get('fname'),
          'last_name'=> $request->get('lname'),
          'company_id'=>$request->get('company_id'),
          'email'=>$request->get('email'),
          
          'phone'=> $request->get('phone')
        ]);
           
            return back()->with('success', 'You have just created one item');





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
    public function show($id , Company $employe)
    {
         $employe = Employe::where('id', $id)->first();
     return view('viewEmploye' , ['employe' => $employe]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id , Company $employe)
    {
        $employe = Employe::where('id', $id)->first();
           $company = Company::all();

     return view('editEmploye' , ['employe' => $employe , 'companies' =>  $company ]); //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update($id , Request $request, Company $employe)
    {

         


          try {
           request()->validate([
             'fname' => 'required',
             'lname' => 'required',
             'email' => 'required|email',
             'company_id' => 'required',
             'phone' => 'required|numeric',

        ]);

            $Employe = Employe::where('id', $id)->first();
            

            $Employe->first_name = $request->get('fname');
            $Employe->last_name = $request->get('lname');
            $Employe->company_id = $request->get('company_id');
            $Employe->email = $request->get('email');
            $Employe->phone = $request->get('phone');
            $Employe->save();
           
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
      
        $deletedRows = Employe::where('id', $id)->delete();
        if($deletedRows){

    return back()->with('success', 'You have just delete one item');
        }

    }
}

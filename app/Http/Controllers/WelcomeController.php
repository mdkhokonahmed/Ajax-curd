<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IlluminateSupportFacadesInput;
use DB;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('curd.home.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function readData()
    {
        $students = DB::table('ajax_student')->orderBy('studentid', 'DESC')->get();
        //return response()->json($students);
         return view('curd.home.studentlist', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            $data['studentname'] = $request->studentname;
            $data['roll'] = $request->roll;
            $data['department'] = $request->department;

              DB::table('ajax_student')->insert([$data]);
            //return response()->json($cteate);
            return response()->json(['success'=>'<span style="color:green;">Data is successfully added</span>']);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function StudentEdit($studentid)
    {   
      
       $studentbyid = DB::table('ajax_student')
                ->where('studentid', $studentid)
                 ->first();

         return response()->json($studentbyid);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Update(Request $request)
    {       
            $studentid = $request->studentid;
           $data['studentname'] = $request->studentname;
            $data['roll'] = $request->roll;
            $data['department'] = $request->department;
            $dataup = DB::table('ajax_student')
                ->where('studentid', $studentid)
                ->update($data);

        return response()->json(['success'=>'<span style="color:green;">Data is Updated successfully</span>']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Delete($studentid)
    {
        
       $company =  DB::table('ajax_student')->where('studentid', $studentid)->delete();
        return response()->json($company);
    }

    public function Datasearch(Request $request)
    {

          if ($request->ajax())
            {
         $output = "";
     
         $listdata = DB::table('ajax_student')->where('studentname','LIKE','%'.$request->livesearch."%")->get();
          
          if (count($listdata)==0) {

            echo "No Data Found";
             
             
          }else{
            foreach ($listdata as $key => $value) {
                 $output .=  '<tr class="gradeA odd" role="row">' .
                 '<td class="text-center">' . $value->studentname . '</td>'.
                 '<td class="text-center">' . $value->roll . '</td>'.
                 '<td class="text-center">' . $value->department . '</td>'.
                  '</tr>';   
             }
              return Response($output);
          }

         

        }  
        
    }


public function totallist(Request $request)
{   
    $listdata = DB::table('ajax_student')->orderBy('studentid', 'DESC')->get();

    $students = DB::table('ajax_student')->get();

    return view('curd.home.totallist', compact('listdata', 'students'));
}




    function myformAjax($studentid)
    {
    

      $products = DB::table('ajax_student')->where('studentid', $studentid)->pluck('department', 'studentid');
        $list = '';
        foreach ($products as $key => $value) {
            $list .= "<option value='" . $key . "'>" . $value . "</option>";
        }
        return $list;

    }


}

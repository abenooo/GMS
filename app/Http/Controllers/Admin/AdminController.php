<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Yajra\Datatables\Datatables;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

        $attendances = Attendance::paginate(25);
        //count the approved guest
        //  $approved = Attendance::where('is_approved',!1)->count();
        return view('admin.index', compact('attendances'));

    }
    //dashboard
     public function dashboard()
    {

        $attendances = Attendance::paginate(25);
        //count the total number of user which not approved
        $approved = Attendance::where('is_approved',0)->count();
        //count the total number of user which is approved by admin
        $approve =  Attendance::where('is_approved',1)->count();
        $total = $approved + $approve;

// sending the data to the view
        return view('admin.dashboard', compact('approve'), compact("approved"), compact("total"));

    }

    // method to approve user request
        public function approve($id)
        {
        $attendances = Attendance::findOrFail($id);
        $attendances->is_approved = 1; //Approved
        $attendances->save();
        return redirect()->back(); //Redirect user somewhere
        }
            // to decline the user request
        public function decline($id)
        {
        $leave = Attendance::findOrFail($id);
        $leave->is_approved = 0; //Declined
        $leave->save();
        return redirect()->back(); //Redirect user somewhere
        }


        // to count the total number of guuest
        // public function total()
        // {
        //     $total = Attendance::with('id')->get();
        //     return view('admin.dashboard',compact('total'));
        // }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // method to approve and reject the request
//     class AdminLeave extends Controller
// {
//     public function leaveapproval()
//     {
//         $leaves = Leave::with('type', 'applied_by')->get();
//         return view ('admin.dashboard',compact ('leaves'));
//     }
// }

// public function approve($id){
//     $leave = App\Models\Leave::findOrFail($id);
//     $leave->status = 1; //Approved
//     $leave->save();
//     return redirect()->back(); //Redirect user somewhere
//  }

//  public function decline($id){
//     $leave = App\Models\Leave::findOrFail($id);
//     $leave->status = 0; //Declined
//     $leave->save();
//     return redirect()->back(); //Redirect user somewhere
//  }


}

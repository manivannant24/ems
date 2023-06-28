<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\lta;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Hash;





class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth::user()->is_admin == 1)
        {
            $dbdataforhome = User::get();
        return view('admindash',['dbdataforhome' => $dbdataforhome] );
    }
    else{
        $dbdataforhome = User::get();

        return view('home', ['dbdataforhome' => $dbdataforhome]);
    }
    }
    public function adminView()
    {
        return view('admindash');
    }
    public function employees()
    {
        if(auth::user()->is_admin == 1)
        {

        $dbd = DB::table('users')->select('id', 'name', 'email', 'phone')->get();
        // dd($dbd);
        return view('employees', compact('dbd'));
        }else{
            $dbd = DB::table('users')->select('id', 'name', 'email', 'phone')->get();
            // dd($dbd);
            return view('employeeswoedit', compact('dbd'));
        }
    }

    public function chart(Request $request)
    {

        #chart js (datewise visitors count) datas start       

        $startDate = $request->fromdate;
        $endDate = $request->todate;

        $charttable1 = DB::table('lta')
            ->select('email', 'logindate', DB::raw("count(*) as totallogin"))
            ->whereBetween('logindate', [$startDate, $endDate])
            ->groupBy('logindate')->get();



        $totaluser = array();
        $date = array();
        $em = array();
        foreach ($charttable1 as $items) {
            $totaluser[] = $items->totallogin;
            $date[] = $items->logindate;
            $em[] = $items->email;
        }
        #chart js datas end

        #total login table datas start
        $new = DB::table('lta')
            ->select('email', DB::raw("count(*) as totallogin"))
            ->selectRaw("substring_index(email, '@', 1) as namefromemail")
            ->groupBy('email')
            ->get();
        #second table getting name from email
//   select substring_index(email,'@',1) as namefromemail from lta;

        // dd($new);

        $email = array();
        $totlgn = array();
        foreach ($new as $items) {
            $email[] = $items->email;
            $totlgn[] = $items->totallogin;

        }

        #total login table datas end

        #Visitors Details Monthwise Table start

        $charttable = DB::table('lta')
            ->select('email', 'logindate', DB::raw("count(*) as totallogin"))
            ->groupBy('logindate', 'email')->get();


        $totallogin = array();
        $lable = array();
        $em = array();
        foreach ($charttable as $items) {
            $totallogin[] = $items->totallogin;
            $lable[] = $items->logindate;
            $em[] = $items->email;

        }
        #last table testing
        $dbdataforhome =
            DB::table('lta')
                ->selectRaw('email, count(*) as total_login, MONTH(logindate) as month')
                ->groupBy('email', DB::raw('MONTH(logindate)'))
                ->get();



        return view('chart', compact('charttable1', 'date', 'totaluser', 'new', 'charttable', 'dbdataforhome', ));
    }


    public function update($id, Request $request)
    {
        $gudfdb = User::find($id);
        // $getuserdatafromdb->name;

        return view('userprofile', ['gudfdb' => $gudfdb]);
    }
    public function updatesave(Request $request)
    {
        $updatedname = $request->name;
        $updatedphone = $request->phone;
        $id = $request->id;

        // dd($updatedphone);
        DB::table('users')->where('id', $id)->update(
            [
                'name' => $updatedname,
                'phone' => $updatedphone
            ],
        );

        return redirect()->back()->with("success", "Updated successfully!");
    }
    public function forgotpassword()
    {
        $id = Auth::user()->id;
        $gudfdb = User::find($id);
        return view('forgotpassword', ['gudfdb' => $gudfdb]);
    }
    public function changePasswordPost(Request $request)
    {
        if (empty($request->get('currentpassword')) && empty($request->get('newpassword')) && empty($request->get('confirmpassword'))) {
            $user = Auth::user();
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->phone = $request->get('phone');
            $user->save();
            return redirect()->back()->with("success", "Profile successfully Updated!");
        } else {
            if (!(Hash::check($request->get('currentpassword'), Auth::user()->password))) {
                // The passwords matches
                return redirect()->back()->with("error", "Your current password does not matches with the password.");
            }

            if (strcmp($request->get('currentpassword'), $request->get('newpassword')) == 0) {
                // Current password and new password same
                return redirect()->back()->with("error", "New Password cannot be same as your current password.");
            }
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'currentpassword' => ['string', 'min:8',
                ],
                'newpassword' => ['required', 'string', 'min:8', 'confirmed'],
                'confirmpassword' => ['required'],
                'phone' => ['required' | 'numeric'],
            ]);
            $user = Auth::user();
            $user->password = bcrypt($request->get('newpassword'));
            $user->save();
        }
        return redirect()->back()->with("success", "Password successfully changed!");
    }
    public function test()
    {
        $dbdataforhome =
            DB::table('lta')
                ->selectRaw('email, count(*) as total_login, MONTH(logindate) as month')
                ->groupBy('email', DB::raw('MONTH(logindate)'))
                ->get();
        //  dd($dbdataforhome);
        return view('test', ['dbdataforhome' => $dbdataforhome]);
    }
}
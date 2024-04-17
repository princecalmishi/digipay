<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Accounts;
use App\Models\User;
use App\Models\Budget;
use App\Models\Account_Number;
use App\Models\Fixedsavings;
use App\Models\Notifications;
use App\Models\InvestmentPlans;
use App\Models\Investments;
use App\Models\Transactions;
use App\Models\Goals;
use App\Models\Referals;
use App\Models\Settings;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('about','services','features','contact','contactform','welcome');
    }
    public function welcome()
    {
        $sitecolor = Settings::first()->pluck('colors');
        foreach($sitecolor as $sitecolor);
        
        return view('welcome')->with('sitecolor',$sitecolor);
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id = Auth::user()->id;
        // dd($id);

        // check and create accounts
        $savingsaccount = random_int(400000000000, 499999999999);  
        $fixedsavingsaccount = random_int(400000000000, 499999999999); 
        $checkaccounts = Account_Number::where('user_id', $id)->count();
        $checkaccountsrandomsuggestifexists = Account_Number::where('account_number', $savingsaccount)->count();

        if($checkaccountsrandomsuggestifexists >=1)
        {
            return redirect()->back()->with('error', 'Please Refresh Page !');
        }

        $myrefcode = Auth::user()->referral_code;
        $checkifuserreferedsomeonecount  = User::where('refered_by',$myrefcode)->count();
        $checkifuserreferedsomeone = $checkifuserreferedsomeonecount *250;
        $referedusers = User::where('refered_by',$myrefcode)->get();

        $checkifuserhasrefcode = Auth::user()->referral_code;
        if($checkifuserhasrefcode == Null)
        {
            $randomString = Str::random(5);
            $user = User::find(Auth::user()->id);
            $user->referral_code = $randomString;
            $user->save();

        }


        if($checkaccounts == 0){
            $accdata = new Account_Number;
            $accdata->account_number = $savingsaccount;
            $accdata->user_id = $id;
            $accdata->balance = '0';
            $accdata->save();


        }
        

        $countacc = Accounts::where('user_id', $id)->count();
        if($countacc >= 1){
            $bal = Accounts::where('user_id', $id)->pluck('balance');
            foreach($bal as $bal);  
            $accno = Accounts::where('user_id', $id)->pluck('account_number');
            foreach($accno as $accno);

        }  else{
            $bal = '0.00';
            $accno = 'N/A';
        }  

        if($countacc >= 1){

            $countfixed = Fixedsavings::where('account_number', $accno)->count();
            if($countfixed >= 1){
                $balfix = Fixedsavings::where('account_number', $accno)->pluck('amount');
                foreach($balfix as $balfix);  
                $accnofixed = Fixedsavings::where('account_number', $accno)->pluck('fixed_account_number');
                foreach($accnofixed as $accnofixed);

                // dd($countfixed);


            } else{
                $accnofixed = 'N/A';
                $balfix = '0.00';
    
            }
        }
        //get notifications
        $notifi = Notifications::orderBy('id','Desc')->paginate(5);
        $notificount = Notifications::count();
        $authid = Auth::user()->id;
        $myaccnumbers = Accounts::where('user_id', $authid)->pluck('account_number');
        $goals = Goals::where('account_number', $myaccnumbers)->where('status','0')->orderBy('id', 'DESC')->get();
        $goalscount = Goals::where('account_number', $myaccnumbers)->where('status','0')->count();

        $totalwithdraw = Transactions::where('sender', $myaccnumbers)->where('status', 1)->where('type', 'debit')->sum('amount');
        $totaldeposit = Transactions::where('sender', $myaccnumbers)->where('status', 1)->where('type', 'credit')->sum('amount');
        $totalinvest = Investments::where('account_number', $myaccnumbers)->where('status', 1)->sum('returns');
        $goalsum = Goals::where('account_number', $myaccnumbers)->sum('total_amount');
        $mytotalinvestcount = Investments::where('account_number', $myaccnumbers)->count();

        $pendinginvest = Investments::where('account_number', $myaccnumbers)->where('status', 0)->sum('returns');

        $pendingwith = Transactions::where('sender', $myaccnumbers)->where('status', 0)->where('type', 'debit')->sum('amount');

        $mysavigs = Fixedsavings::where('account_number', $myaccnumbers)->pluck('amount');
        foreach($mysavigs as $mysavigs)
        $budget = Budget::where('account_number', $myaccnumbers)->get();
        $budgetcount = Budget::where('account_number', $myaccnumbers)->count();
        if($budgetcount <1)
        {
            $budget = '0';
        }


        return view('home')->with('bal', $bal)->with('accno', $accno)->with('balfix', $balfix)
        ->with('accnofixed', $accnofixed)->with('notifi', $notifi)->with('notificount', $notificount)->with('goals', $goals)
        ->with('totalinvest', $totalinvest)->with('totaldeposit', $totaldeposit)
        ->with('goals', $goals)->with('mytotalinvestcount', $mytotalinvestcount)
        ->with('pendinginvest', $pendinginvest) ->with('pendingwith', $pendingwith)->with('goalsum', $goalsum)
        ->with('totalwithdraw', $totalwithdraw)->with('goalscount', $goalscount)->with('checkifuserreferedsomeone', $checkifuserreferedsomeone)
        ->with('checkifuserhasrefcode', $checkifuserhasrefcode)->with('checkifuserreferedsomeonecount', $checkifuserreferedsomeonecount)
        ->with('referedusers', $referedusers)->with('mysavigs', $mysavigs)->with('budget', $budget)
        ;
    }
    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }

    public function features()
    {
        return view('features');
    }

    public function contact()
    {
        return view('contact');
    }

    public function contactform(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',         
            'subject' => 'required',         
            'message' => 'required',         
                 
        ]);

        $name = $request->input('name');  
        $email = $request->input('email');  
        $subject = $request->input('subject');  
        $message = $request->input('message');  

        $c = new Contact;
        $c->name = $name;
        $c->email = $email;
        $c->subject = $subject;
        $c->message = $message;
        $c->save();

        return redirect()->back()->with('success','Contact message has been sent !');

        // return view('contact');
    }

    public function deposit()
    {
        $accounts = Accounts::where('user_id', Auth::user()->id)->get();

        $accnmb = Accounts::where('user_id', Auth::user()->id)->pluck('account_number');
        foreach($accnmb as $accnmb)

        $fixedbalance = Fixedsavings::where('account_number', $accnmb)->pluck('amount');        
        $fixedacc = Fixedsavings::where('account_number', $accnmb)->get();        
        

        return view('deposit')->with('accounts',$accounts)->with('fixedacc',$fixedacc);
    }

    public function digipay()
    {
        $accounts = Accounts::where('user_id', Auth::user()->id)->get();
        $accountsbalnce = Accounts::where('user_id', Auth::user()->id)->pluck('balance');
        foreach($accountsbalnce as $accountsbalnce)

        
        $accnmb = Accounts::where('user_id', Auth::user()->id)->pluck('account_number');
        foreach($accnmb as $accnmb)
        $fixedbalance = Fixedsavings::where('account_number', $accnmb)->pluck('amount');        
        $fixedacc = Fixedsavings::where('account_number', $accnmb)->get();        
                  

        return view('digipay')->with('accounts',$accounts)->with('accountsbalnce',$accountsbalnce)
        ->with('fixedbalance',$fixedbalance)->with('fixedacc',$fixedacc)
        ;
    }

    public function sendtodigipay(Request $request)
    {
        $this->validate($request,[
            'myaccount' => 'required',
            'recepientacc' => 'required',         
            'amount' => 'required',         
            'payreason' => 'required',         
                 
        ]);

        $myaccount = $request->input('myaccount');  
        $recepientacc = $request->input('recepientacc');  
        $transamount = $request->input('amount');  
        $payreason = $request->input('payreason');  

        // check if accno2 exists
        $acc2check = Accounts::where('account_number', $recepientacc)->count();
        if($acc2check < 1){
            return back()->with('error', 'Account does not exist !');
        }


        $userbal = Accounts::where('user_id', Auth::user()->id)->pluck('balance');
        foreach($userbal as $userbal)

        if($userbal >= $transamount){
            $newbal = $userbal - $transamount;
            $newaccx = Accounts::where('user_id', Auth::user()->id)
            ->update([
                'balance' => $newbal
             ]);

             $user2bal = Accounts::where('account_number', $recepientacc)->pluck('balance');
             foreach($user2bal as $user2bal)
             $newbal2 = $transamount + $user2bal;
             $newaccx = Accounts::where('account_number', $recepientacc)
             ->update([
                 'balance' => $newbal2
              ]);

              $datacode = random_int(400000000000, 499999999999);  


              $dp = new Transactions;
              $dp->ref_number = $datacode;
              $dp->amount = $transamount;
              $dp->type = 'debit';
              $dp->category = 'Internal Transfer';
              $dp->reason = 'Internal Transfer';
              $dp->sender = $myaccount;
              $dp->recipient = $recepientacc;
              $dp->status = '1';
              $dp->save();

              return back()->with('success', 'Balnce transfered successfully !');


        }else{
            return back()->with('error', 'Insufficient Balance !');
        }
        


    }

    public function transferlogs()
    {
        $myaccno1 = Accounts::where('user_id', Auth()->user()->id)->pluck('account_number');
        foreach($myaccno1 as $myaccno1)

        $data = Transactions::where('category','Internal Transfer')->where('sender', $myaccno1)->orderBy('id','DESC')->get();
        $datacount = Transactions::where('category','Internal Transfer')->where('sender', $myaccno1)->count();
       
        return view('moneytransfer')->with('data',$data)->with('datacount',$datacount);
    }
    public function mobile()
    {
        $accounts = Accounts::where('user_id', Auth::user()->id)->get();
        $accountsbalnce = Accounts::where('user_id', Auth::user()->id)->pluck('balance');
        foreach($accountsbalnce as $accountsbalnce)

        
        $accnmb = Accounts::where('user_id', Auth::user()->id)->pluck('account_number');
        foreach($accnmb as $accnmb)
        $fixedbalance = Fixedsavings::where('account_number', $accnmb)->pluck('amount');        
        $fixedacc = Fixedsavings::where('account_number', $accnmb)->get();        

        return view('mobilewallet')->with('accounts',$accounts)->with('accountsbalnce',$accountsbalnce)
        ->with('fixedacc',$fixedacc)
        ;

    }
    public function sendtomobile(Request $request)
    {
        $this->validate($request,[
            'myaccount' => 'required',
            'recepientacc' => 'required',         
            'amount' => 'required',         
            'payreason' => 'required',         
                 
        ]);

        $myaccount = $request->input('myaccount');  
        $recepientacc = $request->input('recepientacc');  
        $transamount = $request->input('amount');  
        $payreason = $request->input('payreason');  

        $userbal = Accounts::where('user_id', Auth::user()->id)->pluck('balance');
        foreach($userbal as $userbal)

        if($userbal >= $transamount){
            $newbal = $userbal - $transamount;
            $newaccx = Accounts::where('user_id', Auth::user()->id)
            ->update([
                'balance' => $newbal
             ]);

              $datacode = random_int(400000000000, 499999999999);  

              $dp = new Transactions;
              $dp->ref_number = $datacode;
              $dp->amount = $transamount;
              $dp->type = 'debit';
              $dp->category = 'Mobile Transfer';
              $dp->reason = 'Mobile Transfer';
              $dp->sender = $myaccount;
              $dp->recipient = $recepientacc;
              $dp->status = '1';
              $dp->save();

              return back()->with('success', 'Balnce transfered successfully !');


        }else{
            return back()->with('error', 'Insufficient Balance !');
        }
        


    }
    public function banking()
    {
        $accounts = Accounts::where('user_id', Auth::user()->id)->get();
        $accountsbalnce = Accounts::where('user_id', Auth::user()->id)->pluck('balance');
        foreach($accountsbalnce as $accountsbalnce)

        $accnmb = Accounts::where('user_id', Auth::user()->id)->pluck('account_number');
        foreach($accnmb as $accnmb)
        $fixedbalance = Fixedsavings::where('account_number', $accnmb)->pluck('amount');        
        $fixedacc = Fixedsavings::where('account_number', $accnmb)->get();        
        

        return view('banking')->with('accounts',$accounts)->with('accountsbalnce',$accountsbalnce)
        ->with('fixedacc',$fixedacc)
        ;
    }

    public function bankingrequest(Request $request)
    {
        $this->validate($request,[
            'myaccount' => 'required',
            'bankname' => 'required',         
            'bankaccountnumber' => 'required',         
            'bankaccname' => 'required',         
            'amount' => 'required',         
            'payreason' => 'required',         
                 
        ]);

        $myaccount = $request->input('myaccount');  
        $bankname = $request->input('bankname');  
        $bankaccountnumber = $request->input('bankaccountnumber');  
        $bankaccname = $request->input('bankaccname');  
        $transamount = $request->input('amount');  
        $payreason = $request->input('payreason');  

        $checkaccounts = Account_Number::where('account_number', $myaccount)->count();
                if($checkaccounts == 1){
                    $userbal = Accounts::where('user_id', Auth::user()->id)->pluck('balance');
                     foreach($userbal as $userbal)

                    if($userbal >= $transamount){
                        $newbal = $userbal - $transamount;
                        $newaccx = Accounts::where('user_id', Auth::user()->id)
                        ->update([
                            'balance' => $newbal
                        ]);

                        $datacode = random_int(400000000000, 499999999999);  

                        $dp = new Transactions;
                        $dp->ref_number = $datacode;
                        $dp->amount = $transamount;
                        $dp->type = 'debit';
                        $dp->category = 'Bank Transfer';
                        $dp->reason = $payreason;
                        $dp->sender = $myaccount;
                        $dp->recipient = $bankname . ' Account Number ' . $bankaccountnumber . ' Bank Account Name ' . $bankaccname ;
                        $dp->status = '1';
                        $dp->save();

                        return back()->with('success', 'Balance transfered successfully !');


                    }else{
                        return back()->with('error', 'Insufficient Balance !');
                    }
                }else{
                    $userfixedacccount = Fixedsavings::where('fixed_account_number', $myaccount)->count();
                    if($userfixedacccount == 1){
                        $userfixedaccbal = Fixedsavings::where('fixed_account_number', $myaccount)->pluck('amount');
                        foreach($userfixedaccbal as $userfixedaccbal)

                        if($userfixedaccbal >= $transamount){
                            $newbal = $userfixedaccbal - $transamount;
                            $newaccx = Fixedsavings::where('fixed_account_number', $myaccount)
                            ->update([
                                'amount' => $newbal
                            ]);
    
                            $datacode = random_int(400000000000, 499999999999);  
    
                            $dp = new Transactions;
                            $dp->ref_number = $datacode;
                            $dp->amount = $transamount;
                            $dp->type = 'debit';
                            $dp->category = 'Bank Transfer';
                            $dp->reason = $payreason;
                            $dp->sender = $myaccount;
                            $dp->recipient = $bankname . ' Account Number ' . $bankaccountnumber . ' Bank Account Name ' . $bankaccname ;
                            $dp->status = '1';
                            $dp->save();
    
                            return back()->with('success', 'Balance transfered successfully !');
    
    
                        }else{
                            return back()->with('error', 'Insufficient Balance !');
                        }
                }

    }}

        
           
    public function paybill()
    {
        $accounts = Accounts::where('user_id', Auth::user()->id)->get();
        $accountsbalnce = Accounts::where('user_id', Auth::user()->id)->pluck('balance');
        foreach($accountsbalnce as $accountsbalnce)

        $accnmb = Accounts::where('user_id', Auth::user()->id)->pluck('account_number');
        foreach($accnmb as $accnmb)
        $fixedbalance = Fixedsavings::where('account_number', $accnmb)->pluck('amount');        
        $fixedacc = Fixedsavings::where('account_number', $accnmb)->get();        

        return view('paybill')->with('accounts',$accounts)->with('accountsbalnce',$accountsbalnce)
        ->with('fixedacc',$fixedacc);
    }

    public function paybillrequest(Request $request)
    {
        $this->validate($request,[
            'myaccount' => 'required',
            'paybill' => 'required',         
            'amount' => 'required',         
            'payreason' => 'required',         
                 
        ]);

        $myaccount = $request->input('myaccount');  
        $recepientacc = $request->input('paybill');  
        $transamount = $request->input('amount');  
        $payreason = $request->input('payreason');  

       
        $checkaccounts = Account_Number::where('account_number', $myaccount)->count();
                if($checkaccounts == 1){
                    $userbal = Accounts::where('user_id', Auth::user()->id)->pluck('balance');
                     foreach($userbal as $userbal)

                    if($userbal >= $transamount){
                        $newbal = $userbal - $transamount;
                        $newaccx = Accounts::where('user_id', Auth::user()->id)
                        ->update([
                            'balance' => $newbal
                        ]);

                        $datacode = random_int(400000000000, 499999999999);  

                        $dp = new Transactions;
                        $dp->ref_number = $datacode;
                        $dp->amount = $transamount;
                        $dp->type = 'debit';
                        $dp->category = 'Pay Bill';
                        $dp->reason = $payreason;
                        $dp->sender = $myaccount;
                        $dp->recipient = $recepientacc;
                        $dp->status = '1';
                        $dp->save();

                        return back()->with('success', 'Balance transfered successfully !');


                    }else{
                        return back()->with('error', 'Insufficient Balance !');
                    }
                }else{
                    $userfixedacccount = Fixedsavings::where('fixed_account_number', $myaccount)->count();
                    if($userfixedacccount == 1){
                        $userfixedaccbal = Fixedsavings::where('fixed_account_number', $myaccount)->pluck('amount');
                        foreach($userfixedaccbal as $userfixedaccbal)

                        if($userfixedaccbal >= $transamount){
                            $newbal = $userfixedaccbal - $transamount;
                            $newaccx = Fixedsavings::where('fixed_account_number', $myaccount)
                            ->update([
                                'amount' => $newbal
                            ]);
    
                            $datacode = random_int(400000000000, 499999999999);  

                            $dp = new Transactions;
                            $dp->ref_number = $datacode;
                            $dp->amount = $transamount;
                            $dp->type = 'debit';
                            $dp->category = 'Pay Bill';
                            $dp->reason = $payreason;
                            $dp->sender = $myaccount;
                            $dp->recipient = $recepientacc;
                            $dp->status = '1';
                            $dp->save();
    
                            return back()->with('success', 'Balance transfered successfully !');
    
    
                        }else{
                            return back()->with('error', 'Insufficient Balance !');
                        }
                    }}
        


    }

    public function buygoods()
    {
        $accounts = Accounts::where('user_id', Auth::user()->id)->get();
        $accountsbalnce = Accounts::where('user_id', Auth::user()->id)->pluck('balance');
        foreach($accountsbalnce as $accountsbalnce)

        $accnmb = Accounts::where('user_id', Auth::user()->id)->pluck('account_number');
        foreach($accnmb as $accnmb)
        $fixedbalance = Fixedsavings::where('account_number', $accnmb)->pluck('amount');        
        $fixedacc = Fixedsavings::where('account_number', $accnmb)->get();        

        return view('buygoods')->with('accounts',$accounts)->with('accountsbalnce',$accountsbalnce)
        ->with('fixedacc',$fixedacc);
    }
    public function buygoodsrequest(Request $request)
    {
        $this->validate($request,[
            'myaccount' => 'required',
            'tillnumber' => 'required',         
            'amount' => 'required',         
            'payreason' => 'required',         
                 
        ]);

        $myaccount = $request->input('myaccount');  
        $recepientacc = $request->input('tillnumber');  
        $transamount = $request->input('amount');  
        $payreason = $request->input('payreason');  

      
        $checkaccounts = Account_Number::where('account_number', $myaccount)->count();
        if($checkaccounts == 1){
            $userbal = Accounts::where('user_id', Auth::user()->id)->pluck('balance');
             foreach($userbal as $userbal)

            if($userbal >= $transamount){
                $newbal = $userbal - $transamount;
                $newaccx = Accounts::where('user_id', Auth::user()->id)
                ->update([
                    'balance' => $newbal
                ]);

                $datacode = random_int(400000000000, 499999999999);  

                $dp = new Transactions;
                $dp->ref_number = $datacode;
                $dp->amount = $transamount;
                $dp->type = 'debit';
                $dp->category = 'Buy Goods Bill';
                $dp->reason = $payreason;
                $dp->sender = $myaccount;
                $dp->recipient = $recepientacc;
                $dp->status = '1';
                $dp->save();
                return back()->with('success', 'Balance transfered successfully !');


            }else{
                return back()->with('error', 'Insufficient Balance !');
            }
        }else{
            $userfixedacccount = Fixedsavings::where('fixed_account_number', $myaccount)->count();
            if($userfixedacccount == 1){
                $userfixedaccbal = Fixedsavings::where('fixed_account_number', $myaccount)->pluck('amount');
                foreach($userfixedaccbal as $userfixedaccbal)

                if($userfixedaccbal >= $transamount){
                    $newbal = $userfixedaccbal - $transamount;
                    $newaccx = Fixedsavings::where('fixed_account_number', $myaccount)
                    ->update([
                        'amount' => $newbal
                    ]);

                    $datacode = random_int(400000000000, 499999999999);  

                    $dp = new Transactions;
                    $dp->ref_number = $datacode;
                    $dp->amount = $transamount;
                    $dp->type = 'debit';
                    $dp->category = 'Buy Goods Bill';
                    $dp->reason = $payreason;
                    $dp->sender = $myaccount;
                    $dp->recipient = $recepientacc;
                    $dp->status = '1';
                    $dp->save();

                    return back()->with('success', 'Balance transfered successfully !');


                }else{
                    return back()->with('error', 'Insufficient Balance !');
                }
            }}

        


    }

    public function investment()
    {
        $data = InvestmentPlans::all();
        return view('investmentplans')->with('data', $data);
    }

    public function aboutinvestmentplans()
    {
        $name = InvestmentPlans::all();
        return view('aboutinvestmentplans')->with('name', $name);
    }

    public function investmenthistory()
    {
        $accn1 = Accounts::where('user_id', Auth::user()->id)->pluck('account_number');
        foreach($accn1 as $accn1)
        $data= Investments::where('account_number', $accn1)->orderBy('id','DESC')->get();
        $datacount= Investments::where('account_number', $accn1)->count();
        return view('investhistory')->with('data', $data)->with('datacount', $datacount);
    }

    public function profsecurity()
    {
        return view('security');
    }

    public function changepass(Request $request)
    {
        $userpass= Auth::user()->password;
        $newpass = request()->input('newpass');
        $newpasscheck = request()->input('newpasschck');
        $oldpass = request()->input('oldpass');

        if($newpass == $newpasscheck)
        {
            if(Hash::check($oldpass, $userpass))
            {
                $userId = Auth::User()->id;
                $user = User::find($userId);
                $user->password = Hash::make($newpass);;
                $user->save();
                return back()->with('success', 'Your password has been updated successfully.');

            } 
            else{
                return redirect()->back()->with('error', 'Old Password error !');
                }

        }else{
            return redirect()->back()->with('error', 'Password confirmation do not match !');
        }

       
    }

    public function changepin(Request $request)
    {
        $userpass= Auth::user()->pin;
        $newpass = request()->input('newpin');
        $newpasscheck = request()->input('newpinchck');
        $oldpass = request()->input('oldpin');

        
        if($newpass == $newpasscheck)
        {
            if(Hash::check($oldpass, $userpass))
            {
                $userId = Auth::User()->id;
                $user = User::find($userId);
                $user->pin = Hash::make($newpass);;
                $user->save();
                return back()->with('success', 'Your pin has been updated successfully.');

            } 
            else{
                return redirect()->back()->with('error', 'Old Pin error !');
                }

        }else{
            return redirect()->back()->with('error', 'Pin confirmation do not match !');
        }

       
    }

    public function privacy()
    {
        return view('privacy');
    }

    public function terms()
    {
        return view('terms');
    }

    
    public function refer()
    {
        $code = Auth::user()->referral_code;
        return view('refer')->with('code', $code);
    }

    public function budget0()
    {
        $savingsaccount = random_int(400000000000, 499999999999);  
        $fixedsavingsaccount = random_int(400000000000, 499999999999);  
        
        $accnumber = Accounts::where('user_id', Auth::user()->id)->pluck('account_number');

        $datacount = Budget::where('account_number',$accnumber)->count();
        $dataamount = Fixedsavings::where('account_number', $accnumber)->pluck('amount');
        foreach($dataamount as $dataamount)

        $data = Budget::where('account_number',$accnumber)->whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::SUNDAY), Carbon::now()->endOfWeek(Carbon::SATURDAY)])->orderBy('id', 'DESC')->get();
        if($datacount < 1){
            $data = 'Not available';
        }
        return view('budget')->with('data', $data)->with('datacount', $datacount)->with('dataamount', $dataamount);
    }

    public function budget1()
    {
        $savingsaccount = random_int(400000000000, 499999999999);  
        $fixedsavingsaccount = random_int(400000000000, 499999999999);  
        
        $accnumber = Accounts::where('user_id', Auth::user()->id)->pluck('account_number');
        $datacount = Budget::where('account_number',$accnumber)->count();
        if($datacount < 1){
            $data = 'Not available';
        }
        $dataamount = Fixedsavings::where('account_number', $accnumber)->pluck('amount');
        foreach($dataamount as $dataamount)
        $data = Budget::where('account_number',$accnumber)->whereBetween('created_at',
        [
            Carbon::now()->startOfMonth()->format('Y-m-d'),
            Carbon::now()->endOfMonth()->format('Y-m-d')
        ]
        )->orderBy('id', 'DESC')->get();
        
        return view('budget')->with('data', $data)->with('datacount', $datacount)->with('dataamount', $dataamount);
    }

    public function budget2()
    {
        $savingsaccount = random_int(400000000000, 499999999999);  
        $fixedsavingsaccount = random_int(400000000000, 499999999999);  
        
        $accnumber = Accounts::where('user_id', Auth::user()->id)->pluck('account_number');
        $datacount = Budget::where('account_number',$accnumber)->count();
        if($datacount < 1){
            $data = 'Not available';
        }
        $dataamount = Fixedsavings::where('account_number', $accnumber)->pluck('amount');
        foreach($dataamount as $dataamount)
        $data = Budget::where('account_number',$accnumber)->whereBetween('created_at', [
            Carbon::now()->startOfYear(),
            Carbon::now()->endOfYear(),
        ])->orderBy('id', 'DESC')->get();
        
        return view('budget')->with('data', $data)->with('datacount', $datacount)->with('dataamount', $dataamount);
    }


    public function addbudget(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'amount' => 'required',            
                 
        ]);

        $accnumber = Accounts::where('user_id', Auth::user()->id)->pluck('account_number');
        foreach($accnumber as $accnumber)

        $name = $request->input('name');  
        $amount = $request->input('amount');          

        $c = new Budget;
        $c->name = $name;
        $c->amount = $amount;
        $c->account_number = $accnumber;
       
        $c->save();

        return redirect()->back()->with('success','Budget added successfully !');

        // return view('contact');
    }

    public function buyinvest($id)
    {
        $balance = Accounts::where('user_id', Auth::user()->id)->pluck('balance');
        $investprice = InvestmentPlans::where('id', $id)->pluck('price');

        foreach($balance as $balance);
        foreach($investprice as $investprice);

        $investtime = InvestmentPlans::where('id', $id)->pluck('return_months');
        foreach($investtime as $investtime)
        $returns = InvestmentPlans::where('id', $id)->pluck('payout_amount');
        foreach($returns as $returns)
        $maturityperiod = Carbon::now()->addMonths($investtime);
       
        $invnum = random_int(400000000000, 499999999999);  

        $now = Carbon::now();

        $next_time = Carbon::parse($now)->addMonth('1');


        if($balance >= $investprice)
        {
            $accn = Accounts::where('user_id', Auth::user()->id)->pluck('account_number');
            foreach($accn as $accn);
            $inv = new Investments;
            $inv->investment_number = $invnum;
            $inv->account_number = $accn;
            $inv->investment_plan = $id;
            $inv->maturity_date = $maturityperiod;
            $inv->returns = $returns;
            $inv->next_time = $next_time;
            $inv->no_of_times_to_pay = $investtime;
            $inv->status = '0';
            $inv->save();

            $newbal = $balance - $investprice;

            $newaccx = Accounts::where('user_id', Auth::user()->id)
            ->update([
                'balance' => $newbal
             ]);
           
            
            return redirect()->back()->with('success', 'Investment record placed !');

        }else{
            return redirect()->back()->with('error', 'Insufficient funds, please top up !');
        }
    }

    public function transactionlogs()
    {
        $myaccno1 = Accounts::where('user_id', Auth()->user()->id)->pluck('account_number');
        foreach($myaccno1 as $myaccno1)

        $data = Transactions::where('sender', $myaccno1)->ORwhere('recipient', $myaccno1)->orderBy('id','DESC')->get();
        $datacount = Transactions::where('sender', $myaccno1)->count();
       
        return view('transactionlogs')->with('data',$data)->with('datacount',$datacount);
    }

    public function mobilelogs()
    {
        $myaccno1 = Accounts::where('user_id', Auth()->user()->id)->pluck('account_number');
        foreach($myaccno1 as $myaccno1)

        $data = Transactions::where('sender', $myaccno1)->where('category', 'Mobile Transfer')->orderBy('id','DESC')->get();
        $datacount = Transactions::where('sender', $myaccno1)->where('category', 'Mobile Transfer')->count();
       
        return view('widthrawlogs')->with('data',$data)->with('datacount',$datacount);
    }

    public function savingspage()
    {
        $myaccnomber = Accounts::where('user_id',Auth::user()->id)->pluck('account_number');
        foreach($myaccnomber as $myaccnomber);
        $data = Goals::where('account_number', $myaccnomber)->orderBY('id','DESC')->get();
        $datacount = Goals::where('account_number', $myaccnomber)->count();
        $myamt = Accounts::where('user_id',Auth::user()->id)->pluck('balance');
        foreach($myamt as $myamt);
        return view('savings')->with('data', $data)->with('datacount', $datacount)->with('myamt', $myamt);
    }

    public function createsavegoal(Request $request)
    {
        $this->validate($request,[
            'goalname' => 'required',
            'goalamount' => 'required',            
            'startdate' => 'required',            
            'enddate' => 'required',            
            'period' => 'required',            
            'goaltarget' => 'required',            
                 
        ]);

        $goalname = $request->input('goalname');  
        $goalamount = $request->input('goalamount'); 
        $startdate = $request->input('startdate'); 
        $enddate = $request->input('enddate'); 
        $period = $request->input('period'); 
        $goaltarget = $request->input('goaltarget'); 

        $accn = Accounts::where('user_id', Auth::user()->id)->pluck('account_number');
            foreach($accn as $myaccnumber);

        $newgoal = new Goals;
        $newgoal->goal_number = random_int(400000000000, 499999999999);  
        $newgoal->account_number = $myaccnumber;
        $newgoal->name = $goalname;
        $newgoal->total_amount = $goalamount;
        $newgoal->frequency_amount = $goalamount;
        $newgoal->frequency = $period;
        $newgoal->target_amount = $goaltarget;
        $newgoal->start_date = $startdate;
        $newgoal->withdraw_date = $enddate;
        $newgoal->save();

        return back()->with('success', 'Goal Savings Created !');




    }

    public function createfixedsave(Request $request)
    {
        $this->validate($request,[
            'goaltarget' => 'required',
            'amount' => 'required',            
            'period' => 'required',          
               
        ]);

        $goaltarget = $request->input('goaltarget');  
        $amount = $request->input('amount'); 
        $period = $request->input('period'); 
        $now = Carbon::now();

        $fixedsavingsaccount = random_int(400000000000, 499999999999); 

        $accnmb = Accounts::where('user_id', Auth::user()->id)->pluck('account_number');
        foreach($accnmb as $accnmb)

        $balance = Accounts::where('user_id', Auth::user()->id)->pluck('balance');
        
        
       $checkfixed = Fixedsavings::where('account_number',$accnmb)->where('maturity_date', '>' ,$now)->count();
            if($checkfixed <1)
            {
                $newgoal = new Fixedsavings;
                $newgoal->fixed_account_number = $fixedsavingsaccount;  
                $newgoal->account_number = $accnmb;
                $newgoal->target_amount = $goaltarget;
                $newgoal->amount = $amount;
                $newgoal->period = $period;

                $newgoal->maturity_date = Carbon::parse($now)->addMonth($period);
            
                $newgoal->save();


            }else{
                return redirect()->back()->with('error', 'You already have a fixed saving !');

                }
           

    }


    public function dissolve($id)
    {
        $getccnum = Goals::where('id',$id)->pluck('account_number');
        foreach($getccnum as $getccnum)
        $getamt = Goals::where('id',$id)->pluck('total_amount');
        foreach($getamt as $getamt)

        $userbal = Accounts::where('account_number', $getccnum)->pluck('balance');
        foreach($userbal as $userbal)
        $newbal = $userbal + $getamt;

        $newaccx = Accounts::where('account_number', $getccnum)
        ->update([
            'balance' => $newbal
         ]);


        $refz = random_int(400000000000, 499999999999);  

        $dp = new Transactions;
        $dp->ref_number = $refz;
        $dp->amount = $getamt;
        $dp->type = 'credit';
        $dp->category = 'Goal Savings';
        $dp->reason = 'Dissolved Savings';
        $dp->sender = 'DigiPay';
        $dp->recipient =  $getccnum;
        // $dp->next_time =  Carbon::parse($now)->addMonth('1');
        // $dp->no_of_times_paid =  $noftimespaid+1;
        $dp->status = '1';
        $dp->save();


        $newaccx = Goals::where('id', $id)
        ->update([
            'status' => '1'
         ]);

        return back()->with('success','Goal Dissolved successfully !');


        
    }

    public function mdeposit(Request $request)
    {
        $id = Auth::id();
        $phone = $request->myphone;  
        $amt = $request->amount; 
        $payreason = $request->payreason; 
        $mpesaccno = $request->acc2; 
       
        $numbers = explode("\n", str_replace("\r", "", $phone));
        foreach ($numbers as $number) {
            $msisdn = preg_replace('/^(?:\254|27|0)?/','254', $number);
        }  
        
            date_default_timezone_set('Africa/Nairobi');

          # access token
          $consumerKey = 'GrWkCjJ707mQLbGtjLEU1bUUnlDSYIGW'; //Fill with your app Consumer Key
          $consumerSecret = 'ekqIA1AYsnYXe4Rr'; // Fill with your app Secret
        
          # define the variales
          # provide the following details, this part is found on your test credentials on the developer account
          $BusinessShortCode = '4069179';
          $Passkey = '272b1e544de91748b2ad6b2456d7eb2f6824ed13aa0d3ea57b2ebd8edae3ee28';  
          
          /*
            This are your info, for
            $PartyA should be the ACTUAL clients phone number or your phone number, format 2547********
            $AccountRefference, it maybe invoice number, account number etc on production systems, but for test just put anything
            TransactionDesc can be anything, probably a better description of or the transaction
            $Amount this is the total invoiced amount, Any amount here will be 
            actually deducted from a clients side/your test phone number once the PIN has been entered to authorize the transaction. 
            for developer/test accounts, this money will be reversed automatically by midnight.
          */
          
          $PartyA = $msisdn; // This is your phone number, 
          $AccountReference = $mpesaccno;
          $TransactionDesc = 'Deposit';
          $Amount = $amt;

         
          # Get the timestamp, format YYYYmmddhms -> 20181004151020
          $Timestamp = date('YmdHis');    
          
          # Get the base64 encoded string -> $password. The passkey is the M-PESA Public Key
          $Password = base64_encode($BusinessShortCode.$Passkey.$Timestamp);
        
          # header for access token
          $headers = ['Content-Type:application/json; charset=utf8'];
        
            # M-PESA endpoint urls
          $access_token_url = 'https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
          $initiate_url = 'https://api.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
         
          
          
          $redirectUrl = 'https://digitalafrica.live/digipay/callback_url.php';
        
               $age = array("uid"=>$id,"mpesaccno"=>$mpesaccno,"payreason"=>$payreason);
        
                // echo json_encode($age);
        
               
                $CallBackURL = $redirectUrl . '?' . http_build_query($age);
                
                
                
          # callback url
        //   $CallBackURL = 'https://digitalafrica.co.ke/mpesa/callback_url.php'; 
                
                
        
          $curl = curl_init($access_token_url);
          curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
          curl_setopt($curl, CURLOPT_HEADER, FALSE);
          curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':'.$consumerSecret);
          $result = curl_exec($curl);
          $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
          $result = json_decode($result);
          $access_token = $result->access_token;  
          curl_close($curl);
        
          # header for stk push
          $stkheader = ['Content-Type:application/json','Authorization:Bearer '.$access_token];
        
          # initiating the transaction
          $curl = curl_init();
          curl_setopt($curl, CURLOPT_URL, $initiate_url);
          curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader); //setting custom header
        
          $curl_post_data = array(
            //Fill in the request parameters with valid values
            'BusinessShortCode' => $BusinessShortCode,
            'Password' => $Password,
            'Timestamp' => $Timestamp,
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $Amount,
            'PartyA' => $PartyA,
            'PartyB' => $BusinessShortCode,
            'PhoneNumber' => $PartyA,
            'CallBackURL' => $CallBackURL,
            'AccountReference' => $AccountReference,
            'TransactionDesc' => $TransactionDesc
          );
        
          $data_string = json_encode($curl_post_data);
          curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($curl, CURLOPT_POST, true);
          curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
          $curl_response = curl_exec($curl);
            // echo $curl_response;

          
           // return redirect::away($url);
    $notify[] = ['success', 'Payment request sent'];
    

    // return redirect()->route('user.cdeposit')->withNotify($notify);
    
    //  $rid = session()->get('amount');
  

   // return $response;
     sleep(20);
    //  dd(Auth::user()->id);
    return redirect()->route('checkpayment');

    }

    public function checkpayment()
    {
        $id = Auth::id();
        $accnomber = Accounts::where('user_id', Auth::user()->id)->pluck('account_number');
        foreach($accnomber as $accnomber)
        $data = DB::table('mpesa_callback')->where('UserId', $id)->where('Scratched', 'No')->count();
        $datacode = DB::table('mpesa_callback')->where('UserId', $id)->where('Scratched', 'No')->pluck('MpesaReceiptNumber');
        foreach($datacode as $datacode);  

        if($data >= 1){
                $dataraccno = DB::table('mpesa_callback')->where('UserId', $id)->where('Scratched', 'No')->pluck('Account_Number');
                foreach($dataraccno as $dataraccno);
                $checkaccounts = Account_Number::where('account_number', $dataraccno)->count();
                if($checkaccounts == 1){
                    $datar = DB::table('mpesa_callback')->where('UserId', $id)->where('Scratched', 'No')->pluck('Amount');
                    foreach($datar as $datar);
                
                    $dp = new Transactions;
                    $dp->ref_number = $datacode;
                    $dp->amount = $datar;
                    $dp->type = 'credit';
                    $dp->category = 'Mpesa Deposit';
                    $dp->reason = 'Mpesa Deposit';
                    $dp->sender = $accnomber;
                    $dp->recipient = 'Digipay';
                    $dp->status = '1';
                    $dp->save();
                
                    $userbal = Accounts::where('user_id', $id)->pluck('balance');
                    foreach($userbal as $userbal)
                    
                    
                    $newbal = $userbal + $datar;

                    $newaccx = Accounts::where('user_id', Auth::user()->id)
                    ->update([
                        'balance' => $newbal
                        ]);
                
            
                
                    DB::table('mpesa_callback')->where('UserId', $id)->update(['Scratched' => 'Yes']);                                              
                                        
                    return redirect()->route('home')->with('success', 'Deposit success'); 
                }else{
                    $userfixedacccount = Fixedsavings::where('fixed_account_number', $dataraccno)->count();
                    if($userfixedacccount == 1){
                        $userfixedaccbal = Fixedsavings::where('fixed_account_number', $dataraccno)->pluck('amount');
                        foreach($userfixedaccbal as $userfixedaccbal)
                        $datar = DB::table('mpesa_callback')->where('UserId', $id)->where('Scratched', 'No')->pluck('Amount');
                        foreach($datar as $datar);

                        $newbal = $userfixedaccbal + $datar;
        
                        $newaccx = Fixedsavings::where('fixed_account_number', $dataraccno)
                        ->update([
                            'amount' => $newbal
                         ]);  

                            $dp = new Transactions;
                            $dp->ref_number = $datacode;
                            $dp->amount = $datar;
                            $dp->type = 'credit';
                            $dp->category = 'Mpesa Deposit';
                            $dp->reason = 'Mpesa Deposit';
                            $dp->sender = $accnomber;
                            $dp->recipient = 'Digipay';
                            $dp->status = '1';
                            $dp->save();

                            DB::table('mpesa_callback')->where('UserId', $id)->update(['Scratched' => 'Yes']);                                              
                                        
                            return redirect()->route('home')->with('success', 'Deposit success'); 

                    }
                }

           
        }
                                    
        else{
            return back()->with('error', 'We have not received your payment, make sure you are getting mpesa push message on your screen');    
        }
    }

    

    public function cron()
    {
       $id = Auth::user()->id;       
        $now = Carbon::now();

        $invest = Investments::wherestatus(0)->where('next_time', '<=', $now)->get();
        $investcount = Investments::wherestatus(0)->where('next_time', '<=', $now)->count();
        //  dd($investcount);


        foreach ($invest as $data) {
            

             
             if($data->no_of_times_paid == $data->no_of_times_to_pay){
                $updatestatus = Investments::find($data->id);
                $updatestatus->status = '1';            
                $updatestatus->save();
             }else{
                $user = Accounts::find($data->account_number);
            $next_time = Carbon::parse($now)->addMonth('1');
            
            $noftimespaid = $data->no_of_times_paid;

            $userbal = Accounts::where('user_id', $id)->pluck('balance');
            foreach($userbal as $userbal)

            $investreturnperc = InvestmentPlans::where('id', $data->investment_plan)->pluck('return_percentage');
            foreach($investreturnperc as $investreturnperc)
            $investreturnprice = InvestmentPlans::where('id', $data->investment_plan)->pluck('price');
            foreach($investreturnprice as $investreturnprice)

            $investreturnprice1 = InvestmentPlans::where('id', $data->investment_plan)->get();

            $int= $investreturnprice * $investreturnperc;
            $getamt = $int/100;

            $newbal = $userbal + $getamt;

            $newaccx = Accounts::where('account_number', $data->account_number)
            ->update([
                'balance' => $newbal
             ]);

                // Create The Transaction for Interest Back
                $refz = random_int(400000000000, 499999999999);  

                $dp = new Transactions;
                $dp->ref_number = $refz;
                $dp->amount = $getamt;
                $dp->type = 'credit';
                $dp->category = 'Investment Interest';
                $dp->reason = 'Investment Interest';
                $dp->sender = 'DigiPay';
                $dp->recipient =  $data->account_number;
                // $dp->next_time =  Carbon::parse($now)->addMonth('1');
                // $dp->no_of_times_paid =  $noftimespaid+1;
                $dp->status = '1';
                $dp->save();


                $updatestatus = Investments::find($data->id);
                // $updatestatus->status = '1';
                $updatestatus->next_time = Carbon::parse($now)->addMonth('1');
                $updatestatus->no_of_times_paid = $noftimespaid+1;
                
                $updatestatus->save();
             }          
            

         
        }

        echo "EXECUTED";

    }




}

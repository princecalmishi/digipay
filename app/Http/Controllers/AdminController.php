<?php

namespace App\Http\Controllers;
use Artisan;

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
use App\Models\InvestCategories;
use App\Models\Settings;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $totalusers = User::count();
        $recentusers = User::orderBy('id','DESC')->paginate('6');
        $activeuserscount = User::where('status','1')->count();
        $deactiveuserscount = User::where('status','0')->count();
        $totalinvest = Investments::sum('returns');
        $pendinginvest = Investments::where('status', 0)->sum('returns');
        $totalreturns = Transactions::where('category', 'Investment Interest')->where('status', 1)->sum('amount');
        $totalwith = Transactions::where('type', 'debit')->sum('amount');
        $pendingwith = Transactions::where('status', 0)->where('type', 'debit')->sum('amount');



        return view('admin.index')->with('totalusers',$totalusers)->with('recentusers',$recentusers)
        ->with('totalinvest',$totalinvest)->with('pendinginvest',$pendinginvest)->with('totalreturns',$totalreturns)
        ->with('activeuserscount',$activeuserscount) ->with('deactiveuserscount',$deactiveuserscount)
        ->with('totalwith',$totalwith)->with('pendingwith',$pendingwith)
        ;
    }

    public function admins(){
        $admincount = User::where('role','admin')->count();
        // dd($admincount);
        $alladmin = User::where('role','admin')->orderBy('id','DESC')->get();

        return view('admin.admins')->with('admincount',$admincount)->with('alladmin',$alladmin)
        ;
    }
    public function createadmin(){
        return view('admin.createadmin');
    }

    public function plans(){
        $invplans = InvestmentPlans::orderBy('id','DESC')->get();
        return view('admin.plan')->with('invplans',$invplans);
    }

    public function allusers(){
        $alluserdata = User::orderBy('id','DESC')->get();
        return view('admin.users')->with('alluserdata',$alluserdata);
    }

    public function kyc(){
        return view('admin.kyc');
    }

    public function kycrequest()
    {
        return view('admin.kycrequest');

    }

    public function alltickets()
    {
        $tickets = Contact::orderBy('id','DESC')->get();

        return view('admin.alltickets')->with('tickets',$tickets);

    }

    public function pendingtickets()
    {
        $tickets = Contact::whereStatus(0)->orderBy('id','DESC')->get();

        return view('admin.pendingtickets')->with('tickets',$tickets);

    }
    public function approveticket($id)
    {
        $find = Contact::find($id);
        $find->status = '1';
        $find->save();
        return back()->with('success','Approved Success');
    }
    public function plancategories()
    {
        $catdata = InvestCategories::orderBy('id','DESC')->get();
        return view('admin.plancategories',compact('catdata'));

    }

    public function editadmin($id)
    {
        $data = User::where('id',$id)->get();
        // dd($data);
        return view('admin.editadmin')->with('data',$data);

    }

    public function editadminpost(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',            
            'role' => 'required',            
            'password' => ['required', 'string', 'min:8', 'confirmed'],
                 
        ]);

        $userid = $request->input('userid');  
        $name = $request->input('name');  
        $email = $request->input('email');  
        $role = $request->input('role');  
        $password = $request->input('password');          

        $c = User::find($userid);
        $c->name = $name;
        $c->email = $email;
        $c->role = $role;       
        $c->password = $password;       
        $c->save();

        return redirect()->back()->with('success','User updated successfully !');

        // return view('contact');
    }

    public function createplan()
    {
        $categories = InvestCategories::all();
        return view('admin.createplan')->with('categories',$categories);
    }

    public function createnewplanpost(Request $request)
    {
        $this->validate($request,[
            'planname' => 'required',
            'category_type' => 'required',            
            'planprice' => 'required',            
            'return_percentage' => 'required',
            'payout_amount' => 'required',
            'fee_percentage' => 'required',
            'fee_amount' => 'required',
            'months' => 'required',
            'aboutplan' => 'required',
            'howitworks' => 'required',
                 
        ]);

        $planname = $request->input('planname');  
        $category_type = $request->input('category_type');  
        $planprice = $request->input('planprice');  
        $return_percentage = $request->input('return_percentage');  
        $payout_amount = $request->input('payout_amount');          
        $fee_percentage = $request->input('fee_percentage');          
        $fee_amount = $request->input('fee_amount');          
        $months = $request->input('months');          
        $aboutplan = $request->input('aboutplan');          
        $howitworks = $request->input('howitworks');          

        $c = new InvestmentPlans;
        $c->name = $planname;
        $c->category = $category_type;
        $c->price = $planprice;       
        $c->return_percentage = $return_percentage;       
        $c->payout_amount = $payout_amount;       
        $c->return_months = $months;       
        $c->return_percentage = $return_percentage;       
        $c->fee_percentage = $fee_percentage;       
        $c->fee_amount = $fee_amount;       
        $c->about = $aboutplan;       
        $c->how_it_works = $howitworks	;       
        $c->save();

        return redirect()->back()->with('success','Plan updated successfully !');

        // return view('contact');
    }

    public function planupdate($id)
    {
        
        $plan = InvestmentPlans::where('id',$id)->get();
        $categoriesx = InvestCategories::orderBy('id','DESC')->get();

        return view('admin.editplan')->with('plan',$plan)->with('categoriesx',$categoriesx);
    }
    public function updateplanpost(Request $request)
    {
        $this->validate($request,[
            'planname' => 'required',
            'category_type' => 'required',            
            'planprice' => 'required',            
            'return_percentage' => 'required',
            'payout_amount' => 'required',
            'fee_percentage' => 'required',
            'fee_amount' => 'required',
            'months' => 'required',
            'aboutplan' => 'required',
            'howitworks' => 'required',
                 
        ]);

        $id = $request->input('planid');  
        $planname = $request->input('planname');  
        $category_type = $request->input('category_type');  
        $planprice = $request->input('planprice');  
        $return_percentage = $request->input('return_percentage');  
        $payout_amount = $request->input('payout_amount');          
        $fee_percentage = $request->input('fee_percentage');          
        $fee_amount = $request->input('fee_amount');          
        $months = $request->input('months');          
        $aboutplan = $request->input('aboutplan');          
        $howitworks = $request->input('howitworks');          

        $c = InvestmentPlans::find($id);
        $c->name = $planname;
        $c->category = $category_type;
        $c->price = $planprice;       
        $c->return_percentage = $return_percentage;       
        $c->payout_amount = $payout_amount;       
        $c->return_months = $months;       
        $c->return_percentage = $return_percentage;       
        $c->fee_percentage = $fee_percentage;       
        $c->fee_amount = $fee_amount;       
        $c->about = $aboutplan;       
        $c->how_it_works = $howitworks	;       
        $c->save();

        return redirect()->back()->with('success','Plan updated successfully !');

        // return view('contact');
    }

    public function createnewcategorypost(Request $request)
    {
        $this->validate($request,[
            'catname' => 'required',            
                 
        ]);

        $catname = $request->input('catname');  
        
        $c = new InvestCategories;
        $c->name = $catname;            
        $c->save();

        return redirect()->back()->with('success','Category updated successfully !');

        // return view('contact');
    }

    public function trashcategory($id)
    {
        $cat = InvestCategories::find($id);
        $cat->delete();
        return redirect()->back()->with('error','Category deleted successfully !');

    }

    public function trashplan($id)
    {
        $cat = InvestmentPlans::find($id);
        $cat->delete();
        return redirect()->back()->with('error','Plan deleted successfully !');

    }

    public function userdetails($id)
    {
        $userinfoemail = User::where('id',$id)->pluck('email');
        $userinfoname = User::where('id',$id)->pluck('name');
        $userinfophone = User::where('id',$id)->pluck('phone');
        $userinfonationalid = User::where('id',$id)->pluck('national_id');
        $userinforole = User::where('id',$id)->pluck('role');
        $userinfostatus = User::where('id',$id)->pluck('status');
        $userinfoid = $id;
        $useraccountbalcount = Accounts::where('user_id',$id)->count();
        
        $accountno = Accounts::where('user_id',$id)->pluck('account_number');

        if($useraccountbalcount >=1){
            $useraccountbal = Accounts::where('user_id',$id)->pluck('balance');

        }else{
            $useraccountbal ="Null";
        }


        if($useraccountbalcount >=1){
            $accountno = Accounts::where('user_id',$id)->pluck('account_number');
            foreach($accountno as $accountno);

        }else{
            $accountno ="0";
        }

        $fixedsavescount = Fixedsavings::where('account_number',$accountno)->count();

        if($fixedsavescount >=1){
            $fixedsaves = Fixedsavings::where('account_number',$accountno)->pluck('amount');
            foreach($fixedsaves as $fixedsaves);

        }else{
            $fixedsaves ="0";
        }

        $allinterest = Investments::whereStatus(1)->where('account_number',$accountno)->sum('returns');
        $userrefcode = User::where('id',$id)->pluck('referral_code');
        foreach($userrefcode as $userrefcode);
        $userrefslistcount = User::where('refered_by',$userrefcode)->count();

        $totalwith = Transactions::where('sender',$accountno)->OrWhere('recipient',$accountno)->where('type','debit')->where('status','1')->sum('amount');
        $totaldepo = Transactions::where('sender',$accountno)->OrWhere('recipient',$accountno)->where('type','credit')->where('status','1')->sum('amount');
        $totaluserinvestments = Investments::where('account_number',$accountno)->sum('returns');


        foreach($userinfophone as $userinfophone)
        foreach($useraccountbal as $useraccountbal)
        foreach($userinfoemail as $userinfoemail)
        foreach($userinfoname as $userinfoname)
        foreach($userinfonationalid as $userinfonationalid)
        foreach($userinforole as $userinforole)
        foreach($userinfostatus as $userinfostatus)
    
        return view('admin.userdetails',compact('userinfoemail','userinfoname','userinfoid','useraccountbal','fixedsaves',
        'allinterest','userrefslistcount','totalwith','totaldepo','totaluserinvestments','userinfophone','userinfonationalid',
        'userinforole','userinfostatus'
    ));
    }


    public function loginas($id)
    {       
        Auth::loginUsingId($id);

        return redirect()->to('home');
    }

    public function updateuserycdata(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',            
            'phone' => 'required',            
            'email' => 'required',            
            'userid' => 'required',            
            'role' => 'required',            
            'status' => 'required',            
                 
        ]);

        $userkey = $request->input('userkey');  
        $name = $request->input('name');  
        $phone = $request->input('phone');  
        $email = $request->input('email');  
        $userid = $request->input('userid');  
        $role = $request->input('role');  
        $status = $request->input('status');  
        
        $c = User::find($userkey);
        $c->name = $name;            
        $c->phone = $phone;            
        $c->email = $email;            
        $c->national_id = $userid;            
        $c->role = $role;            
        $c->status = $status;            
        $c->save();

        return redirect()->back()->with('success','User updated successfully !');

    }

    public function userinterestlog($id)
    {
        $accountnumber = Accounts::where('user_id',$id)->pluck('account_number');
        foreach($accountnumber as $accountnumber);

        $intlogs = Investments::where('account_number',$accountnumber)->orderBy('id','DESC')->get();
        $intlogscount = Investments::where('account_number',$accountnumber)->count();
        return view('admin.userinterestlog')->with('intlogs',$intlogs)->with('intlogscount',$intlogscount);
    }

    public function userdepositlog($id)
    {
        $accountnumber = Accounts::where('user_id',$id)->pluck('account_number');
        foreach($accountnumber as $accountnumber);

        $intlogs = Transactions::whereStatus(1)->where('type','credit')->where('sender',$accountnumber)->ORwhere('recipient',$accountnumber)->orderBy('id','DESC')->get();
        $intlogscount = Transactions::whereStatus(1)->where('type','credit')->where('sender',$accountnumber)->ORwhere('recipient',$accountnumber)->count();
        return view('admin.userdepositlog')->with('intlogs',$intlogs)->with('intlogscount',$intlogscount);
    }

    public function userwithrawlog($id)
    {
        $accountnumber = Accounts::where('user_id',$id)->pluck('account_number');
        foreach($accountnumber as $accountnumber);

        $intlogs = Transactions::whereStatus(1)->where('type','debit')->where('sender',$accountnumber)->ORwhere('recipient',$accountnumber)->orderBy('id','DESC')->get();
        $intlogscount = Transactions::whereStatus(1)->where('type','debit')->where('sender',$accountnumber)->ORwhere('recipient',$accountnumber)->count();
        return view('admin.userwithrawlog')->with('intlogs',$intlogs)->with('intlogscount',$intlogscount);
    }

    public function usertranslog($id)
    {
        $accountnumber = Accounts::where('user_id',$id)->pluck('account_number');
        foreach($accountnumber as $accountnumber);

        $intlogs = Transactions::where('sender',$accountnumber)->ORwhere('recipient',$accountnumber)->orderBy('id','DESC')->get();
        $intlogscount = Transactions::where('sender',$accountnumber)->ORwhere('recipient',$accountnumber)->count();
        return view('admin.usertranslog')->with('intlogs',$intlogs)->with('intlogscount',$intlogscount);
    }
    
    public function approveusertrans($id)
    {
        $find = Transactions::find($id);
        $find->status = '1';
        $find->save();
        return back()->with('success','Approved Success');
    }

    public function addbalance(Request $request)
    {

        $this->validate($request,[
            'balance' => 'required',            
                     
                 
        ]);

        $reqamount = $request->input('balance');  
        $userinfoid = $request->input('user_id');  


        $accbal = Accounts::where('user_id',$userinfoid)->pluck('balance');
        foreach($accbal as $accbal);

        // dd($accbal);

        $newbal = $accbal + $reqamount;
        $newaccx = Accounts::where('user_id', $userinfoid)
        ->update([
            'balance' => $newbal
         ]);
       
        
        return redirect()->back()->with('success', 'Balance Added !');


    }

    public function subtractbalance(Request $request)
    {

        $this->validate($request,[
            'balance' => 'required',            
                     
                 
        ]);

        $reqamount = $request->input('balance');  
        $userinfoid = $request->input('user_id');  


        $accbal = Accounts::where('user_id',$userinfoid)->pluck('balance');
        foreach($accbal as $accbal);

        // dd($accbal);

        $newbal = $accbal - $reqamount;
        $newaccx = Accounts::where('user_id', $userinfoid)
        ->update([
            'balance' => $newbal
         ]);
       
        
        return redirect()->back()->with('success', 'Balance Subtracted !');


    }

    public function pendingwith()
    {
        $data = Transactions::whereStatus(0)->where('type','debit')->orderBy('id','DESC')->get();

        return view('admin.pendingwith')->with('data',$data);
    }

    public function approvedwith()
    {
        $data = Transactions::whereStatus(1)->where('type','debit')->orderBy('id','DESC')->get();

        return view('admin.approvedwith')->with('data',$data);
    }
    public function rejectedwith()
    {
        $data = Transactions::whereStatus(2)->where('type','debit')->orderBy('id','DESC')->get();

        return view('admin.rejectedwith')->with('data',$data);
    }

    public function approvewidth($id)
    {
        $find = Transactions::find($id);
        $find->status = '1';
        $find->save();
        return back()->with('success','Approved Success');
    }

    public function rejectwith($id)
    {
        $find = Transactions::find($id);
        $find->status = '2';
        $find->save();
        return back()->with('success','Approved Success');
    }

    public function managedeposits()
    {
        $data = Transactions::where('type','credit')->orderBy('id','DESC')->get();

        return view('admin.managedeposits')->with('data',$data);
    }

    public function usergoals()
    {
        
        $data = Goals::orderBy('id','DESC')->get();

        return view('admin.goalsavings')->with('data',$data);
    }
    public function userfixedsavings()
    {
        $data = Fixedsavings::orderBy('id','DESC')->get();

        return view('admin.userfixedsavings')->with('data',$data);
    }


    public function cacheClear()
    {

        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('optimize:clear');

        return back()->with('success', 'Caches cleared successfully!');
    }

    public function generalsettings()
    {
        $data = Settings::first();
        $sname = Settings::first()->pluck('sitename');
        $refb = Settings::first()->pluck('Referal_bonus');
        $min_wid = Settings::first()->pluck('min_wid');
        $max_wid = Settings::first()->pluck('max_wid');
        $mailsent_from = Settings::first()->pluck('mailsent_from');
        $Smtp_host = Settings::first()->pluck('Smtp_host');
        $Smtp_username = Settings::first()->pluck('Smtp_username');
        $Smtp_password = Settings::first()->pluck('Smtp_password');
        $Smtp_port = Settings::first()->pluck('Smtp_port');
        $Smtp_encryption = Settings::first()->pluck('Smtp_encryption');
        $phone = Settings::first()->pluck('phone');
        $email = Settings::first()->pluck('email');
        foreach($sname as $sname);
        foreach($refb as $refb);
        foreach($min_wid as $min_wid);
        foreach($max_wid as $max_wid);
        foreach($mailsent_from as $mailsent_from);
        foreach($Smtp_host as $Smtp_host);
        foreach($Smtp_username as $Smtp_username);
        foreach($Smtp_password as $Smtp_password);
        foreach($Smtp_port as $Smtp_port);
        foreach($Smtp_encryption as $Smtp_encryption);
        foreach($phone as $phone);
        foreach($email as $email);


        return view('admin.generalsettings')->with('sname',$sname)->with('refb',$refb)->with('min_wid',$min_wid)
        ->with('max_wid',$max_wid)->with('mailsent_from',$mailsent_from)->with('Smtp_host',$Smtp_host)
        ->with('Smtp_password',$Smtp_password)->with('Smtp_port',$Smtp_port)->with('Smtp_encryption',$Smtp_encryption)
        ->with('Smtp_username',$Smtp_username) ->with('phone',$phone)->with('email',$email)
        ;
    }

    public function gensettpost(Request $request)

    {
        $this->validate($request,[
            'sitename' => 'required',            
            'refbonus' => 'required',            
            'minwid' => 'required',            
            'maxwid' => 'required',            
            'site_email' => 'required',            
            'smtp_host' => 'required',            
            'smtp_username' => 'required',            
            'smtp_password' => 'required',            
            'smtp_port' => 'required',            
            'Smtp_encryption' => 'required',            
            'phone' => 'required',            
            'email' => 'required',            
            'location' => 'required',            
                 
        ]);

        $sitename = $request->input('sitename');  
        $refbonus = $request->input('refbonus');  
        $minwid = $request->input('minwid');  
        $maxwid = $request->input('maxwid');  
        $site_email = $request->input('site_email');  
        $smtp_host = $request->input('smtp_host');  
        $smtp_username = $request->input('smtp_username');  
        $smtp_password = $request->input('smtp_password');  
        $smtp_port = $request->input('smtp_port');  
        $Smtp_encryption = $request->input('Smtp_encryption');  
        $Smtp_encryption = $request->input('Smtp_encryption');  

        // dd($site_email);


        

        $sfcount = Settings::count();
        if($sfcount >= 1)
        {
            $set = Settings::first();
            $set->sitename = $request->sitename;
            $set->Referal_bonus = $request->refbonus;
            $set->min_wid = $request->minwid;
            $set->max_wid = $request->maxwid;
            $set-> mailsent_from = $request->site_email;
            $set-> Smtp_host = $request->smtp_host;
            $set-> Smtp_username =$request->smtp_username;
            $set->Smtp_password = $request->smtp_password;
            $set->Smtp_port = $request->smtp_port;
            $set->Smtp_encryption = $request->Smtp_encryption;
            $set->phone = $request->phone;
            $set->email = $request->email;
            $set->location = $request->location;

            $set->save();     
            return back()->with('success','Settings updated !');


        }else{

            $set = new Settings;
            $set->sitename = $request->sitename;
            $set->Referal_bonus = $request->refbonus;
            $set->min_wid = $request->minwid;
            $set->max_wid = $request->maxwid;
            $set-> mailsent_from = $request->site_email;
            $set-> Smtp_host = $request->smtp_host;
            $set-> Smtp_username =$request->smtp_username;
            $set->Smtp_password = $request->smtp_password;
            $set->Smtp_port = $request->smtp_port;
            $set->Smtp_encryption = $request->Smtp_encryption;
            $set->phone = $request->phone;
            $set->email = $request->email;
            $set->location = $request->location;


            $set->save();     
            return back()->with('success','Settings Created !');
       
        }


    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use Carbon\Carbon;
use App\Exports\OrderExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CategoryImport;
use PDF;
use App\Comment;
use Auth;
use App\Review;
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
        $today=Order::wheredate('created_at', Carbon::now())->count();
        $seven_days_ago=Order::whereDate('created_at', Carbon::now()->subDay(7))->count();
        $yesterday=Order::wheredate('created_at', Carbon::yesterday())->count();

       
        return view('backend.dashboard',[
            'today'=>$today,
            'yesterday'=>$yesterday,
            'seven_days_ago'=>$seven_days_ago
        ]);
    }


    function users()
    {
        $user_count=User::count();
        $users= User::orderby('name')->get();
        return view("backend.users.users" ,[
            'users'=> $users,
            'user_count'=> $user_count
        ]);
    }



    function orders()
    {

        return view('backend.orders.orders',[
            'orders'=> Order::latest()->paginate(10)
        ]);
    }



    function OrdersExcelDownload()
    {
        $from_data = Order::first();
        $to_data = Order::orderBy('id', 'desc')->first();
        
        $first_order_date=$from_data->created_at;
        $to= $to_data->created_at;
        return Excel::download(new OrderExport($first_order_date,$to), 'orders_between-'.$first_order_date.'.to.'.$to.'.xlsx');
    }


    function CategoryExcelImport(Request $request) 
    {
        Excel::import(new CategoryImport, $request->file('excel'));
        return back()->with('cat_delete', "Category Imported!");
    }

    function SelectedDateExcelDownload(Request $request)
    {
        $from= $request->from;
        $to= $request->to;
        return Excel::download(new OrderExport($from,$to), 'orders_between-'.$from.'.to.'.$to.'.xlsx');
    }


    function OrdersPDFDownload(){

        $orders=Order::all();
        $date=Carbon::now();
        $pdf = PDF::loadView('backend.exports.pdf', [
            'orders'=>$orders
        ]);
        return $pdf->download('orders.'.$date.'.pdf');


    }

    function Comments(Request $request)
    {

       
        $comment = new Comment;
        $comment->blog_id = $request->blog_id;
        $comment->user_id = Auth::id();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->name = $request->name;
        $comment->comment = $request->comment;
        $comment->status = 2;
        $comment->save();
        return back();
    }


    function Review(Request $req)
    {
        
        
        if(Review::where('user_id', Auth::id())->where('product_id', $req->product_id)->exists())
        {
            return back();
        }
        else{

            if($req->rating == '')
            {
                $rate = 1;
            }
            else
            {
                $rate = $req->rating;
            }
           
           $reviews = new Review;
           $reviews->rating = $rate;
           $reviews->name = $req->name;
           $reviews->email = $req->email;
           $reviews->product_id = $req->product_id;
           $reviews->user_id = Auth::id();
           $reviews->message = $req->message;
           $reviews->save();
    
           return back();
    
        }


       


    }
   


}

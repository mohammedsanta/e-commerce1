<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Message;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminPanelController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {

        $users = count(User::all());
        $supplier = count(Supplier::all());
        $products = count(Product::all());
        $orders = Order::all();
        // $messages = Message::all();

        $earnings = collect($orders)->reduce(function ($o,$n) {
            return $o + $n->total;
        },0);


        $country = [];
        foreach($orders as $order) {            
            if(array_key_exists($order->country,$country)) {
                $country[$order->country] += $order->total;
            }else {
                $country[$order->country] = $order->total;
            }
        }

        return view('admin.dashboard',[
            'users' => $users,
            'supplier' => $supplier,
            'products' => $products,
            'orders' => $orders,
            'earnings' => $earnings,
            'countries' => $country,
            // 'messages' => $messages
        ]);
    }

    public function inbox()
    {
        $messages = Message::all();

        return view('admin.inbox',[
            'messages' => $messages
        ]);
    }

    public function message($id)
    {
        $messages = Message::where('id',$id)->get();
        
        return view('admin.messages',[
            'messages' => $messages,
            'username' => $messages[0]->user()->get()[0]->name
        ]);
    }

    public function search(Request $request)
    {
        
        $suppliers = Supplier::where('name',$request->search);

        
        $suppliers->first() ? $products = count(Product::where('supplier_id',$suppliers->get()[0]->id)->get()) : '';
        
        return view('admin.search',[
            'suppliers' => $suppliers->get(),
            'products' => $products ?? ''
        ]);
    }

    public function suppliers(Request $request)
    {
        
        $suppliers = Supplier::all();
        
        // $products = Product::where('supplier_id',$suppliers[0]->id)->get();
        
        // dd($suppliers[0]->products()->get());

        return view('admin.suppliers',[
            'suppliers' => $suppliers,
            'products' => ''
        ]);
    }

    public function products()
    {
        $products = Product::all();
        
        return view('admin.products',[
            'products' => $products
        ]);
    }

    public function users()
    {
        $users = User::all();
        
        return view('admin.users',[
            'users' => $users
        ]);
    }

}

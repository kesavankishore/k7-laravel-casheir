<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Stripe\Stripe;
use Stripe\Customer;

class ProductController extends Controller
{
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $products = Product::get();
        return view("product", compact("products"));
    }  
   
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function show(Request $request, $product)
    {   
        $intent = auth()->user()->createSetupIntent();
       // dd( auth()->user()->createOrGetStripeCustomer());
        $product = Product::where('slug', $product)->first();
        return view("payment", compact("product", "intent"));
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function subscription(Request $request)
    {
        $user = Auth::user();        
        $paymentMethod = $request->input('token');
        $product = Product::find($request->product);  
        try
        {
            $user->newSubscription($product->name, $product->stripe_plan)->create();
            return redirect()->back()->with('message', 'Subscriped successfully!');
        }
        catch (\Exception $e)
        {
            return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
        }

    }
}

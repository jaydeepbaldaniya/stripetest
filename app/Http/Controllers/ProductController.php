<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use Stripe\PaymentIntent;
use Stripe\PaymentMethod;

class ProductController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'asc')->get();        
        $currency = "inr";
        $stripeSecret = env("STRIPE_SECRET");
        $stripeKey = env("STRIPE_KEY");
        return view('products.index', compact('products','currency','stripeSecret','stripeKey'));
    }

    public function productCharge(Request $request, $price, $currency)
    {
        try {
            $data = $request->all();
            //dd($data);
            Stripe::setApiKey(env('STRIPE_SECRET'));
        
            $customer = Customer::create(array(
                'email' => $data['stripeEmail']
            ));
            //dd($customer);

            $source = Customer::createSource(
                $customer->id,
                ['source' => $data['stripeToken']]                
            );

            $method = PaymentMethod::create([
                'type' => 'card',
                'card' => [
                    'number' => '4242424242424242',
                    'exp_month' => 12,
                    'exp_year' => 2025,
                    'cvc' => '123',
                ],
            ]);
        
            $charge = PaymentIntent::create(array(
                'customer' => $customer->id,
                'amount' => $price,
                'currency' => $currency,
                'payment_method_types' => ['card'],
                'payment_method' => $method->id
            ));
        
            return redirect('products')->with(['success' => 'Product bought successfully!']);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}

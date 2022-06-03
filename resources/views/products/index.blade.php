@extends('layouts.app')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Products</h2>
                </div>

            </div>
        </div>
        
        <div class="row">

            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! \Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            @foreach($products as $product) 
                <div class="col-md-4 mt-2">
                    <div class="card">                        
                        <div class="card-body bg-light text-center">
                            <div class="mb-2">
                                <h6 class="font-weight-semibold mb-2">
                                    {{ $product->name }}
                                </h6>
                                {{ $product->description }}
                            </div>
                            <h3 class="mb-0 font-weight-semibold">&#8377; {{ $product->price }}</h3>
                            
                                <form action="{{ route('product.charge',['price'=> ($product->price)*100,'currency'=> $currency]) }}" method="GET">
                                    {{ csrf_field() }}
                                    <script
                                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                            data-key="{{ $stripeKey }}"
                                            data-amount="{{ ($product->price)*100 }}"
                                            data-name="{{ $product->name }}"
                                            data-description="{{ $product->description }}"
                                            data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                            data-locale="auto"
                                            data-currency="{{ $currency }}">
                                    </script>
                                </form>
                            
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
@endsection

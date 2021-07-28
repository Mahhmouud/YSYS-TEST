@extends('product.layout')

@section('content')

    <div class="container" style="padding-top: 12%">
        <div class="card" >

                                             {{--Head Name--}}

            <div class="card-body">
                <p class="card-text"> Product Name : {{ $product->name }}</p>
            </div>
        </div>
    </div>

    <div class="container" style="padding-top: 2%">


                                {{--Show Name--}}

        <div class="form-group">
                <label for="exampleFormControlInput1">{{ $product->name }}</label>
            </div>

                                {{--Show Price--}}

        <div class="form-group">
                <label for="exampleFormControlInput1">{{ $product->price }}</label>
            </div>

            <div class="form-group">
                {!! $product->details !!}
            </div>


    </div>
@endsection

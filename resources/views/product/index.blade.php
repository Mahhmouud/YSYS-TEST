@extends('product.layout')

@section('content')


    <div class="jumbotron container">
        <hr class="my-4">
        <p>WE ARE HERE TO SUPPORT YOU</p>
        <a class="btn btn-primary btn-lg" href="{{route('products.create')}}" role="button">Create</a>
    </div>

    <div class="container">
        @if ($message = Session::get('success'))

        <div class="alert alert-primary" role="alert">
            {{$message}}
        </div>
        @endif
    </div>

                                        {{--Table of Products--}}

    <div class="container">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product name</th>
                <th scope="col">Product Price</th>
                <th scope="col" width="400px">Actions</th>
            </tr>
            </thead>
            <tbody>


            {{-- Get Details of Product items  Dynamiclly--}}

            @php
                $i = 0;
            @endphp

            @foreach($products as $item)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->price }} Egp</td>
                    <td>

                        <div class="container">
                            <div class="row">

                                                             {{--Get Edit Products Method--}}
                                <div class="col-sm">
                                    <a class="btn btn-success" href="{{route('products.edit',$item->id )}}">Edit</a>
                                </div>

                                                             {{--Get Show Products Method--}}
                                <div class="col-sm">
                                    <a class="btn btn-primary" href="{{route('products.show',$item->id)}}">Show</a>
                                </div>

                                                             {{--Get Destroy Products Method--}}
                                <div class="col-sm">
                                    <form action="{{route('products.destroy',$item->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>

                            </div>
                        </div>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

                                                    {{--Pagination--}}

        {!! $products->links() !!}
    </div>
@endsection

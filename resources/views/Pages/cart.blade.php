@extends('layouts.website')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Cart::content() as $row)
                    <tr>
                        <td class="col-sm-8 col-md-6">
                            <div class="media">
                                <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">{{$row->name}}</a></h4>
                                    <h5 class="media-heading"> by <a href="#">Brand name</a></h5>
                                    <span>Status: </span><span class="text-success"><strong>In Stock</strong></span>
                                </div>
                            </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                         <input type="email" class="form-control" id="qty{{ $row->id }}" value="{{ $row->qty }}">
                           <button class="btn btn-info" onclick="edit('{{ $row->id }}')">Update</button>
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{ $row->price }}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>{{ $row->subtotal }}</strong></td>
                        <td class="col-sm-1 col-md-1">
                            <button type="button" class="btn btn-danger" onclick="deleteCart('{{ $row->id }}')">
                                <span class="glyphicon glyphicon-remove"></span> Remove
                            </button></td>
                    </tr>
                    @endforeach

                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>{{ Cart::subtotal() }}</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td class="text-right"><h5><strong>{{ Cart::tax() }}</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>{{ Cart::total() }}</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                           <a href="{{ url('/') }}"> <button type="button" class="btn btn-default">
                                <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                            </button></td></a>
                        <td>
                            <button type="button" class="btn btn-success">
                                Checkout <span class="glyphicon glyphicon-play"></span>
                            </button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
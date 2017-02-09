@extends('layouts.dashboard')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Products </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel panel-heading">Add Product</div>
                    <div class="panel panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                @if (Session::has('message'))
                                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                                @endif
                                <form method="POST" action="{{ url('/product_insert') }}" enctype="multipart/form-data">
                                  {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        @if ($errors->has('category_id'))
                                            <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('category_id') }}</strong>
                                    </span>
                                        @endif
                                        <select name="category_id" class="form-control">
                                            <option>Select Categroy</option>
                                            @foreach($category as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        @if($errors->has('product_name'))
                                        <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('product_name') }}</strong>
                                        </span>
                                            @endif
                                        <input type="text" class="form-control" name="product_name" placeholder="Product Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Quantity</label>
                                        @if($errors->has('quantity'))
                                            <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('quantity') }}</strong>
                                        </span>
                                        @endif
                                        <input type="text" class="form-control" name="quantity" placeholder="Product Quantity">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Price</label>
                                        @if($errors->has('price'))
                                            <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('price') }}</strong>
                                        </span>
                                        @endif
                                        <input type="text" class="form-control" name="price" placeholder="Product price">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Unit</label>
                                        @if($errors->has('unit'))
                                            <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('unit') }}</strong>
                                        </span>
                                        @endif
                                        <input type="text" class="form-control" name="unit" placeholder="Product Unit">
                                    </div>
                                    <div class="form-group">
                                        <label>Disount Price</label>

                                        <input type="text" class="form-control" name="discount_price" placeholder="Discount Price">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Image</label>
                                        @if($errors->has('image'))
                                            <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('image') }}</strong>
                                        </span>
                                        @endif
                                        <input type="file" class="form-control" name="image" >
                                    </div>
                                    <div class="form-group">
                                        <label>Active</label>
                                        @if($errors->has('Active'))
                                            <span class="help-block">
                                            <strong style="color: red;">{{ $errors->first('Active') }}</strong>
                                        </span>
                                        @endif
                                        <input type="checkbox" class="form-control" name="Active" value="1">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn-info">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel panel-heading">Products</div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Unit</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php $i=1; ?>
                            @foreach($products as $product)
                                <tbody>
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td><img src="{{ asset('storage/images/'. $product->image) }}"
                                             height="100 " width="100" ></td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <th>{{ $product->unit }}</th>
                                    <td>{{ $cat->Active }}</td>
                                    <td><a class="btn  btn-sm btn-info" href="{{ url('cate_id/'.$cat->id) }}">Edit</a>&nbsp;&nbsp;<a class="btn btn-sm btn-danger">Disable</a></td>
                                </tr>
                                </tbody>
                                @endforeach
                                </thead>
                        </table>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

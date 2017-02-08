@extends('layouts.dashboard')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Products</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel panel-heading"> Add Product</div>
                    <div class="panel panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                @if (Session::has('message'))
                                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                                @endif
                        <form method="POST" action="{{ url('/product_insert') }}"
                                      enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select name="category_id" class="form-control">
                                            <option>Select Category</option>
                                            @foreach($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                                <@endforeach
                                        </select>
                                        @if($errors->has('category_id'))
                                            <span class="help-block">
                                                <strong style="color:red;">{{ $errors->first('category_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control" name="product_name"
                                               placeholder="Product Name">
                                        @if ($errors->has('product_name'))
                                            <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('product_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Product Quantity</label>
                                        <input type="number" name="quantity" class="form-control"
                                               placeholder="Enter Quantity">
                                        @if ($errors->has('quantity'))
                                            <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('quantity') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Unit</label>
                                        <input type="text" name="unit" class="form-control" placeholder="Enter Unit">
                                        @if($errors->has('unit'))
                                            <span class="help-block">
                                                <strong style="color: red;">{{ $errors->first('unit') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Product Price</label>
                                        <input type="number" name="price" class="form-control"
                                               placeholder="Enter Product Price">
                                        @if($errors->has('price'))
                                            <span class="help-block">
                                                <strong style="color: red">{{ $errors->first('price') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Product Image</label>
                                        <input type="file" name="image">
                                        @if ($errors->has('image'))
                                            <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('image') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Active</label>
                                        <input type="checkbox" value="1" name="active">
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
                    <div class="panel panel-heading">Categories</div>
                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover"
                               id="dataTables-example">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php $i = 1; ?>
                            @foreach($products as $product)
                                <tbody>
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->Active }}</td>
                                    <td><a class="btn  btn-sm btn-info" href="{{ url('cate_id/'.$cat->id) }}">Edit</a>&nbsp;&nbsp;<a
                                                class="btn btn-sm btn-danger">Disable</a></td>
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

@endsection

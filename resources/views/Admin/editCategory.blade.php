@extends('layouts.dashboard')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Category</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel panel-heading">Add Category</div>
                    <div class="panel panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                @if (Session::has('message'))
                                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                                @endif
                                <form method="POST" action="{{ url('/category_insert') }}"
                                      enctype="multipart/form-data">

                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" class="form-control" name="category_name"
                                               placeholder="Category Name" value="{{ $category->category_name }}">
                                        @if ($errors->has('category_name'))
                                            <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('category_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Category Image</label>
                                        <input type="file" name="image" value="{{ $category->image }}">
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
    </div>
@endsection
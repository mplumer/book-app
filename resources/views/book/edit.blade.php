@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>

                @endif
                <div class="card mt-5">
                    <div class="card-header">Update a Book</div>
                    <div class="card-body">
                        <form action="{{ route('book.update',$book->id) }}" method="post" enctype="multipart/form-data" >@csrf

                            <label>Name of book</label>
                        <input type="text" name="name" class="form-control" value="{{$book->name}}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            <br>
                            <label>Description of book</label>
                            <textarea name="description" class="form-control">{{$book->description}}</textarea>
                              @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                            <br>
                            <label>Category</label>
                            <select name="category" class="form-control">
                                <option value="">select</option>
                                <option value="frictional" @if($book->category=='frictional')selected @endif>Frictional Book</option>
                                <option value="biography" @if($book->category=='biography')selected @endif>Biography Book</option>
                                <option value="comdey"  @if($book->category=='comedy')selected @endif>Comdey Book</option>
                                <option value="educational" @if($book->category=='educational')selected @endif >Education</option>
                            </select>
                            @if ($errors->has('category'))
                            <span class="text-danger">{{ $errors->first('category') }}</span>
                        @endif

                            <br>
                            <label>Image of book</label>
                            <input type="file" name="image" class="form-control">
                              @if ($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                            <br>
                            <input type="submit" value="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Books Page @yield("title")</title>
		<link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
		<script defer src="{{asset('/js/bootstrap.bundle.min.js')}}"></script>
		<link rel="stylesheet" href="{{ asset('/fontawesome-free-6.4.2-web/css/all.css') }}">
		<link rel="stylesheet" href="{{ asset('/icons-1.3.0/icons-1.3.0/font/bootstrap-icons.css') }}">
		<script defer src="{{asset('/fontawesome-free-6.4.2-web/js/fontawesome.min.js')}}"></script>
		<style>
		</style>
		</head>
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Edit Book
                    </div>
                    <div class="card-body">
                        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{csrf_field()}}
                            @method('PUT')

                            <div class="form-group">
                                <label for="Title">Title</label>
                                <input type="text" class="form-control" id="Title" name="Title" value="{{ $book->Title }}">
                            </div>

                            <div class="form-group">
                                <label for="Author">Author</label>
                                <input type="text" class="form-control" id="Author" name="Author" value="{{ $book->Author }}">
                            </div>

                            <div class="form-group">
                                <label for="Genre">Genre</label>
                                <input type="text" class="form-control" id="Genre" name="Genre" value="{{ $book->Genre }}">
                            </div>

                            <div class="form-group">
                                <label for="Publication_Year">Publication Year</label>
                                <input type="text" class="form-control" id="Publication_Year" name="Publication_Year" value="{{ $book->Publication_Year }}">
                            </div>

                            <div class="form-group">
                                <label for="ISBN">ISBN</label>
                                <input type="text" class="form-control" id="ISBN" name="ISBN" value="{{ $book->ISBN }}">
                            </div>

                            <div class="form-group">
                                <label for="Cover_Image_URL">Cover Image</label>
                                <p>Current Image:</p>
                                <img id="image-upload" src="{{asset('/storage/'. $book->Cover_Image_URL)}}" alt="Current Cover Image" style="max-height: 200px;">
                                <input type="file" accept="image/jpeg, image/png, image/svg, image/gif"  class="form-control-file" id="Cover_Image_URL" name="Cover_Image_URL">
                            </div>

                            <button type="submit" class="btn btn-primary mt-1">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
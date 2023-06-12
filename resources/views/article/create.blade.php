@extends('layout.home')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Thêm bài viết</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('/article') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="tieude" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="ten_bhat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="ma_tloat" class="form-select">
                            <option value=""></option>
                            @foreach ($articles as $item)
                                <option value="{{ $item->category->ma_tloai }}">{{ $item->category->ten_tloai }}</option>
                            @endforeach
                        </select>
                        @error('ma_tloai')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Summary</label>
                        <textarea name="tomtat" class="form-control" cols="30" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Noi dung</label>
                        <textarea name="noidung" class="form-control" cols="30" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Author</label>

                        <select name="ma_tgia" class="form-select">
                            <option value=""></option>
                            @foreach ($articles as $author)
                                <option value="{{ $author->author->ma_tgia }}">{{ $author->author->ten_tgia }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="datetime-local" name="ngayviet" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="hinhanh" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success mt-4">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection

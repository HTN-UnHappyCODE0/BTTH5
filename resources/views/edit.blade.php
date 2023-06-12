@extends('layout.home')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h4>Thêm bài viết</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('articles/' . $article->ma_bviet) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">tieude</label>
                        <input type="text" name="tieude1" value="{{ $article->tieude }}" class="form-control">
                    </div>
                    @error('tieude1')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="form-group">
                        <label for="">ten bai hat</label>
                        <input type="text" name="ten_bhat1" value="{{ $article->ten_bhat }}"class="form-control">
                    </div>
                    @error('ten_bhat1')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="form-group">
                        <label for="">the loai</label>

                        <select name="ma_tloai1" class="form-select">

                            @foreach ($categories as $item)
                                <option {{ $item->ma_tloai == $article->ma_tloai ? 'selected' : '' }}
                                    value="{{ $item->ma_tloai }}">
                                    {{ $item->ten_tloai }}</option>
                            @endforeach
                        </select>
                        @error('ma_tloai1')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">tom tat</label>
                        <textarea name="tomtat1" class="form-control" cols="30" rows="3">{{ $article->tomtat }}</textarea>
                    </div>
                    @error('tomtat1')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="form-group">
                        <label for="">Noi dung</label>
                        <textarea name="noidung1" class="form-control" cols="30" rows="3">{{ $article->noidung }}</textarea>
                    </div>
                    @error('noidung1')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="form-group">
                        <label for="">tac gia</label>

                        <select name="ma_tgia1" class="form-select">

                            @foreach ($authors as $item)
                                <option {{ $item->ma_tgia == $article->ma_tgia ? 'selected' : '' }}
                                    value="{{ $item->ma_tgia }}">
                                    {{ $item->ten_tgia }}</option>
                            @endforeach
                        </select>
                        @error('ma_tgia1')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="">ngay viet</label>
                        <input type="datetime-local" value="{{ $article->ngayviet }}" name="ngayviet1"
                            class="form-control">
                    </div>
                    @error('ngayviet1')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                    <div class="form-group">
                        <label for="">hinh anh</label>
                        <input type="file" name="hinhanh1" class="form-control">

                    </div>
                    @error('hinhanh1')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <button type="submit" class="btn btn-success mt-4">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection

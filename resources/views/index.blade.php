@extends('layout.home')

@section('content')
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success">Search</button>
    </form>
    <div class="mb-3">
        <label>The loai nhieu bai nhat: {{ $tenTheloai }}</label>


    </div>
    <div class="container-fluid">
        <h3 class="text-center mt-4 mb-4 text-success">Danh sách bài hát</h3>
    </div>

    <h1>Danh sách bài hát</h1>
    <a href="{{ url('admin/category/create') }}" class="btn btn-success fw-bold float-right">
        <i class="fa-solid fa-plus"></i> Add
        Song</a>
    <a href="{{ url('admin/category/create') }}" class="btn btn-warning fw-bold float-right">
        <i class="fa-solid fa-plus"></i> Edit</a>
    <a href="{{ url('admin/category/create') }}" class="btn btn-danger fw-bold float-right">
        <i class="fa-solid fa-plus"></i> Delete</a>

    <div class="row mt-4">
        @foreach ($articles as $item)
            <div class="col-md-3 mb-2">
                <div class="card" style="width: 18 rem;">
                    <img src="{{ $item->hinhanh }}" alt="" class="card-img-top">
                    <class="card-body">


                        <h5 class="card-title"><a href="">{{ $item->ten_bhat }}</a></h5>
                        <p class="fw-bold">Category: {{ $item->category->ten_tloai }}</p>
                        <p class="fw-bold">Author: {{ $item->author->ten_tgia }}</p>
                        <p class="fw-bold">Date: {{ $item->ngayviet }}</p>
                        <p class="card-text">{{ $item->tomtat }}</p>


                </div>
            </div>
        @endforeach
    </div>


    <h1>Bài hát có tên chưa 1 trong 3 ký tự 'an', 'ba', 'aa' </h1>
    <div class="row mt-4">
        @foreach ($articleSongs as $item)
            <div class="col-md-3 mb-2">
                <div class="card" style="width: 18 rem;">
                    <img src="{{ $item->hinhanh }}" alt="" class="card-img-top">
                    <class="card-body">


                        <h5 class="card-title"><a href="">{{ $item->ten_bhat }}</a></h5>
                        <p class="fw-bold">Category: {{ $item->ten_tloai }}</p>
                        <p class="fw-bold">Author: {{ $item->ten_tgia }}</p>
                        <p class="fw-bold">Date: {{ $item->ngayviet }}</p>
                        <p class="card-text">{{ $item->tomtat }}</p>


                </div>
            </div>
        @endforeach
    </div>
    <h1>2 tác giả có bài viết nhiều nhất</h1>


    <div class="row mt-4">
        @foreach ($authorTops as $item)
            <div class="col-md-3 mb-2">
                <div class="card" style="width: 18 rem;">
                    <class="card-body">
                        <p5 class="fw-bold">Author: {{ $item->ten_tgia }}</5>
                </div>
            </div>
        @endforeach
    </div>
    <h1>Tìm bài hát theo thể loại</h1>
    <form>
        <div class="form-group">
            <select name="category" id="category" class="form-select">
                <option value="">Tất cả</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->ma_tloai }}"
                        {{ $selectedCategory == $category->ma_tloai ? 'selected' : '' }}>
                        {{ $category->ten_tloai }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        <div class="row mt-4">
            @foreach ($articleCa as $item)
                <div class="col-md-3 mb-2">
                    <div class="card" style="width: 18 rem;">
                        <img src="{{ $item->hinhanh }}" alt="" class="card-img-top">
                        <class="card-body">


                            <h5 class="card-title"><a href="">{{ $item->ten_bhat }}</a></h5>
                            <p class="fw-bold">Category: {{ $item->category->ten_tloai }}</p>
                            <p class="fw-bold">Author: {{ $item->author->ten_tgia }}</p>
                            <p class="fw-bold">Date: {{ $item->ngayviet }}</p>
                            <p class="card-text">{{ $item->tomtat }}</p>


                    </div>
                </div>
            @endforeach
        </div>
    </form>
@endsection

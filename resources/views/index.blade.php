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
    <a class="btn btn-success mb-4" href="{{ url('posts/create') }}">Thêm bài hát</a>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <table class="table table-bordered table-striped text-dark fw-boldd">


                    <thead>
                        <tr>

                            <th>ten_bviet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articleSongs as $item)
                            <tr>

                                <td>{{ $item->ten_bhat }}</td>


                                <td><a href="" class="btn btn-success">Edit</a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <table class="table table-bordered table-striped text-dark fw-boldd">


                    <thead>
                        <tr>

                            <th>ten_bviet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articleSongs as $item)
                            <tr>

                                <td>{{ $item->ten_bhat }}</td>


                                <td><a href="" class="btn btn-success">Edit</a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <table class="table table-bordered table-striped text-dark fw-boldd">


                    <thead>
                        <tr>
                            <th>ma_tgia</th>
                            <th>ten_tloai</th>
                            <th>ten_bviet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articleMixs as $item)
                            <tr>
                                <td>{{ $item->Author->ten_tgia }}</td>
                                <td>{{ $item->Category->ten_tloai }}</td>
                                <td>{{ $item->ten_bhat }}</td>


                                <td><a href="" class="btn btn-success">Edit</a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <table class="table table-bordered table-striped text-dark fw-boldd">


                    <thead>
                        <tr>
                            <th>ma_tgia</th>
                            <th>ten_tgia</th>
                            <th>hinh_tgia</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authorTops as $item)
                            <tr>
                                <td>{{ $item->ma_tgia }}</td>
                                <td>{{ $item->ten_tgia }}</td>
                                <td>{{ $item->hinh_tgia }}</td>


                                <td><a href="" class="btn btn-success">Edit</a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- <table class="table table-bordered table-striped text-dark fw-boldd">


                    <thead>
                        <tr>
                            <th>ma_bviet</th>
                            <th>tieude</th>
                            <th>ten_bhat</th>
                            <th>ma_tloai</th>
                            <th>ma_tgia</th>
                            <th>tomtat</th>
                            <th>noidung</th>
                            <th>ngayviet</th>
                            <th>hinhanh</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $item)
                            <tr>
                                <td>{{ $item->ma_bviet }}</td>
                                <td>{{ $item->tieude }}</td>
                                <td>{{ $item->ten_bhat }}</td>
                                <td>{{ $item->ma_tloai }}</td>
                                <td>{{ $item->ma_tgia }}</td>
                                <td>{{ $item->tomtat }}</td>
                                <td>{{ $item->noidung }}</td>
                                <td>{{ $item->ngayviet }}</td>
                                <td>{{ $item->hinhanh }}</td>

                                <td><a href="" class="btn btn-success">Edit</a>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}
            </div>
        </div>
    </div>



    <h1>Danh sách bài hát</h1>
    <a href="{{ url('admin/category/create') }}" class="btn btn-success fw-bold float-right">
        <i class="fa-solid fa-plus"></i> Add
        Contract</a>
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
                        <p class="fw-bold">Category: {{ $item->ten_tloai }}</p>
                        <p class="fw-bold">Author: {{ $item->ten_tgia }}</p>
                        <p class="fw-bold">Date: {{ $item->ngayviet }}</p>
                        <p class="card-text">{{ $item->tomtat }}</p>


                </div>
            </div>
        @endforeach
    </div>
@endsection

@extends('adm_blog::layout.adm_blog_master')
@section('title_page','Menu')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Menu</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-sm-7">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Danh sách</h5>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($menus ?? [] as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>
                                        {{ $item->name }}
                                        <p><a href="{{ $item->slug }}">{{ $item->slug }}</a></p>
                                    </td>
                                    <td>{{ \Pigs\BlogAdmin\Enums\EnumAdmBlog::GET_TEXT_STATUS[$item->status]['name'] }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('get.adm_blog.menu.delete', $item->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Thêm mới</h5>
                        <form action="{{ route('get.adm_blog.menu.store') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tên</label>
                                <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
{{--                                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name="status" aria-label="Default select example">
                                    <option selected>Trạng thái</option>
                                    <option value="2">Published</option>
                                    <option value="1">Pending</option>
                                    <option value="-1">Draft</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Xử lý dữ liệu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
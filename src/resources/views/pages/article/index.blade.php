@extends('adm_blog::layout.adm_blog_master')
@section('title_page','Menu')
@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex" style="justify-content: space-between;align-items: center">
            <h1 class="mt-4">Article</h1>
            <a href="{{ route('get.adm_blog.article.create') }}" class="btn btn-success">Thêm mới</a>
        </div>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Index</li>
        </ol>
        <div class="row">
            <div class="col-sm-12">
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
                    @foreach($articles ?? [] as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>
                                {{ $item->name }}
                                <p><a href="{{ $item->slug }}">{{ $item->slug }}</a></p>
                            </td>
                            <td>{{ \Pigs\BlogAdmin\Enums\EnumAdmBlog::GET_TEXT_STATUS[$item->status]['name'] }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <a href="{{ route('get.adm_blog.article.delete', $item->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
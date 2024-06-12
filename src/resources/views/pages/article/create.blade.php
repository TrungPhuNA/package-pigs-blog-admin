@extends('adm_blog::layout.adm_blog_master')
@section('title_page','Menu')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Article</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <div class="">
            <form action="" method="POST" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tiêu đề</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                           aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Mô tả</label>
                                    <textarea class="form-control" name="description" id="" cols="30" rows="2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nội dung</label>
                                    <textarea class="form-control" name="content" id="" cols="30" rows="2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Trạng thái</label>
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option value="2">Published</option>
                                        <option value="1">Pending</option>
                                        <option value="-1">Draft</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="menu" class="form-label">Menu</label>
                                    <select class="form-select" name="menu_id" aria-label="Default select example">
                                        @foreach($menus as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select js-select2-multiple" name="tags[]"  aria-label="Default select example" multiple="multiple">
                                        <label for="tag" class="form-label">Tags</label>
                                        @foreach($tags as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Xử lý dữ liệu</button>
            </form>
        </div>
    </div>
@stop

<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
<script>
    $(function (){
        $(document).ready(function() {
            $('.js-select2-multiple').select2();
        });
    })
</script>
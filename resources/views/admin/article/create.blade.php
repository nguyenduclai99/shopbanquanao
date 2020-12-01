@extends('admin.index')

<!-- Page Content -->

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tạo Mới Bài Viết</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.article.index')}}">Bài Viết</a></li>
                        <li class="breadcrumb-item active">Tạo Mới</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form role="form" method="POST" action="{{route('admin.article.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-7">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin cơ bản</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group" {{$errors->first('a_name') ? 'has-error' : ''}}>
                                <label for="a_name" class="control-label">Tên Bài Viết: <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="a_name" placeholder="Nhập tên bài viết"> @if ($errors->first('a_name'))
                                <span class="text-danger">{{ $errors->first('a_name') }}</span> @endif
                            </div>
                            <div class="form-group" {{$errors->first('a_name') ? 'has-error' : ''}}>
                                <label for="a_menu_id" class="control-label">Menu: <span class="text-danger">(*)</span></label>
                                <select id="a_menu_id" name="a_menu_id" class="form-control" data-type="category">
                                    <option value=""></option>
                                    @foreach ($menu as $data)
                                    <option value="{{$data->id}}">{{$data->mn_name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->first('a_menu_id'))
                                    <span class="text-danger">{{ $errors->first('a_menu_id') }}</span> 
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="a_description" class="control-label">Mô tả:</label>
                                <textarea style="height: 155px" type="text" class="form-control" id="a_description" name="a_description" placeholder="Mô tả"></textarea>
                                @if ($errors->first('a_description'))
                                <span class="text-danger">{{ $errors->first('a_description') }}</span> @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-5">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Ảnh đại diện</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="a_avatar" class="custom-file-input" id="imgInput">
                                        <label class="custom-file-label" for="imgInput">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            @if ($errors->first('a_avatar'))
                                <span class="text-danger">{{ $errors->first('a_avatar') }}</span> 
                            @endif
                            <div class="">
                                <img id="imgPreview" src="image/noimage.png" height="290" class="Product Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Nội dung</h3>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Content</label>
                                <textarea id="ckeditor" name="a_contents" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                            @if ($errors->first('a_contents'))
                                <span class="text-danger">{{ $errors->first('a_contents') }}</span> 
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="modal-footer">
                        <div class="mx-auto">
                            <a type="button" class="btn btn-danger" href="{{route('admin.article.index')}}">Hủy</a>
                            <button type="submit" class="btn btn-primary">Lưu dữ Liệu</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<script>

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imgPreview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInput").change(function() {
        readURL(this);
    });

</script>

@endsection
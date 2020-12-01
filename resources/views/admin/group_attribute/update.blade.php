@extends('admin.index')

<!-- Page Content -->

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa Mới Nhóm Thuộc Tính</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.group_attribute.index')}}">Nhóm Thuộc Tính</a></li>
                        <li class="breadcrumb-item active">Sửa Mới</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group" {{$errors->first('ga_name') ? 'has-error' : ''}}>
                              <label for="ga_name" class="control-label">Tên Nhóm Thuộc Tính <span class="text-danger">(*)</span></label>
                              <input type="text" class="form-control" id="ga_name" name="ga_name" placeholder="Nhập tên nhóm thuộc tính" value="{{$group_attributes->ga_name ?? old('ga_name')}}">
                              @if ($errors->first('ga_name'))
                                <span class="text-danger">{{ $errors->first('ga_name') }}</span>
                              @endif
                            </div>

                            <div class="form-group" {{$errors->first('ga_category_id') ? 'has-error' : ''}}>
                                <label for="ga_category_id" class="control-label">Danh Mục: <span class="text-danger">(*)</span></label>
                                <select name="ga_category_id" class="form-control">
                                    <option value=""></option>
                                    @foreach ($categories as $data)
                                        <option value="{{$data->id}}" {{ $group_attributes->ga_category_id == $data->id ? "selected='selected'" : '' }}>{{$data->c_name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->first('ga_category_id'))
                                <span class="text-danger">{{ $errors->first('ga_category_id') }}</span> @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="mx-auto">
                                <a type="button" class="btn btn-danger" href="{{route('admin.group_attribute.index')}}">Hủy</a>
                                <button type="submit" class="btn btn-primary">Lưu dữ Liệu</button>
                            </div>
                        </div>
                      </form>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

@endsection
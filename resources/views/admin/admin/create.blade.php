@extends('admin.index')

<!-- Page Content -->

@section('content')
<style type="text/css">
    label.error {
        color: red;
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tạo Mới Nhân Viên</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.employee.index')}}">Quản lý nhân viên</a></li>
                        <li class="breadcrumb-item active">Tạo Mới</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form role="form" method="POST" action="{{route('admin.employee.store')}}" id="register">
            @csrf
            <div class="row">
                <div class="col-7">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin cơ bản</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group" {{$errors->first('name') ? 'has-error' : ''}}>
                                <label for="name" class="control-label">Họ và tên: <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Họ và tên"> 
                                <label for="name" class="error"></label>
                            </div>
                            <div class="form-group" {{$errors->first('email') ? 'has-error' : ''}}>
                                <label for="email" class="control-label">Email: <span class="text-danger">(*)</span></label>
                                <input type="email" class="form-control" name="email" placeholder="Email"> @if ($errors->first('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span> @endif
                            </div>
                            <div class="form-group" {{$errors->first('password') ? 'has-error' : ''}}>
                                <label for="password" class="control-label">Mật khẩu: <span class="text-danger">(*)</span></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập tên bài viết"> @if ($errors->first('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span> @endif
                            </div>
                            <div class="form-group" {{$errors->first('confirmpassword') ? 'has-error' : ''}}>
                                <label for="confirmpassword" class="control-label">Xác nhận mật khẩu: <span class="text-danger">(*)</span></label>
                                <input type="password" class="form-control" name="confirmpassword" placeholder="Nhập tên bài viết"> @if ($errors->first('confirmpassword'))
                                <span class="text-danger">{{ $errors->first('confirmpassword') }}</span> @endif
                            </div>
                            <div class="form-group" {{$errors->first('role') ? 'has-error' : ''}}>
                                <label for="role" class="control-label">Vị trí: <span class="text-danger">(*)</span></label>
                                <select id="role" name="role" class="form-control" data-type="category">
                                    <option value="">-- Chọn vị trí --</option>
                                    <option value="1">Nhân viên bán hàng</option>
                                    <option value="2">Khân viên kho</option>
                                    <option value="3">Nhân viên kế toán</option>
                                    <option value="0">Quản lý</option>
                                </select>
                                @if ($errors->first('role'))
                                    <span class="text-danger">{{ $errors->first('role') }}</span> 
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="modal-footer">
                        <div class="mx-auto">
                            <a type="button" class="btn btn-danger" href="{{route('admin.employee.index')}}">Hủy</a>
                            <button type="submit" class="btn btn-primary">Lưu dữ Liệu</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script type="text/javascript">
            $("#register").validate({ 
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    confirmpassword: {
                        required: true,
                        minlength: 8,
                        equalTo: "#password"
                    },
                    role: {
                        required: true,
                    }
                },
                messages: {
                    name: {
                        required: "Họ tên không được để trống."
                    },
                    email: {
                        required: "Email không được để trống.",
                        email: "Email chưa đúng đinh dạng."
                    },
                    password: {
                        required: "Mật khẩu không được để trống.",
                        minlength: "Mật khẩu tối thiểu là 8 kí tự."
                    },
                    confirmpassword: {
                        required: "Mật khẩu không được để trống.",
                        minlength: "Mật khẩu tối thiểu là 8 kí tự.",
                        equalTo: 'Mật khẩu không khớp.'
                    },
                    role: {
                        required: "Vị trí làm việc không được để trống.",
                    }
                } 

            });
        </script>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
@endsection
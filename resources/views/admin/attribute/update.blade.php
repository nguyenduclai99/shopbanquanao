@extends('admin.index')

<!-- Page Content -->

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa Mới Thuộc Tinh</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.attribute.index')}}">Thuộc Tinh</a></li>
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
                            <div class="form-group" {{$errors->first('atb_name') ? 'has-error' : ''}}>
                              <label for="atb_name" class="control-label">Tên Thuộc Tính <span class="text-danger">(*)</span></label>
                              <input type="text" class="form-control" id="atb_name" name="atb_name" placeholder="Nhập tên thuộc tính" value="{{$attribute->atb_name ?? old('atb_name')}}">
                              @if ($errors->first('atb_name'))
                                <span class="text-danger">{{ $errors->first('atb_name') }}</span>
                              @endif
                            </div>

                            <div class="form-group" {{$errors->first('atb_category_id') ? 'has-error' : ''}}>
                                <label for="atb_category_id" class="control-label">Danh Mục: <span class="text-danger">(*)</span></label>
                                <select id="atb_category_id" name="atb_category_id" class="form-control" data-type="category">
                                    <option value=""></option>
                                    @foreach ($categories as $data)
                                        <option value="{{$data->id}}">{{$data->c_name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->first('atb_category_id'))
                                <span class="text-danger">{{ $errors->first('atb_category_id') }}</span> @endif
                            </div>

                            <div class="form-group" {{$errors->first('atb_type') ? 'has-error' : ''}}>
                                <label for="atb_type" class="control-label">Nhóm Thuộc Tính: <span class="text-danger">(*)</span></label>
                                <select id="atb_type" name="atb_type" class="form-control">
                                    <option ></option>
                                </select>
                                @if ($errors->first('atb_type'))
                                <span class="text-danger">{{ $errors->first('atb_type') }}</span> @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="mx-auto">
                                <a type="button" class="btn btn-danger" href="{{route('admin.attribute.index')}}">Hủy</a>
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
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            header:{
                'X-CSRF-TOKEN':$('meta[name="csrt-token"]').attr('content')
            }
        });

        $("#atb_category_id").change(function(event){
            event.preventDefault();
            let route = '{{ route('ajax_get.group_attribute') }}'
            let $this = $(this);
            let type = $this.attr('data-type');
            let category_id = $this.val();
            $.ajax({
                method: "GET",
                url:route,
                data:{
                    type: type,
                    category_id: category_id
                }
            })
            .done(function(message){
                if(message.data){
                    let html = '';
                    let element ='';
                    if(type=='category'){
                        html = "<option></option>";
                        element = '#atb_type';
                    }
                    $.each(message.data, function(index,value){
                        html += "<option value='"+value.id+"'>"+value.ga_name+"</option>"
                    })

                    $(element).html('').append(html);
                }
            });
        })
    });
</script>
@endsection
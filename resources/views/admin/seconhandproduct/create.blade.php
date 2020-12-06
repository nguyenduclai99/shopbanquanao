@extends('admin.index')

<!-- Page Content -->

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tạo Mới Sản Phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Sản Phẩm</a></li>
                        <li class="breadcrumb-item active">Tạo Mới</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form role="form" method="POST" action="{{route('admin.seconhandproduct.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-7">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin cơ bản</h3>
                        </div>
                        {{-- {{dd($errors)}} --}}
                        <div class="card-body">
                            <div class="form-group" {{$errors->first('pro_name') ? 'has-error' : ''}}>
                                <label for="pro_name" class="control-label">Tên Sản phẩm: <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="pro_name" placeholder="Nhập tên sản phẩm" value="{{old('pro_name')}}"> @if ($errors->first('pro_name'))
                                <span class="text-danger">{{ $errors->first('pro_name') }}</span> @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="pro_price">Giá sản phẩm <span class="text-danger">(*)</span></label>
                                        <input type="number" name="pro_price" class="form-control" data-type="currency" value="{{old('pro_price')}}">
                                    </div>
                                    @if ($errors->first('pro_price'))
                                        <span class="text-danger">{{ $errors->first('pro_price') }}</span> 
                                    @endif
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="pro_sale">Giảm giá</label>
                                        <input type="number" name="pro_sale" value="0" class="form-control" data-type="currency" value="{{old('pro_sale')}}">
                                    </div>
                                    @if ($errors->first('pro_sale'))
                                    <span class="text-danger">{{ $errors->first('pro_sale') }}</span> @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="pro_quantity">Số Lượng <span class="text-danger">(*)</span></label>
                                        <input type="number" name="pro_quantity" class="form-control" value="1">
                                    </div>
                                    @if ($errors->first('pro_quantity'))
                                        <span class="text-danger">{{ $errors->first('pro_quantity') }}</span> 
                                    @endif
                                </div>
                                @if(isset($distributor))
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="pro_distributor_id">Nhà phân phối<span class="text-danger">(*)</span></label>
                                        <select name="pro_distributor_id" class="form-control">
                                            <option value=""></option>
                                            @foreach ($distributor as $data)
                                                <option value="{{$data->id}}">{{$data->d_name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->first('pro_distributor_id'))
                                            <span class="text-danger">{{ $errors->first('pro_distributor_id') }}</span> 
                                        @endif
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="pro_description" class="control-label">Mô tả:</label>
                                <textarea style="height: 155px" type="text" class="form-control" name="pro_description" placeholder="Mô tả">{{old('pro_description')}}</textarea>
                                @if ($errors->first('pro_description'))
                                    <span class="text-danger">{{ $errors->first('pro_description') }}</span> 
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <select class="select2 form-control" name="keywords[]" multiple="multiple" data-placeholder="Chọn tags sản phẩm" style="width: 100%;">
                                    @foreach ($keywords as $data)
                                        <option value="{{$data->id}}">{{$data->k_name}}</option>
                                    @endforeach
                                </select>
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
                                        <input type="file" name="pro_avatar" class="custom-file-input" id="imgInput" value = "{{old('pro_avatar')}}">
                                        <label class="custom-file-label" for="imgInput">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                                <img id="imgPreview" src="{{old('pro_avatar') ? " old('pro_avatar')" : "image/noimage.png" }}" height="290" class="Product Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title">Thông Tin Thuộc Tính</h3>
                        </div>
    
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group" {{$errors->first('pro_name') ? 'has-error' : ''}}>
                                        <label for="pro_name" class="control-label">Danh Mục: <span class="text-danger">(*)</span></label>
                                        <select id="pro_category_id" name="pro_category_id" class="form-control" data-type="category">
                                            <option value=""></option>
                                            @foreach ($categories as $data)
                                            <option value="{{$data->id}}">{{$data->c_name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->first('pro_category_id'))
                                            <span class="text-danger">{{ $errors->first('pro_category_id') }}</span> 
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="add_attribute">
                                
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
                                <textarea id="ckeditor" name="pro_content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="modal-footer">
                        <div class="mx-auto">
                            <a type="button" class="btn btn-danger" href="{{route('admin.seconhandproduct.index')}}">Hủy</a>
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
    $(function () {
        if($('.select2').length > 0 ){
            $('.select2').select2({
                placeholder: 'Chọn keyword',
                maximumSelectionLength: 2
            }); 
        }
    });

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


    $(document).ready(function() {
        $.ajaxSetup({
            header:{
                'X-CSRF-TOKEN':$('meta[name="csrt-token"]').attr('content')
            }
        });

        $("#pro_category_id").change(function(event){
            event.preventDefault();
            let route = '{{ route('ajax_get.attribute') }}'
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
                        html = "";
                        element = '#add_attribute';
                    }
                    $.each(message.data, function(key,value){
                        html += '<div class="col-sm-3">'
                        html +=     '<div class="card collapsed-card">'
                        html +=         '<div class="card-header">'
                        html +=             '<h3 class="card-title">'+key+'</h3>'         
                        html +=             '<div class="card-tools">'
                        html +=                 '<button type="button" class="btn btn-tool btn-attribute" data-card-widget="collapse"><i class="fas fa-plus"></i></button>'
                        html +=             '</div>'
                        html +=         '</div>'
                        html +=         '<div class="card-body p-0">'
                        html +=             '<ul class="clearfix">'
                        html +=                 '<li>'
                        $.each(value,function(k,v){
                            html +=   '<div class="icheck-primary">'
                            html +=       '<input type="radio" id="'+v.id+'" name="attribute['+v.atb_type+']" value="'+v.id+'">'
                            html +=       '<label for="'+v.id+'">'+v.atb_name+'</label>'
                            html +=   '</div>'
                        })
                        html +=                 '</li>'
                        html +=             '</ul>'
                        html +=         '</div>'
                        html +=     '</div>'
                        html += '</div>'
                    })
                    
                    $(element).html('').append(html);
                }
            });
        })
    });

</script>

@endsection
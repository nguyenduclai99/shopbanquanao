@extends('admin.index')

<!-- Page Content -->

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sửa Mới Sản Phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Sản Phẩm</a></li>
                        <li class="breadcrumb-item active">Sửa Mới</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <form role="form" method="POST" action="" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-7">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Thông tin cơ bản</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group" {{$errors->first('pro_name') ? 'has-error' : ''}}>
                                <label for="pro_name" class="control-label">Tên Sản phẩm: <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="pro_name" placeholder="Nhập tên sản phẩm" value="{{$product->pro_name ?? old('pro_name')}}"> @if ($errors->first('pro_name'))
                                <span class="text-danger">{{ $errors->first('pro_name') }}</span> @endif
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="pro_price">Giá sản phẩm <span class="text-danger">(*)</span></label>
                                        <input type="number" name="pro_price" class="form-control" data-type="currency" value="{{$product->pro_price ?? old('pro_price')}}">
                                    </div>
                                    @if ($errors->first('pro_price'))
                                    <span class="text-danger">{{ $errors->first('pro_price') }}</span> @endif
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="pro_sale">Giảm giá</label>
                                        <input type="number" name="pro_sale" value="0" class="form-control" data-type="currency" value="{{$product->pro_sale ?? old('pro_sale')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="pro_quantity">Số Lượng <span class="text-danger">(*)</span></label>
                                        <input type="number" name="pro_quantity" class="form-control" value="{{$product->pro_quantity ?? old('pro_quantity')}}">
                                    </div>
                                    @if ($errors->first('pro_quantity'))
                                        <span class="text-danger">{{ $errors->first('pro_quantity') }}</span> 
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="pro_distributor">Nhà phân phối<span class="text-danger">(*)</span></label>
                                        <select name="pro_distributor" class="form-control">
                                            <option value=""></option>
                                            @foreach ($distributor as $data)
                                            <option value="{{$data->id}}">{{$data->d_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->first('pro_distributor'))
                                    <span class="text-danger">{{ $errors->first('pro_distributor') }}</span> @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pro_description" class="control-label">Mô tả:</label>
                                <textarea style="height: 155px" type="text" class="form-control" id="pro_description" name="pro_description" placeholder="Mô tả">{{$product->pro_description ?? old('pro_description')}}</textarea>
                                @if ($errors->first('pro_description'))
                                <span class="text-danger">{{ $errors->first('pro_description') }}</span> @endif
                            </div>
                            <div class="form-group">
                                <label>Multiple</label>
                                <select class="select2 form-control" name="keywords[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;" >
                                    @foreach ($keywords as $data)
                                        <option value="{{$data->id}}" {{ in_array($data->id,$keywordOld) ? "selected='selected'" : '' }}>{{$data->k_name}}</option>
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
                                        <input type="file" name="pro_avatar" class="custom-file-input" id="imgInput">
                                        <label class="custom-file-label" for="imgInput">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="">
                            <img id="imgPreview" src="{{pare_url_file($product->pro_avatar)}}" height="290" class="Product Image">
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
                                <div class="col-sm-3">
                                    <div class="card collapsed-card">
                                        <div class="card-header">
                                            <h3 class="card-title">CPU</h3>
                                            <div class="card-tools">
                                               <button type="button" class="btn btn-tool btn-attribute" data-card-widget="collapse">
                                                   <i class="fas fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body p-0">
                                            <ul class="clearfix">
                                                <li>
                                                    <div class="icheck-primary">
                                                        <input type="radio" id="1" name="attribute[2]" value="1">
                                                        <label for="1">Intel Core I3</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                     </div>
                                </div>
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
                                <textarea id="ckeditor" name="pro_content" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$product->pro_content ?? old('pro_content')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="modal-footer">
                        <div class="mx-auto">
                            <a type="button" class="btn btn-danger" href="{{route('admin.product.index')}}">Hủy</a>
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
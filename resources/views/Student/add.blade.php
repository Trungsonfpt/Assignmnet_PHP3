@extends('templace.layout')
@section('content')
    <a href="{{url('student')}}">
        <button type="button" class="btn btn-primary">Trở về</button>
    </a>
    <form action="{{route('add-StudentRequest')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Họ và tên</label>
            <input type="text" class="form-control" name="name" placeholder="Nguyễn Văn A">
        </div>
        <div class="mb-3">
            <label class="form-label">Giới tính</label><br>
            <input type="radio" name="gender" value="1" checked>
            <label for="">Nam</label>
            <input type="radio" name="gender" value="0">
            <label for="">Nữ</label><br>
        </div>
        <div class="mb-3">
            <label class="form-label">Số điện thoại</label>
            <input type="number" class="form-control" name="phone" placeholder="0123456789">
        </div>
        <div class="mb-3">
            <label class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ">
        </div>
        <div class="mb-3">
            <label class="form-label">Hình ảnh</label><br>
            <input type="file" name="image" accept="image/*" class="form-control-file @error('image') is-invalid @enderror" id="cmt_anh">
            <img id="anh_the_preview"
                 src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg"
                 alt="your image"
                 style="max-width: 400px; height:200px; margin-bottom: 10px;" class="img-fluid"/>

        </div>

        <button type="submit" class="btn btn-success" name="them" >Thêm</button>
    </form>
@endsection

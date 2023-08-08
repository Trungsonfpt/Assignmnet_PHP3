@extends('templace.layout')
@section('content')
    <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
</div>


    <form class="d-flex" action="{{route('search-StudentRequest')}}" method="POST">
        @csrf
        <input class="form-control me-2" type="search" placeholder="Search" name="searchStudent">
        <button class="btn btn-outline-success" type="submit" name="btnSend">Tìm kiếm</button>
    </form>
    <br>
    <a href="{{url('add')}}">
        <button type="button" class="btn btn-primary">Thêm sinh viên</button>
    </a>
    <br>
    <table class="table" style="text-align: center">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Gender</td>
            <td>Phone</td>
            <td>Address</td>
            <td>Image</td>
            <td>Action</td>
        </tr>
        @foreach($ListStudent as $std)
            <tr>
                <td>{{$std ->id}}</td>
                <td>{{$std ->name}}</td>
                <td>{{$std ->gender==1?"Nam":"Nữ"}}</td>
                <td>{{$std ->phone}}</td>
                <td>{{$std ->address}}</td>
                <td ><img  src="{{$std ->image? Storage::url($std ->image) :""}}" style="max-width: 200px; height:100px;"></td>
                <td>
                    <a href="{{route('edit-StudentRequest',['id'=>$std->id])}}"><button type="button" class="btn btn-primary">Sửa</button></a>
                    <a href="{{route('delete-StudentRequest',['id'=>$std->id])}}"><button type="button" class="btn btn-danger">Xóa</button></a>
                </td>
            </tr>
        @endforeach
    </table>


@endsection

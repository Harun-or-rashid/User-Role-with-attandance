@extends('backend.master')
@section('main_section_row')
    <h3>{{$employee->name}}</h3>
    <img src="{{url('$employee->image')}}" alt="">
    <tr>
        <td>{{$employee->image}}</td>
    </tr>
    @endsection

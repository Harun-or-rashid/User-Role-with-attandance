@extends('backend.master')
@section('main_section_row')
    <table>
        <tr>
            <th>User name</th>
            <th>Role</th>
        </tr>
{{--        @foreach(roles as $roles)--}}
        <tr>
            <td>
                <select name="Role" id="">
                    <option value="">{{$user->role->name}}</option>
                </select>
            </td>
            <td>
                <select name="Role" id="">
                    <option value="">{{$roles->user_id}}</option>
                </select>
            </td>
        </tr>
{{--            @endforeach--}}
    </table>
    @endsection

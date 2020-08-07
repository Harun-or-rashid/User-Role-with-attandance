@extends('backend.master')
@section('main_section_row')
    <table>
        <tr>
            <th>User name</th>
            <th>Role</th>
        </tr>
        <tr>


            <td>

                <select name="Role" id="">
                    @foreach($rolea as $role)
                    <option value="">{{$role->name}}</option>
                    @endforeach
                </select>


            </td>
            <td>
                <select name="Role" id="">
                    <option value="">{{$user->name}}</option>
                </select>
            </td>
        </tr>
{{--            @endforeach--}}
    </table>
    @endsection

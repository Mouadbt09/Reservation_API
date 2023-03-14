@extends('layouts.app')
<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/style.css') }}">
</head>
<div>
    <h1>Admin panel</h1>
    <h2><a href="/add">Add Flight</a></h2>
    <div style="text-align: center">
        @include('incs.flash')
    </div>
    <br>
    <table border="1" rules="all">
        <tr>
            <th>Start City</th>
            <th>End City</th>
            <th>Price</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        @foreach($f as $p)
            <tr>
                <td style="text-align:center;font-size:1.5em">{{$p['Scity']}}</td>
                <td style="text-align:center;font-size:1.5em">{{$p['Ecity']}}</td>
                <td style="text-align:center;font-size:1.5em">{{$p['price']}} $</td>
                <td style="text-align:center;font-size:1.5em">
                    <a href="{{route('edit',$p['id'])}}">Update</a>
                </td>
                <td style="text-align:center;font-size:1.5em">
                    <form action="{{route('flights.destroy', $p['id'])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit"> delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>

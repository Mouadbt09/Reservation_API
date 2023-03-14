{{-- @extends('layouts.app') --}}
@guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link log"  href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link sign" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="logout" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
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
            <th>Duration</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        @foreach($f as $p)
            <tr>
                <td style="text-align:center;font-size:1.5em">{{$p['Scity']}}</td>
                <td style="text-align:center;font-size:1.5em">{{$p['Ecity']}}</td>
                <td style="text-align:center;font-size:1.5em">{{$p['price']}} $</td>
                <td style="text-align:center;font-size:1.5em">{{$p['duration']}} h</td>
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

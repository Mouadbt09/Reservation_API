<link rel="stylesheet" type="text/css" href="{{ URL::asset('/style.css') }}">

<h1>Update Flight</h1>
<div style="text-align: center">
    @include('incs.flash')
</div>
<form  method="POST" action="{{route('flights.update', $f['id'])}}" style="margin:auto;height:85vh;display:grid;align-content:center;width:500px;">
    @csrf
    @method('put')
    <label for="s">Starting city</label>
    <input type="text"id="s" value="{{$f['Scity']}}" name="Scity">
    @error('sc')
        {{ $message }}
    @enderror

    <label for="e">Starting city</label>
    <input type="text"id="e"value="{{$f['Ecity']}}" name="Ecity">
    @error('ec')
        {{ $message }}
    @enderror


    <label for="p">Price</label>
    <input type="number" id="p" value="{{$f['price']}}" name="price">
    @error('price')
        {{ $message }}
    @enderror


    <input type="submit" value="send">
</form>

<p></p>

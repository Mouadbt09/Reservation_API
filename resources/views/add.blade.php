<link rel="stylesheet" type="text/css" href="{{ URL::asset('/style.css') }}">

<h2><a href="/admin">Back</a></h2>
<div style="text-align: center">
    @include('incs.flash')
</div>
<form  method="POST"action="{{Route('addp')}}" style="margin:auto;height:85vh;display:grid;align-content:center;width:500px;">
    @csrf
    @method('put')
    <label for="s">Starting city</label>
    <input type="text"id="s" name="sc">
    @error('sc')
        {{ $message }}
    @enderror

    <label for="e">Starting city</label>
    <input type="text"id="e" name="ec">
    @error('ec')
        {{ $message }}
    @enderror


    <label for="p">Price</label>
    <input type="number" id="p" name="price">
    @error('price')
        {{ $message }}
    @enderror


    <input type="submit" value="send">
</form>

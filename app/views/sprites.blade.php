@extends('layouts.master')

@section('title')
Sprites
@endsection

@section('head')
<script type="text/javascript" src="/js/sprites.js"></script>
@endsection

@section('content')
<strong>Sprite:</strong>
<table id="sprite">
    @for ($y=0; $y<16; $y++)
        <tr>
        @for ($x=0; $x<16; $x++)
            <td>

            </td>
        @endfor
        </tr>
    @endfor
</table>

<strong>Colors:</strong>
<table id="colors">
        <tr>
            <td>
                <span class="tile" style="background: #fff" data-color="255,255,255"></span>
            </td>
            <td>
                <span class="tile" style="background: #000" data-color="0,0,0"></span>
            </td>
        </tr>
</table>

{{ Form::open(array('url' => 'sprites')) }}

{{ Form::label('name', 'Name') }}
{{ Form::text('name') }}

{{ Form::label('walkable', 'Walkable') }}
{{ Form::checkbox('walkable', 'yes') }}

{{ Form::textarea('imagedata') }}

{{ Form::submit('Save') }}

{{ Form::close() }}

@endsection
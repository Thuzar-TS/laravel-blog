@extends('layouts.app')
<div class="container">
    <div>
        @if(Auth::check())
            <p>Welcome to your profile page {!! Auth::user()->name !!} </p>       
        @endif
    </div>
</div>
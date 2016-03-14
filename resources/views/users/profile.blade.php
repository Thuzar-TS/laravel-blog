@extends('layouts.app')
<div class="container" style="margin-top: 10px;">
    <div>
        @if(Auth::check())
            <p>Welcome to your profile page {!! Auth::user()->name !!} </p>
        @endif
    </div>
   
</div>
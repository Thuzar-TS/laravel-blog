@extends('layouts.app')
@section('content')
<div class="col-sm-10 col-sm-offset-1">
   
        <div class="col-md-12 bar">
        <h4>Create New Hospital</h4>
        </div>
        {!! Form::open(array('route' => array('hospital.store'),'files'=>true, 'method' => 'post')) !!}
        @if (isset($message))
        {!!  $message !!}
        @endif
        <div class="col-md-6">
        
        <div class='form-group'>
            <img src="{!! asset('images/hospital-icon.png') !!}" id='blah' class='img-responsive col-sm-12' style='width: 100%; height: 250px; margin-bottom: 10px;'>
        </div>
        <div class="form-group col-md-12">
        <input type="file" name="filefield" onchange='readURL(this);'>
        </div>
        <div class="form-group">
            {!! Form::label('name','Hospital Name') !!}
            {!! Form::text('name', null,array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('address','Hospital Address') !!}
            {!! Form::text('address', null,array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('phone','Hospital Phone') !!}
            {!! Form::text('phone', null,array('class' => 'form-control')) !!}
        </div>
        
        </div>


        <div class="col-md-6">
        <div class="form-group">
            {!! Form::label('website','Hospital website') !!}
            {!! Form::text('website', null,array('class' => 'form-control')) !!}
        </div>
                <div class="form-group">
            {!! Form::label('email','Hospital Email') !!}
            {!! Form::text('email', null,array('class' => 'form-control')) !!}
        </div>
        <div class="form-group">
            {!! Form::label('type','Hospital Type') !!}
            {!! Form::select('type', $role_list , Input::old('id'), array('class'=>'form-control')) !!}
            <!--{!! Form::select('role', array('' => 'Select Role', '0 ' => 'Main Category') + $role_list) !!} -->
        </div>
        <div class="form-group">
            {!! Form::label('city','City') !!}
            {!! Form::select('city', $city_list , Input::old('id'), array('class'=>'form-control')) !!}
            <!--{!! Form::select('role', array('' => 'Select Role', '0 ' => 'Main Category') + $role_list) !!} -->
        </div>

          <div class="form-group">
            {!! Form::label('password','Password') !!}
            {!! Form::password('password',array('class' => 'form-control')) !!}
        </div>
           <div class="form-group">
                        {!! Form::label('password_confirmation','Password Confirm') !!}
                        {!! Form::password('password_confirmation',array('class' => 'form-control')) !!}
          </div>
          <div class="form-group">
          <div class="col-md-4 pad-free">
                <input type="button" value="Facility Setup" onclick="facility()" class="col-md-12 all-btn">
          </div>
          <div class="col-md-6 col-md-offset-2 pad-free">
                <input type="text" class="form-control ">
          </div>
          </div>
        </div>
<div class="col-md-12">
              <div class="form-group">
                        {!! Form::label('about','About') !!}
                        {!! Form::textarea('about', null,['class' => 'form-control', 'rows' => 7]) !!}
          </div>
            <div class="form-group">
                        {!! Form::label('direction','Direction') !!}
                      {!! Form::textarea('direction', null,['class' => 'form-control', 'rows' => 7]) !!}
          </div>
            <div class="form-group">
                        {!! Form::label('location','Location') !!}
                      {!! Form::textarea('location', null,['class' => 'form-control', 'rows' => 7]) !!}
          </div>
        
  <div id="black-overlay"></div>
 <div id="white-content" class="col-md-10 col-md-offset-1">
 <div class="bar" style="border-radius:5px;"><h4>Available Facilities</h4></div>
 <div id="over-table">
 <table class="table table-striped">
    @foreach( $facility as $f )
    
        <tr>
            <td><input type="checkbox" name="{!! $f->id !!}" value="{!! $f->id !!}" id="{!! $f->id !!}"></td>
            <td><label for="{!! $f->id !!}">{!! $f->description !!}</label></td>
        </tr>
    
     @endforeach

</table>
</div>
            <div class="form-group" style="margin-top:10px;">
               <input type="button" value="Done" onclick="fDone()" class="all-btn col-md-2 col-md-offset-3">
               <input type="button" value="Add New" onclick="fNew()" class="all-btn col-md-2 col-md-offset-1">
            </div>
 </div>       
 
            <div class="form-group" style="margin-top: 10px;">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                {!! Form::submit('Register', array('class' => 'all-btn col-md-2 col-md-offset-5')) !!}
            </div> 
 </div>
 
        {!! Form::close() !!}
   
</div>
@stop

<script type="text/javascript">
        function facility(){
            document.getElementById('black-overlay').style.display="block";
            document.getElementById('black-overlay').style.height="1400px";
            document.getElementById('white-content').style.display="block";
        }
        function fDone(){
            document.getElementById('black-overlay').style.display="none";
            document.getElementById('white-content').style.display="none";
        }  
         function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
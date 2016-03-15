@extends('layouts.app')
@if ( !count($dr))
        No search data
@else
        <div class="hospitaldiv col-md-10 col-md-offset-1 docalldiv" id="doc">
        <div class="bar"><h4>Doctor's Profile</h4></div>
        <div class="col-md-12">
        @foreach($dd as $d)
        <div class="col-md-2">
                      @if($d->photo)
                        <div class="col-md-12 pad-free"><img src="{!! asset('images/'.$d->photo)!!}" class="img-responsive" style="height:150px; width:100%;"></div>
                      @else
                        <div class="col-md-12 pad-free"><img src="{!! asset('images/user.jpg')!!}" class="img-responsive" style="height:150px; width:100%;"></div>
                      @endif
        </div>
                <div class="col-md-10"> 
                <table class="table table-striped doctor-table">
                  <tr>
                    <th>Name</th><td>:</td><td>{!! $d->doctor_name !!}</td>
                  </tr>
                  <tr>
                    <th>Contact Phone</th><td>:</td><td>{!! $d->doctor_ph !!}</td>
                  </tr>
                  <tr>
                    <th>E-mail</th><td>:</td><td>{!! $d->doctor_email !!}</td>
                  </tr>
                  <tr>
                    <th>Degree</th><td>:</td><td>{!! $d->degree !!}</td>
                  </tr>
                  <tr>
                    <th>Specialist</th><td>:</td><td>{!! $d->specialist !!}</td>
                  </tr>
                  <tr>
                    <th>Contact Address</th><td>:</td><td> {!! $d->doctor_address !!}</td>
                  </tr>
                </table>
                </div>
        @endforeach
        </div>
        <div class="col-md-12 pad-free">
        <div class="bar"><h4>Providing Treatment Here</h4></div>
            @foreach( $dr as $r )
            
                <div class='col-md-4'>
                      <div class="searchdoc col-md-12 pad-free">
                      @if($r->photo)
                        <div class="col-md-12 pad-free"><img src="{!! asset('images/'.$r->photo)!!}" class="img-responsive" style="height:150px; width:100%;"></div>
                      @else
                        <div class="col-md-12 pad-free"><img src="{!! asset('images/hospital-icon.png')!!}" class="img-responsive" style="height:150px; width:100%;"></div>
                      @endif
                        <div class="col-md-12">
                             <a href="{!! route('user::hospital', $r->hid) !!}" class="col-md-12 pad-free"><label style="cursor:pointer;">{!! $r->name !!}</label></a><br/>
                             <label class="col-md-12 pad-free">{!! $r->type !!}</label><br/>
                             <label class="col-md-9 pad-free">{!! $r->address !!}</label>
                             <a href="{!! route('user::hospital', $r->hid) !!}" class="col-md-2 col-md-offset-1" style="color:orange; font-weight:bold;font-size:0.85em;">DETAIL</a>
                        </div>
                      </div>
              </div>
            @endforeach 
            </div>
      </div>
@endif
@extends('layouts.app')
@section('content')
<div class="col-md-12">
   	<div class="col-md-10 col-md-offset-1">

        <div class="row"><h2 class="col-sm-12">Search Page</h2></div>
         {!! Form::open(array('url' => 'search', 'method' => 'post')) !!}
        <div class="row">
        	<div class="form-group col-md-8">
            {!! Form::text('searchtxt',null,array('class' => 'form-control', 'placeholder' => 'Search Doctor or Hospital')) !!}
           </div>
      	<div class="col-md-4">
      	 	{!! Form::submit('Search', array('class' => 'all-btn btn-primary col-md-6')) !!}
      	</div>
        </div>
          {!! Form::close() !!}

        <div class="col-sm-12 pad-free">
        @if ( !count($result))
        No search data
        @else
        <div class="row">
        <?php $count=0; ?>
      <div class="doctordiv col-md-6 pad-free" id="doctordiv">
            @foreach( $result as $r )
                @if($r->type == 'd')   
               <?php $count+=1; ?>
                <div class='col-md-6'>
                      <div class="searchdoc col-md-12 pad-free">
                      <div class="col-md-4 pad-free">
                      @if($r->photo)
                       <div><img src="{!! asset('images/'.$r->photo)!!}" class="img-responsive" style="height:90px; width:100%;"></div>
                       @else
                       <div><img src="{!! asset('images/user.jpg')!!}" class="img-responsive" style="height:90px; width:100%;"></div>
                       @endif
                       </div>
                       <div class="col-md-8">
                              <a href="{!! route('user::doctor', $r->id) !!}"><label style="cursor:pointer;">{!! $r->name !!}</label></a><br/>
                              <label>{!! $r->d !!}</label>&nbsp;&nbsp;&nbsp;<label>({!! $r->s !!})</label><br/>
                              <label>{!! $r->cityname !!}</label>
                       </div>
                      </div>
                </div>
               
                @endif
            @endforeach
            </div>
            @if($count==0)
            <script>
            document.getElementById("doctordiv").style.display="none";
            </script>

            @endif
       
         
      <div class="hospitaldiv col-md-6 pad-free">
            @foreach( $result as $r )
                @if($r->type == 'h')                
                <div class='col-md-6'>
                      <div class="searchhos col-md-12 pad-free">
                      @if($r->photo)
                        <div class="col-md-12 pad-free"><img src="{!! asset('images/'.$r->photo)!!}" class="img-responsive" style="height:150px; width:100%;"></div>
                      @else
                        <div class="col-md-12 pad-free"><img src="{!! asset('images/hospital-icon.png')!!}" class="img-responsive" style="height:150px; width:100%;"></div>
                      @endif
                        <div class="col-md-12">
                             <a href="{!! route('hospital', $r->id) !!}" class="col-md-12 pad-free"><label style="cursor:pointer;">{!! $r->name !!}</label></a><br/>
                             <label class="col-md-4 pad-free">{!! $r->cityname !!}</label><a href="{!! route('hospital', $r->id) !!}" class="col-md-4 col-md-offset-4" style="color:orange; font-weight:bold;font-size:0.85em;">DETAIL</a>
                        </div>
                      </div>
              </div>
                
                @endif
            @endforeach 
      </div>
          @endif 
          </div>
      </div>
    </div>

 
@stop
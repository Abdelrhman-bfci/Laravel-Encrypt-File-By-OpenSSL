@extends('welcome')

@section('content')
 
<div class="container">
    <div class="row">
        @if ( !session('State') )
            <div class="alert alert-danger">
                {{ 'Error No File Select File' }}
            </div>
        @endif
         {{-- start Upload file widget --}}
        <div class="col-sm-6">
            <div class="widget-box">
                <div class="widget-header">
                    <h4 class="widget-title ">Encryption File Using Open Ssl AES </h4>
                </div>
                <div class="widget-body">
                    <div class="widget-main">
                        <div class="form-group">
                            <div class="col-xs-12">
                {!! Form::open(['route'=>'enFile','method'=>'post', 'files'=>true ])!!} 
                     {{ csrf_field() }}
                 {!!Form::file('ency_file',['id'=>'id-input-file-3' ,"multiple"=>"","required"=>""])!!}
                  <button type="submit" name="encrypt"  class="btn btn-primary btn-white btn-round "> 
                    <i class="ace-icon fa fa-refresh "></i> Encrypt File
                 </button>   
               {!! Form::close() !!}              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                  {{-- end upload file widget --}}

 {{-- start Details file widget --}}
<div class="col-sm-6 pricing-span-header">
        <div class="widget-box ">
            <div class="widget-header">
                <h5 class="widget-title bigger lighter">File Details </h5>
            </div>

            <div class="widget-body">
                <div class="widget-main no-padding">
                    <ul class="list-unstyled list-striped pricing-table-header">
                    <li class="Detal">File Name: 
                        <span class="Detal">{!!  session('FileName')  !!}</span>
                    </li>
                    <li class="Detal">File Size:  
                         <span class="Detal">{!!  session('FileSize')  !!} </span> 
                     </li>
                    <li class="Detal">File Extension: 
                     <span class="Detal">{!! session('FileEx')  !!} </span>
                     </li>
                        <li class="text-center save"> Save File </li>
                    </ul>
<a href="/Save/{{session('FileWithEx')}}" class="btn btn-success btn-white btn-round btn-save">
                       <i class="fa fa-save"></i>  Save
                     </a> 
                </div>
            </div>
      </div>
</div>
 {{-- end Details file widget --}}
        </div>
 </div>

@endsection
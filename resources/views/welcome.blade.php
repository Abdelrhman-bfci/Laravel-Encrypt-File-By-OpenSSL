<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Includ Extenal CSS File -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/jquery-ui.custom.min.css" />
        {{-- <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css"> --}}
        <link rel="stylesheet" href="css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    </head>
    <body>
       {{-- the header --}}
        <div class="page-header">
            <h1 class="text-center"> Encrypt File Process Application </h1>
         </div>
        {{-- end header --}}

        @yield('content')
     
     {{-- container --}}
        
    {{-- end container --}}
          <div class="footer">
                <div class="footer-inner">
                    <div class="footer-content">
                        <span class="bigger-120">
                            <span class="blue bolder">Abdelrhman</span>
                            File Encrypt Application © 2018
                        </span> 
                    </div>
                </div>
            </div>      
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
       <script src="js/jquery-ui.custom.min.js"></script>
        <script src="js/ace-elements.min.js"></script> 
        <script src="js/ace.min.js"></script>
      <script type="text/javascript">
        $('#id-input-file-3').ace_file_input({
                    style: 'well',
                    btn_choose: 'Drop files here or click to choose',
                    btn_change: null,
                    no_icon: 'ace-icon fa fa-cloud-upload',
                    droppable: true,
                    thumbnail: 'small',
                    preview_error : function(filename, error_code) {
                       
                    }
            
                }).on('change', function(){
                    
                });
       </script>
    </body>
</html>

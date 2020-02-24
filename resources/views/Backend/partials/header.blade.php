<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title>Familiar-IT</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="{{asset('/backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
    <link href="{{asset('/backend/vendors/themify-icons/css/themify-icons.css')}}" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="{{asset('/backend/vendors/jvectormap/jquery-jvectormap-2.0.3.css')}}" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="{{asset('/backend/css/main.min.css')}}" rel="stylesheet" />

{{--    toostr js--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <!-- PAGE LEVEL STYLES-->
    <script src="{{asset('/backend/vendors/jquery/dist/jquery.min.js')}}" type="text/javascript"></script>
    <!--editor-->
    <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
    <!--    end editor-->
</head>

    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 4000);
    </script>


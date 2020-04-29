
@section('head')



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap-rtl-min.css" rel="stylesheet">
    <!-- Custom styles for this template -->


    <link href="/css/bootstrap-rtl-min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dropzone.min.css">
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="js/dropzone.js"></script>

    <link href="/css/blog-home.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
@show

@extends('layouts.master')

@section('sidebar')

@show




@section('content')


    <div class="container">

        <h3 class="text-center" style="margin-top: 50px;">آموزش آپلود چندگانه عکس با DropzoneJS در لاراول 5.8 از سایت تجاری اپ</h3><br>
        <form method="post" action="{{url('upload/store')}}" enctype="multipart/form-data"
              class="dropzone" id="dropzone">
            @csrf
        </form>
    </div>
    <script type="text/javascript">
        Dropzone.options.dropzone =
            {
                maxFilesize: 12,
                renameFile: function (file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                addRemoveLinks: true,
                timeout: 50000,
                removedfile: function (file) {
                    var name = file.upload.filename;
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        },
                        type: 'POST',
                        url: '{{ url("delete") }}',
                        data: {filename: name},
                        success: function (data) {
                            console.log("File has been successfully removed!!");
                        },
                        error: function (e) {
                            console.log(e);
                        }
                    });
                    var fileRef;
                    return (fileRef = file.previewElement) != null ?
                        fileRef.parentNode.removeChild(file.previewElement) : void 0;
                },

                success: function (file, response) {
                    console.log(response);
                },
                error: function (file, response) {
                    return false;
                }
            };
    </script>

@endsection



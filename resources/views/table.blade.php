<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

<!--    <link  rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"  crossorigin="anonymous">-->

<!--    <script  src="https://code.jquery.com/jquery-3.2.1.slim.min.js"  crossorigin="anonymous"></script>-->

<!--    <script  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"  crossorigin="anonymous"></script>-->

<!--    <script  src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"  crossorigin="anonymous"></script>-->

<!--    <script  src="https://unpkg.com/vue-bootstrap4-table@1.1.11/dist/vue-bootstrap4-table.min.js"  crossorigin="anonymous"></script>-->
<!--    <link href="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.css" rel="stylesheet">-->

<!--    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>-->
<!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>-->
<!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
<!--    <script src="https://unpkg.com/tableexport.jquery.plugin/tableExport.min.js"></script>-->
<!--    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js"></script>-->
<!--    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table-locale-all.min.js"></script>-->
<!--    <script src="https://unpkg.com/bootstrap-table@1.16.0/dist/extensions/export/bootstrap-table-export.min.js"></script>-->

<!--    <link href="toastr.css" rel="stylesheet"/>-->

    <link href="{{ asset('css/mdb.min.css') }}" rel="stylesheet" >

    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet" >

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
</head>
<body>
<!-- Info message -->
<a id="alert-target" class="btn btn-info" onclick="show()">Info message</a>




<script src="{{ asset('js/toastr.min.js') }}">

</script>
<script !src="">
    function show() {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-full-width",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "500",
            "hideDuration": "300",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "slideDown",
            "hideMethod": "slideUp"
        }

        toastr.warning('Hi! I am warning message.');
        $('.toast-message').css('text-align','center');
    }
</script>

</body>
</html>

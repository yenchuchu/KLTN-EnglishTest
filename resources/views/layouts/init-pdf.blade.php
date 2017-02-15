<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'English App - Free') }}</title>

{{--<title>English App - Free</title>--}}

<!-- Bootstrap Core CSS -->
    <link href="{{URL::asset('backend/assets/plugins/bootstrap/bootstrap.css')}}" rel="stylesheet"/>

    <!-- Custom Fonts -->
    <link href="{{URL::asset('backend/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
          type="text/css">

    <!-- sweet alert -->
    <link rel="stylesheet" href="{{URL::asset('css/sweet-alert/loader.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('css/sweet-alert/page_loaders.css')}}"/>
    <link rel="stylesheet" href="{{URL::asset('css/sweet-alert/sweetalert2.min.css')}}"/>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <style>
        @media print {
            body * {
                visibility: hidden;
            }

            #need-print, #need-print * {
                visibility: visible;
            }

            #need-print {
                position: absolute;
                left: 0;
                top: 0;
            }
        }

        @page {
            margin: 1cm 2cm;
        }

        .page-break {
            page-break-after: always;
        }

        body {
            background-color: rgba(37, 29, 29, 0.7) !important;
        }

        #need-print {
            background: white;
            padding: 40px 70px;
        }

        #wrap-page {
            margin-top: 65px;
        }

        @media (min-width: 1200px) {
            .container {
                width: 825px !important;
            }
        }

    </style>

    @yield('style')
</head>
<body>
<div class="container" id="wrap-page">
    <div class="row">
        <div id="need-print" class="col-offset-lg-2 col-lg-8 col-md-8 col-xs-8">
            {{--<div>--}}
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <h4 class="col-6-full"><strong>Full name: .........................................</strong></h4>
                    <h4 class="col-6-full"><strong>Class: .............................................</strong></h4>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12">
                    <h4 class="col-6-full"><strong>END-TERM 1 TEST(TA5)</strong></h4>
                    <h4 class="col-6-full"><strong>Time:</strong> 45 minutes</h4>
                </div>
            {{--</div>--}}

            @yield('content')
        </div>

        <div class="col-lg-2 col-md-2 col-xs-2">
            <button value="Print" id="print">Print</button>
            <button value="Preview" id="preview" onclick="preview_pdf()">Preview</button>
            <div id="editor"></div>
            <button value="Download PDF" id="download_pdf">Download PDF</button>
        </div>

    </div>

</div>

<!-- Core Scripts - Include with every page -->
<script src="{{URL::asset('backend/assets/plugins/jquery-1.10.2.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="{{URL::asset('backend/assets/plugins/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/sweet-alert/sweetalert2.js')}}"></script>
<script type="text/JavaScript" src="{{URL::asset('js/jQuery.print/jquery.print.js')}}"/>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            'Cache-Control': 'no-cache',
            'Pragma': 'no-cache'
        }
    });
</script>

<!-- Scripts -->
<script src="{{URL::asset('js/app.js')}}"></script>

@yield('script')

<script>
    $(document).ready(function () {

        /**
         * print pdf
         */
        $('#print').click(function () {
            window.print();
        });

        /**
         * download PDF
         * @type {jsPDF}
         */
//        var doc = new jsPDF();
//        var specialElementHandlers = {
//            '#editor': function (element, renderer) {
//                return true;
//            }
//        };
//
//        $('#download_pdf').click(function () {
//            doc.fromHTML($('#need-print').html(), 15, 15, {
//                'width': 170,
//                'elementHandlers': specialElementHandlers
//            });
//            doc.save('sample-file.pdf');
//        });

        $('.dropdown').click(function () {
            $('.dropdown-menu').toggle();
        });
    });

</script>

</body>
</html>

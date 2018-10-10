<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', app_name())</title>
        @yield('meta')

        @stack('before-styles')
        <!-- Boostrap -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Styles -->
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.6.6/jquery.fullPage.css'>
        <link rel="stylesheet" href="{{ url('/')  }}/frontend/css/style.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Libre+Franklin:100|Montserrat|Montserrat:500|Montserrat:600|Montserrat:800" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
        @stack('after-styles')
    </head>

    <body class="main-page">
        @yield('content')
        @stack('before-scripts')
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.6.6/jquery.fullPage.min.js'></script>
        <script  src="{{ url('/')  }}/frontend/js/index.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".email-subscribe-form").on("submit", function(e) {
                    e.preventDefault();
                    var url = $(this).attr("action");
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: $(".email-subscribe-form").serialize(),
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            if(data.success == true)
                            {
                                swal(
                                    'Thank You',
                                    data.message,
                                    'success'
                                );
                                $(".email-subscribe-form input[type='email']").val("");
                            }
                        }
                    });
                });
            });
        </script>
        @stack('after-scripts')
    </body>
</html>

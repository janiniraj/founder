<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>limkokwing.com</title>

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

    <!-- jQuery -->
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

</head>
<body>
    @include('frontend.includes.header')
    <div class="desktop_header_space"></div>
    @yield('content')
    <footer id="fullpage">
        @include('frontend.includes.footer')
    </footer>

    @stack('before-scripts')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="{{ url('/')  }}/frontend/js/index.js"></script>

    <script src="{{ url('/')  }}/frontend/js/custom.js"></script>

    <script>
        $(document).ready(function(){
            $(".email-subscribe-form").on("submit", function(e) {
                e.preventDefault();
                dd("dfdf");
            });
        });
    </script>

    @stack('after-scripts')
</body>
</html>
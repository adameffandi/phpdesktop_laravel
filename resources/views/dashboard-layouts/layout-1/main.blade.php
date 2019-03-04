<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/css/sidebar.css')}}" rel="stylesheet">
    <link href="{{asset('/css/general.css')}}" rel="stylesheet">

    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="admin-layout">
      @include('dashboard-layouts.layout-1.top-navbar')
      {{-- @include('dashboard-layouts.layout-1.sidebar') --}}

      <div id="main">
        {{-- <span id="burger-icon" onclick="openNav()">&#9776;</span> --}}
        @yield('content')
      </div>

    </div>

    <!-- Scripts -->
    <!-- jquery -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
    </script>
    <!-- datatable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

    <!-- custom -->
    <script src="{{asset('/js/app.js')}}"></script>
    <script src="{{asset('/js/sidebar.js')}}"></script>
    <script src="{{asset('/js/custom.js')}}"></script>

    <script type="text/javascript">
      $(document).ready(function () {
         //hover text
        $('[data-toggle="tooltip"]').tooltip();
         //redirect to specific tab
        $('#{{ old('tabMenu') }} a[href="#{{ old('tab') }}"]').tab('show');

        $('#userMgtTable').DataTable();
        $('#blogMgtTable').DataTable();
        $('#categoryMgtTable').DataTable();
      });
    </script>

</body>
</html>

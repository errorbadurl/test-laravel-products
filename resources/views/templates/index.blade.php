<html lang="en">
    <head>
        <title>@yield('title') - Test</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="col-md-8 col-md-offset-2">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Brand</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('/') }}">List</a></li>
                            <li class="{{ Request::is('product-create') ? 'active' : '' }}"><a href="{{ url('/product-create') }}">Create New</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.col-md-8.col-md-offset-2 -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header" style="margin: 20px 0 20px;">
                    @section('header')
                    @show
                </div>
                <section>
                    @if (\Session::has('success'))
                        <div class="alert alert-success">
                            <i class="glyphicon glyphicon-ok"></i> &nbsp;{!! \Session::get('success') !!}
                        </div>
                    @endif
                    @if (\Session::has('errors'))
                        <div class="alert alert-danger">
                            <i class="glyphicon glyphicon-remove"></i> &nbsp;{!! \Session::get('errors')->first() !!}
                        </div>
                    @endif
                </section>
                @yield('content')
            </div>
        </div>
    </body>
</html>
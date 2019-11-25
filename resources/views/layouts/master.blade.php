
<!DOCTYPE html>

<html>
    <head>
        @include('layouts.header')
    </head>
    
    <body>
    <head>
        @include('layouts.nav-bar')
    </head>
        <div class="container" >



            <div id="main" class="row" style="min-height: 600px; ">

                @yield('content')

            </div>

            <footer class="row pull-right" >
                @include('layouts.footer')
            </footer>
@yield('js')
        </div>
    </body>
</html>
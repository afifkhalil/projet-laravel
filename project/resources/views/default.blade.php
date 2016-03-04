
<!DOCTYPE html>
<html lang="en">

  @include('inc.head')
  <body>

        @include('inc.menu')

        <div class="container">

            @yield('content')

        </div><!-- /.container -->



        @include('inc.js');
    
     
  </body>
</html>

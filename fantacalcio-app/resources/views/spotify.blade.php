@routes
<!DOCTYPE html>
<html>

  <head>
    @include('layouts.head')
    <script src="{{asset('js/api_spotify.js')}}" defer="true"></script>
  </head>

  <body>

    <header>
        @include('layouts.header') 
    </header>

    <section>
      <div class="img_podcast">
        <img src="img/podcast.jpg" >
      </div>

      <div id="ricerca">
        <h1>Podcast</h1>
     </div>

      <div class="podcast">

      </div>
    </section>

    @include('layouts.footer')

  </body>

</html>
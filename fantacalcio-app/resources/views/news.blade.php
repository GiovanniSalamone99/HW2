@routes
<!DOCTYPE html>
<html>
  <head>
    @include('layouts.head')
    <script src="{{asset('js/news.js')}}" defer="true"></script>
  </head>
  <body>
    <header >
        @include('layouts.header') 
    </header>
    

    <section>
          
        <div id="open_news">
            
        </div>
        <div class="commenti">
            <h1>Commenti</h1>
            <div class="commenti_content">

            </div>
            @if($user['username'] != null)
            <form name="commenta" method="POST" class="form_commenti">
              <input type="text" name="commento" ><br>
              <button class="submit" class="invia_commento">invia</button>
            </form>
            @endif
        </div>
    
    </section>

    @include('layouts.footer')
  </body>
</html>

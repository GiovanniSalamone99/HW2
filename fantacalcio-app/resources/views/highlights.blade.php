@routes
<!DOCTYPE html>
<html>

  <head>
    @include('layouts.head')
    <script src="{{asset('js/api.js')}}" defer="true"></script>
  </head>

  <body>

    <header>
      @include('layouts.header') 
    </header>
  
    <section> 
      <div class="img_highlights">
        <img src="img/HIGHLIGHTS-SERIE-A.jpg" >
      </div>    
      <div id="main">
        <p>Qui puoi trovare tutti gli Highlights delle ultime giornate.</p>
      </div>
        <div id="ricerca2">
            
            <form name ='search_content' id='search_content'>
             <input type="text" id="cerca" name="cerca"  placeholder="Cerca">
             <button class="submit"><img src="img/cerca.png"></button>
            </form>
            
        </div>
        <div class="highlights">
          
        </div>
        <p id="risultato" class="hidden">Nessun risultato</p>
    </section>
  
    @include('layouts.footer')

  </body>

</html>
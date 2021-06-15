@routes
<!DOCTYPE html>
<html>

  <head>
    @include('layouts.head')
    <script src="{{asset('js/script.js')}}" defer="true"></script>
  </head>

  <body>

    <header>
        @include('layouts.header') 
    </header>
  
    <section>

      <div id="ricerca">
        <h1>Leghe ufficiali</h1>
        <div>
          <input type="text" id="cerca" name="cerca" placeholder="Cerca" >
          <button class="submit" id='disabled' disabled><img src="img/cerca.png"></button>
        </div>
        
      </div>

      <div class="leghe" >
          

      </div>
      
      <p id="risultato" class="hidden">Nessun risultato</p>
      <!-- Modal POPUP -->
      <div id="myModal" class="modal">
          
          <div class="modal-content">
            <div class="modal-header">
              <span class="close">&times;</span>
              <h2></h2>
            </div>

            <div class="modal-body">
                
            </div>
            
            <div class="modal-footer">
              <img src="https://content.fantacalcio.it/web/img/logo-fantacalcio.png">
            </div>
          </div>

        </div>
      
    </section>
  
    @include('layouts.footer')

  </body>

</html>
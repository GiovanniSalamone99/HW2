@routes
<!DOCTYPE html>
<html>
  <head>
    @include('layouts.head')
    <script src="{{asset('js/script_giocatori.js')}}" defer="true"></script>
  </head>
  <body>
    <header >
        @include('layouts.header')   
    </header>
    

    <section>
          
    <h1>Modifica la tua squadra</h1>
    
    
        <div id="ricerca">
            <h1></h1>
        </div>

        <div class="squadre" >  
          <table>
            <tr class="intestazione" >
              <td>Ruolo</td><td>Nome</td><td width="10%">Elimina</td>
            </tr>
          </table>

        </div>
        <p id="risultato" class="hidden">Inizia ad inserire i giocatori nella tua squadra.</p>
        
        <!-- Modal POPUP -->
        <div id="myModal" class="modal">
          
          <div class="modal-content">
            <div class="modal-header">
              <span class="close">&times;</span>
              <h2>Scegli giocatore</h2>
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

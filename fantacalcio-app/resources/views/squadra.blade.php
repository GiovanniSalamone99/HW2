@routes
<!DOCTYPE html>
<html>
  <head>
    @include('layouts.head')
    <script src="{{asset('js/script_squadra.js')}}" defer="true"></script>
  </head>
  
  <body>
    <header >
        @include('layouts.header') 
    </header>
    

    <section>
          
    <h1>Inizia a giocare creando la tua squadra</h1>
    
    
        <div id="ricerca">
            <h1>Crea Squadra</h1>
            <div>
                <form name ='search_content' id='search_content' method="POST">
                    <label><input type="text" id="nome_squadra" name="nome_squadra" placeholder="Crea squadra"></label>
                    <label><button class="submit" id='aggiungi_squadra'><img src="img/aggiungiSquadra.png"></button></label>
                </form>
            </div>
            
        </div>

          <div class="squadre" >
          <span class='error' class="hidden">*Squadra già esistente</span>
          <br>
          <table>
            <tr class="intestazione" >
              <td>Nome</td><td>Lega</td><td width="10%">Modifica</td><td width="10%">Elimina</td>
            </tr>
          </table>

          </div>
          
          <p id="risultato" class="hidden">Crea la tua prima squadra.</p>
    
    </section>

    @include('layouts.footer')
  </body>
</html>

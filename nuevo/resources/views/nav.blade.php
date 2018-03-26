<nav class="navbar navbar-inverse">
 <div class="container-fluid">
  <div class="navbar-header">
   <button type="button" class="collapsed navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-9" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
     <span class="icon-bar"></span>
      <span class="icon-bar"></span>
       <span class="icon-bar"></span>
        </button>
         <a href="/principal" class="navbar-brand"> Fundación Cambiando Destinos</a>
          </div>
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-9">
            <ul class="nav navbar-nav">
             <li class="">
               <a href="/admin/dash">Inicio</a>
             </li>
             <li>
               <a href="/admin/benef">Beneficiarios</a>
             </li>
              <li>
                <a href="/admin/registrados">Registros</a>
              </li>
              <li>
                <a href="/admin/graficos">Graficos</a>
              </li>
              <div class="navspace">

              </div>
              <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();" >
                    Cerrar sesion
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>
              </ul>
               </div>
                </div>
                 </nav>

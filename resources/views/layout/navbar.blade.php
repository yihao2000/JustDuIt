<style>
    .open-button {
        display: inline-block;
        padding: 30px;
        font-size: 36px;
        vertical-align: middle;
        overflow: hidden;
        text-decoration: none;
        color: inherit;
        border: none;
        background: none;   
        text-align: center;
        cursor: pointer;
        white-space: nowrap;
    }
    .button:hover {
        color: #000;
        background-color: #4083b6;
    }

    .searchbar{
        display: inline;
    }

    @media screen and (max-width: 768px) {
        .searchbar{
        
        }
    }
</style>

<nav id="navbar">
  <input type="checkbox" id="check">
  <label for="check" id="lines">&#9776;</label>
  <button id="openNav" class="open-button" onclick="openSidebar()" style="margin-left: 40px;">&#9776;</button>
  <a href="/home">
    <img src="{{asset('assets/nike.png')}}" alt="" id="logoimg">
    <label id="logo" style="cursor: pointer;">Just Du It !</label>
</a>

    @if((Route::currentRouteAction() != 'App\Http\Controllers\UserController@showLoginPage' && Route::currentRouteAction() != 'App\Http\Controllers\UserController@showRegisterPage'))
        <form class="searchbar" action="filterproduct" method="GET">
            <input type="text" placeholder="Search.." name="keyword" class="searchfield">
            <button class="searchsubmit"type="submit"><span style="color: #174972">Search</span> </button>
        </form>
    @endif


    <ul>
        @if(!Auth::User())
            <li><a href="/login">Login</a></li>
            <li><a href="/register">Register</a></li>
        @else
            <li>
                <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">{{Auth::user()->username}} &#9660;</button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="/logout">Logout</a>
                </div>
                </div>
            </li>
        @endif
    </ul>
</nav>

<script>
  function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

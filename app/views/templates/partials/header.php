

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Slim Auth</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="{{ urlFor('home') }}">Home</a></li>
        {% if not auth %}
        <li><a href="{{ urlFor('register') }}">Register</a></li>
        <li><a href="{{ urlFor('login') }}">Login</a></li>
        {% endif %}
        <li><a href="{{ urlFor('user.all') }}">Users</a></li>
      </ul>
      {% if auth %}
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{ auth.getAvatarUrl({size: 20}) }}" width="20"> {{ auth.getFullNameOrUsername() }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ urlFor('logout') }}">Log out</a></li>
          </ul>
        </li>
      </ul>
      {% endif %}
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
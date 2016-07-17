{% if auth %}
	<p>Hello, {{ auth.getFullNameOrUsername() }}</p>
	<p><img src="{{ auth.getAvatarUrl({size: 50}) }}"></p>
{% endif %}
 <ul>
	<li><a href="{{ urlFor('home') }}">Home</a></li>
	{% if auth %}
		<li><a href="{{ urlFor('logout') }}">Logout</a>
	{% else %}
		<li><a href="{{ urlFor('register') }}">Register</a></li>
		<li><a href="{{ urlFor('login') }}">Login</a></li>
	{% endif %}
</ul>
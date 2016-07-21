{% extends 'templates/default.php' %}

{% block title %}Register{% endblock %}

{% block content %}
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1>Login</h1>
			
			<form action="{{ urlFor('login.post') }}" method="post" autocomplete="off">
				<div class="form-group">
					<label for="identifier">Username or email</label>
					<input type="text" name="identifier" id="identifier" 
					{% if request.post('identifier') %} value="{{ request.post('identifier') }}"{% endif %} 
					class="form-control" >
					{% if errors.first('identifier') %} {{ errors.first('identifier') }}{% endif %}
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control">
					{% if errors.first('password') %} {{ errors.first('password') }}{% endif %}
				</div>

				<div class="form-group">
					<input type="checkbox" name="remember" id="remember"> <label for="remember">Remember me</label>
				</div>

				<input type="submit" value="Log in" class="btn btn-primary">

				<input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
			</form>
		</div>
	</div>
{% endblock %}
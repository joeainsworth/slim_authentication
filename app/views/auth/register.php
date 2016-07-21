{% extends 'templates/default.php' %}

{% block title %}Register{% endblock %}

{% block content %}
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1>Register</h1>
			
			<form action="{{ urlFor('register.post') }}" method="post" autocomplete="off">
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" id="email"{% if request.post('email') %} value="{{ request.post('email') }}"{% endif %}
					class="form-control">
					{% if errors.first('email') %}{{ errors.first('email') }} {% endif %}
				</div>

				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" {% if request.post('username') %} value="{{ request.post('username') }}"{% endif %} class="form-control">
					{% if errors.first('email') %}{{ errors.first('username') }} {% endif %}
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control">
					{% if errors.first('email') %}{{ errors.first('password') }} {% endif %}
				</div>

				<div class="form-group">
					<label for="password_confirm">Confirm password</label>
					<input type="password" name="password_confirm" id="password_confirm" class="form-control">
					{% if errors.first('email') %}{{ errors.first('password_confirm') }} {% endif %}
				</div>

				<div>
					<input type="submit" class="btn btn-primary">
				</div>

				<input type="hidden" name="{{ csrf_key }}" value="{{ csrf_token }}">
			</form>
		</div>
	</div>
{% endblock %}
{% extends 'templates/default.php' %}

{% block title %}All users{% endblock %}

{% block content %}
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1>All users</h1>
			{% if users is empty %}
				<p>No registered users.</p>
			{% else %}
				{% for user in users %}
					<div class="user">
						{{ user.username }}
					</div>
				{% endfor %}
			{% endif %}
		</div>
	</div>
{% endblock %}
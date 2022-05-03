<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <title>{% block title %}Auctions{% endblock %}</title> -->
    <title>Auctions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <h1>Auctions</h1>
    <div>
        {% if user.is_authenticated %}
        Signed in as <strong>{{ user.username }}</strong>.
        {% else %}
        Not signed in.
        {% endif %}
    </div>
    <nav class="navbar" style="padding-bottom: 0rem;padding-top: 0rem;">
        <div class="container-fluid"  style="padding-left: 0rem;padding-right: 0rem;">
            
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="ind.php">Active Listings</a>
                </li>
                {% if user.is_authenticated %}
                <li class="nav-item">
                    <a class="nav-link" href="{% url 'view_watchlist' user.username %}">Watchlist</a>
                </li>
                {%if check != 1%}
                <li class="nav-item">
                    <a class="nav-link" href="listing.php">Create Listings</a>
                </li>
                {% endif %}

                <li class="nav-item">
                    <a class="nav-link" href="{% url 'logout' %}">Log Out</a>
                </li>
                {% else %}
                <li class="nav-item">
                    <a class="nav-link" href="{% url 'login' %}">Log In</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{% url 'register' %}">Register</a>
                </li>
                {% endif %}
                
            </ul>
            <ul class="nav navbar-right">
                <li>
                    <a class="nav-link" href="#"> GitHub</a>
                </li>
            </ul>
        </div>
    </nav>
    <hr>
    {% block body %}
    {% endblock %}
</body>

</html>
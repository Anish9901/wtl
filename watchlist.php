{% extends "auctions/layout.html" %}

{% block body %}
<h2>{{name}}'s Watchlist</h2>
{%for x in watch %}
<div style="border: 1px solid rgba(0, 0, 0, 0.125);">
    
    <div>
        <form action="{%url 'watchlistrm' x.item.id %}" method="post">
            {% csrf_token %}
            <input value="" name = "item" type="submit" class="btn-close float-end" aria-label="Close"
            style="z-index: 2;position: relative;">
        </form>
        
    </div>
    <div class=" row position-relative">
        <div class="col-md-3">
            <img src="{{x.item.url}}" class="img-fluid " style="max-height: 200px; ">
        </div>
        <div class="col-md">
            <h5>{{x.item.item_name}}</h5>
            <p>{{x.item.description}}</p>
            <strong>Price: &nbsp;$</strong>{{x.item.price}}
            <a href="{% url 'show_item' x.item.id %}" class="stretched-link"></a>
        </div>
    </div>
</div>

{% endfor %}
{% endblock %}
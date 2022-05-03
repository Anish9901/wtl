{% extends "auctions/layout.html" %}
{% block body %}
    <!-- <h1>{{item.pk}}</h1> -->
    <h2>Listings: {{item.item_name}}</h2>
   <!--  <h3>{{debug}}</h3> -->
   <!-- {{user}} -->
    {% if watching == 1 %}
        <div>
            <form action="{%url 'watchlistrm' item.id %}" method="post">
                {% csrf_token %}
                <input  name = "item" type="submit" class="btn btn-danger" aria-label="Close" value ="Remove from Watchlist"
                style="z-index: 2;position: relative; ">
            </form>
        </div>
    {%elif watching == 2 %}
        <p>Added to Watchlist.</p>
    {% else %}
        <!-- <form action="{% url 'watchlist' item.id %}" method="post">
            {% csrf_token %}
            <button type="submit" name="Watchlist" value="Watchlist" class="btn btn-outline-secondary mb-1">Watchlist</button>
        </form> -->
        <a class="btn btn-outline-secondary mb-1" data-bs-toggle="button"  href="{% url 'watchlist' item.id %}" role="button">Watchlist</a>
    {% endif %}
    <img src ="{{item.url}}" class = "img-fluid "  style="max-height: 450px;">
    <p>{{item.description}}</p>
    <h3 class="mb-2">${{item.price}}</h3>
    {%if item.listing_active_or_sold == True %}
        {% if user.is_authenticated %}
            <div class="clearfix">
                <form action = "{% url 'bids' item.id %}" method="post">
                    {% csrf_token %}
                    <div class="mb-3">
                        <input type ="text" class="form-control " name = "bids_from_form" placeholder="Bid" autocomplete="off" autofocus>
                    </div>
                    {%if errmsg == 1%}
                        <p>Enter a valid bid.</p>
                    {% endif %}
                    <input class=" btn btn-primary float-start mb-3" type="submit" value="Place Bid">
                </form>
                {% if user == item.lister %}
                    <form action = "{% url 'close_bid' item.id %}" method="post">
                        {% csrf_token %}
                        <div>
                        {% if item.price.recent_bidder == None %}
                            <input class = "btn btn-danger float-end" type = submit value="Close listing"> 
                        {%else%}
                            <input class = "btn btn-danger float-end" type = submit value="Close listing and Sell to {{item.price.recent_bidder}}"> 
                        {%endif%}</div>
                    </form>
                {% endif %}
            </div>
        {% else %}
            <p class = "text-danger">You need to be Logged in to place a bid.</p>
        {% endif %}
    {% elif item.listing_active_or_sold == False %}
        <p class="mb-3 text-danger">Listing Closed item sold to "{{item.price.recent_bidder}}"</p>
    {% endif %}
    <div class="mb-4">
        <h4 >Details:</h4>
        <ul>
            <li>Listed By: {{item.lister}}</li>
            <li>Category: {{item.category}}</li>
            
            <li >Recent Bidder:
                {% if item.price.recent_bidder == None %}
                    <span class="text-info">Be the first Bidder to bid on this product with a starting bid of $ {{item.price}}!!!</span>
                {%else%}
                    {{item.price.recent_bidder}}
                {%endif%}
            </li>
        </ul>
    </div>
    <hr>
    <h4>Comments:</h4>  
    <div class="clearfix mb-3">
        <form action = "{% url 'commenting' item.id %}" method = "post">
            {% csrf_token %}
            <div class=" form-floating mb-3">
                <textarea class="form-control" name = "Comment" placeholder="Add a Comment" style="height: 100px" ></textarea>
                <label for="item_name">Add a Comment (in 250 Chars):</label>
            </div>    
            <input class="btn btn-primary float-end" type="submit" value="Post">
        </form>
    </div>
    <hr>
    {{comments}}  
{% endblock %}
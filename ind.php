<!-- {% extends "layout.html" %}

{% block body %} -->
<!DOCTYPE html>
<html lang="en">
<?php

require 'connection.php';
$sql = "SELECT * FROM `listings` `l` JOIN `bids` ";
$listings = mysqli_query($conn, $sql);

?>
<head>
    <!-- <title>{% block title %}Auctions{% endblock %}</title> -->
    <title>Auctions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
</head>

<body>
    <h2>Active Listings</h2>
    <hr>
    <?php 
    while($listing = mysqli_fetch_assoc($listings))
    {
        //echo $listing['item_name'];
        echo '<div style="border: 1px solid rgba(0, 0, 0, 0.125);">
                <div class = " row position-relative" >
                    <div class = "col-md-3" >
                        <img src ="'.$listing["url"].'"class = "img-fluid " style="max-height: 200px; " >
                    </div>
                <div class ="col-md" >
                    <h5>'.$listing["item_name"].'</h5>
                    <p>'.$listing["description"].'</p>
                    <strong>Price: &nbsp;$</strong>'.{{x.price}}.'
                    <a href="{% url show_item x.id %}" class="stretched-link"></a>
                </div>
                </div>
            </div>';
    }

    ?>
    
    {%for x in listings %}
        
        
    {% endfor %}
    <!-- <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card with stretched link</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
        </div>
      </div> -->
    <!-- {%for x in bids %}
        <p>{{x}}</p>
    {% endfor %} -->
{% endblock %}
</body>

</html>


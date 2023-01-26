<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<?php
    $content = file_get_contents("https://graph.facebook.com/v15.0/me?fields=id%2Cname%2Clikes&access_token=EAAVz5hR8ZCyoBALUR3dMmYU4FYO5TmzW3p0xxXsZALZB3zmdKA0yApGm67OC6Iq38GN9kJuZCuxFP7nT5i8wDdYqz40V88LiPyoqk2mfKXR1LPeX6SelQ1ZCqSrzQOX7WxisdS1qZBV0aBdglfV3KjzPLhSXrCIjZA7FWe0cwXi3FG4ZB3pbuZCjuXW9rGfPLBlSB0PYKZC5OYqAZDZD");
    $content = json_decode($content);
    //print_r($content);
    $megusta = $content->likes->data;

    echo "<table class='table table-striped'><thead><tr><th scope='col'>Nombre</th><th scope='col'>Id</th><th scope='col'>Fecha de creación</th></tr></thead><tbody>";
    foreach ($megusta as $item) {
        //print_r($item);
        echo "<tr><td>" . $item->name . "</td><td>" . $item->id. "</td><td>" . $item->created_time. "</td></tr>";
    }
    echo "</tbody></table>";
    //echo $content->name;
?>


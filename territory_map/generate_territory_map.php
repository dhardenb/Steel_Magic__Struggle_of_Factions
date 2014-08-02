
<html>
<header>

<script src="http://107.21.117.89/territory_map/elevation.js"></script>
<script src="http://107.21.117.89/territory_map/random.js"></script>
</header>

<body>

<script>

Math.seedrandom();



rows = parseInt(<?php echo file_get_contents("http://107.21.117.89/territory_map/territory_rows.txt"); ?>);
columns = parseInt(<?php echo file_get_contents("http://107.21.117.89/territory_map/territory_columns.txt"); ?>);

var mountain_level = (8000 / 20);   ; // universal mountain level to determine mountaineous-ness of the map
var ocean_level = (8000 / 40); // universal ocean level to determine the extent of oceans on the map
var lake_level = (8000 / 20);

tile_elevation = new Array(columns); // array that tracks the elevation of a territory


elevation_carving();

t_elevation = JSON.stringify(tile_elevation);


function post(path, params, method) {
    method = method || "post"; // Set method to post by default if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}

post('insert_territory_map_data.php', {elevation: t_elevation});




</script>

</body>

</html>






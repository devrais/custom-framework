<table class="table table-striped table-bordered detail-view">
    <tr>
        <td>Name</td>
        <td>{{address.name}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{address.email}}</td>
    </tr>
    <tr>
        <td>Phone</td>
        <td>{{address.phone}}</td>
    </tr>
    <tr>
        <td>Address</td>
        <td>{{address.address}}</td>
    </tr>
    <tr>
        <td>Latitude</td>
        <td>{{address.latitude}}</td>
    </tr>
    <tr>
        <td>Longitude</td>
        <td>{{address.longitude}}</td>
    </tr>
    <tr>
        <td>On Google Map</td>
        <td><a href="http://www.maps.google.com/?ll={{address.latitude}},{{address.longitude}}"><span class="glyphicon glyphicon-map-marker"></span></a></td>
    </tr>
</table>
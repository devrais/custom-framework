<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">ADD ADDRESS</h3>
    </div>
    <div class="create-client-form">
        <form action="/client/create/" method="post">
            Name:<br>
            <input type="text" name="client[name]">
            <br>
            Text:<br>
            <textarea name="client[text]"></textarea>
            <br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>

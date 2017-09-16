<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">UPDATE CLIENT</h3>
    </div>
    <div class="create-update-form">
        <form action="/client/update/<?= $this->data['id'] ?>" method="post">
            Name:<br>
            <input type="text" name="client[name]" value="<?= $this->data['name'] ?>">
            <br>
            Text:<br>
            <textarea name="client[text]"><?= $this->data['text'] ?></textarea>
            <br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
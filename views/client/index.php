<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">CLIENTS</h3>
    </div>
    <div class="panel-body">
        <table class="table table-control">
            <thead>
            <tr>
                <th>Name</th>
                <th>Text</th>
                <th>Create At</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($this->data as $key => $client) { ?>
                <tr>
                    <td><?= $client['name'] ?></td>
                    <td><?= $client['text'] ?></td>
                    <td><?= $client['created_at'] ?></td>
                    <td><a href=<?php echo \App\Helpers\Config::URL . 'client/update/'.$client['id']?>><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href=<?php echo \App\Helpers\Config::URL . 'client/delete/'.$client['id']?>><span class="glyphicon glyphicon-trash"></span></a>
                        <a href=<?php echo \App\Helpers\Config::URL . 'client/view/'.$client['id']?>><span class="glyphicon glyphicon-eye-open"></span></a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
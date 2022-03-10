<h1>List of users</h1>
<div>
    <?php
    if (!empty($users)): ?>
        <?php
        foreach ($users as $user) : ?>
            UserID: <?= $user['id'] ?> <br/>
            Username: <?= $user['username'] ?> <br/>
            Password: <?= $user['password'] ?> <br/>
            ---------------------------------- <br/>
        <?php
        endforeach; ?>
    <?php
    endif ?>
</div>
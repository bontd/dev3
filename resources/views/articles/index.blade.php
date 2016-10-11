<?php
foreach ($users as $user) {
    echo $user->name;echo '<br/>';
    echo $user->email;echo '<br/>';
    echo $user->password;
    echo '<hr/>';
}
?>
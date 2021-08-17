<h2>Задача №4</h2>
<?
function load_users_data(array $user_ids): array
{
    $data = [];
    foreach ($user_ids as &$user_id) {
        $user_id = (int)$user_id;
    }
    $user_ids = array_diff(array_unique($user_ids), [0]);
    if ($user_ids) {
        $db = mysqli_connect("mysql", "dev", "devpass", "dev");
        $sql = mysqli_query($db, "SELECT * FROM users WHERE id IN (" . implode(', ', $user_ids) . ")");
        while ($obj = $sql->fetch_object()) {
            $data[$obj->id] = $obj->name;
        }
        mysqli_close($db);
    }
    return $data;
}

$data = load_users_data(explode(',', (string) $_GET['user_ids']));
foreach ($data as $user_id => $name) {
    echo "<a href=\"/show_user.php?id=$user_id\">$name</a>";
}
?>
<p>
    В исходной реализации не было проверки данных передаваемых пользователем. А значит была возможна передача вредоносного кода.
</p>
<p>
    Так же осуществлялось по запросу к базе для каждого id. Такой вариант работал бы медленно.
</p>

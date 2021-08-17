<h2>Задача №1</h2>
<p>
CREATE TABLE `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) DEFAULT NULL,
    `gender` int(11) NOT NULL,
    `birth_date` date NOT NULL,
    PRIMARY KEY (`id`),
    KEY `users_gender_birth_date_index` (`gender`,`birth_date`)
)
</p>
<p>
CREATE TABLE `phone_numbers` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `user_id` int(11) NOT NULL,
    `phone` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `phone_numbers_user_id_index` (`user_id`)
)
</p>
<?
$db = mysqli_connect("mysql", "dev", "devpass", "dev");
$sql = mysqli_query($db, "
    SELECT u.name, COUNT(pn.id) as count
    FROM users u
    LEFT JOIN phone_numbers pn on u.id = pn.user_id
    WHERE u.gender = 2 AND TIMESTAMPDIFF(YEAR, u.birth_date, CURDATE()) BETWEEN 18 AND 22
    GROUP BY u.id;
");
?>
<table>
    <tr>
        <th>Name</th>
        <th>Count</th>
    </tr>
    <? while ($row = $sql->fetch_assoc()): ?>
        <tr>
            <td><?= $row['name'] ?></td>
            <td><?= $row['count'] ?></td>
        </tr>
    <? endwhile; ?>
</table>
<?
mysqli_close($db);
?>

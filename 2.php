<h2>Задача №2</h2>
<?
$str = 'https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3';
function updateStr(string $str): string {
    $parts = parse_url($str);
    parse_str($parts['query'], $query);
    $query = array_diff($query, [3]);
    asort($query);
    $query['url'] = $parts['path'];
    return $parts['scheme'] . '://' . $parts['host'] . '?' . http_build_query($query);
}
echo htmlspecialchars(updateStr($str));
<h2>Задача №3</h2>
<?
foreach (glob("3/*.php") as $filename)
{
    include $filename;
}
$user = new User();
$article = new Article();
//    • возможность для пользователя создать новую статью;
$user->addArticle($article);
//    • возможность получить автора статьи;
$article->getUser();
//    • возможность получить все статьи конкретного пользователя;
$user->getArticles();
//    • возможность сменить автора статьи.
$newUser = new User();
$article->setUser($newUser);

echo htmlspecialchars(file_get_contents('3/User.php'));
echo htmlspecialchars(file_get_contents('3/Article.php'));

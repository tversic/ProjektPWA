function opensArticle(x)
{
    window.open(x,"_self");
}
function opensGeneratedArticle(varijabla)
{
    window.open("http://localhost/Projekt/generatedArticles.php?param=" + varijabla, "_self");
    return varijabla;
}

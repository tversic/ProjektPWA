function opensArticle(x)
{
    window.open(x,"_self");
}
$.get("navigation.html", function(data){
    $("#navigationDiv").replaceWith(data);
});
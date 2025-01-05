// var btn1 = document.querySelector("#btn1");
// var btn2 = document.querySelector("#btn2");

// btn1.addEventListener("click",function(){
//     document.querySelector("#div1").classList.toggle("p_invisible");
// })
// btn2.addEventListener("click",function(){
//     document.querySelector("#div2").classList.toggle("p_invisible");
// })


document.addEventListener('DOMContentLoaded', (event) => {
    // Sélectionne tous les onglets
    const tabs = document.querySelectorAll('.tab');

    // Fonction pour cacher tous les articles
    function hideAllArticles() {
        const articles = document.querySelectorAll('.article');
        articles.forEach(article => {
            article.style.display = 'none';
        });
    }

    // Fonction pour enlever la classe 'active' de tous les onglets
    function deactivateAllTabs() {
        tabs.forEach(tab => {
            tab.classList.remove('active');
        });
    }

    // Fonction pour montrer l'article associé à l'onglet cliqué
    function showArticle(tab) {
        const articleId = 'article-' + tab.id.split('-')[1];
        const article = document.getElementById(articleId);
        hideAllArticles();
        deactivateAllTabs();
        article.style.display = 'block';
        tab.classList.add('active'); // Ajoute la classe 'active' à l'onglet cliqué
    }

    // Ajoute un écouteur d'événements à chaque onglet
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            showArticle(tab);
        });
    });
});
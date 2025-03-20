/** Usado na homepage quando a tela está em modo mobile.
 * 
 * Troca a cor dos círculos do carrossel da homepage, mostrando qual item do carrossel está visível.
 * 
 * Arquivo relevante: front_page_html.php
 */
const main_list = document.getElementById("home-sec1-main-list");
const tracker_list = document.getElementById("home-sec1-main-list-tracker");
if(main_list != null && tracker_list != null) {
    const main_list_items = main_list.getElementsByTagName('li');
    const tracker_list_items = tracker_list.getElementsByTagName('li');
    var main_list_padding_right = window.innerWidth - main_list.getBoundingClientRect().right;
    main_list.addEventListener('scroll', () => {
        for (let i = 0; i < main_list_items.length; i++) {
            if (main_list_items[i].getBoundingClientRect().right == window.innerWidth - main_list_padding_right) {
                tracker_list_items[i].style.color = "white";
                for (let j = 0; j < main_list_items.length; j++) {
                    if (j != i) tracker_list_items[j].style.color = "black";
                }
                break;
            }
        }
    });
}


/** Usado no header e na homepage quando a tela é redimensionada.
 * 
 * Garante que o elemento #header-main esteja visível quando a tela for redimensionada para width > 768px.
 * Altera o valor da variável global main_list_padding_right para que bata com o padding_right do elemento #home-sec1-main-list.
 * 
 * Arquivos relevantes: pageHeader.php, front_page_html.php
 */
addEventListener("resize", () => {
    if(window.innerWidth > 768) document.getElementById("header-main").style.display = "flex";
    main_list_padding_right = window.innerWidth - main_list.getBoundingClientRect().right;
});


/** Usado no header quando a tela está em modo tablet/mobile.
 * 
 * Esconde o menu hamburger quando o usuário clica fora do elemento header-main.
 * 
 * Arquivo relevante: pageHeader.php
 */
addEventListener("click", function(e) {
    let hamburger_btn = document.getElementById("hamburger-btn");
    let header_main = document.getElementById("header-main");

    if (window.innerWidth <= 768 && !header_main.contains(e.target) && e.target != hamburger_btn) {
        header_main.style.display = "none";
    };
});


/** Usado quando a tela está em modo tablet/mobile.
 * 
 * Mostra/esconde a lista de filtros quando o usuário clica no elemento de filtrar resultados.
 * 
 * Arquivos relevantes: pageHeader.php, browse_results_html.php, ca_objects_default_html.php
 * 
 * @param {string} targetId id do elemento que vai ser mostrado/escondido.
 * @param {string} [displayType='block'] 'block' por padrão. tipo de display do elemento que vai ser mostrado/escondido (e.g. 'block', 'flex').
 */
function toggleById(targetId, displayType = 'block') {
    let e = document.getElementById(targetId);
    // console.log(targetId);
    if(e == null) return;
    e.style.display = window.innerWidth <= 768 && e.style.display == displayType ? "none" : displayType;
}


/** Função de guarda para toggleById.
 * 
 * Chama toggleById somente se a classe '.summary-sheet-attribute' existe.
 * 
 * Arquivo relevante: ca_objects_default_html.php
 */
function toggleItems() {
    if(document.getElementsByClassName('.summary-sheet-attribute') == null) return;
    toggleById('itens');
}
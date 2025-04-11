const width_breakpoint = 940; // previamente 768 (px)

/** Usado na homepage quando a tela está em modo mobile.
 * 
 * Troca a cor dos círculos do carrossel da homepage, mostrando qual item do carrossel está visível.
 * 
 * Arquivo relevante: front_page_html.php
 */
const main_list = document.getElementById("home-sec1-main-list");
const tracker_list = document.getElementById("home-sec1-main-list-tracker");
const main_list_items = main_list.getElementsByTagName('li');
const tracker_list_items = tracker_list.getElementsByTagName('li');
var main_list_padding_right = window.innerWidth - main_list.getBoundingClientRect().right;
main_list.addEventListener('scroll', retrack);

function retrack() {
    for (let i = 0; i < main_list_items.length; i++) {
        if (main_list_items[i].getBoundingClientRect().right == window.innerWidth - main_list_padding_right) {
            tracker_list_items[i].style.color = "white";
            for (let j = 0; j < main_list_items.length; j++) {
                if (j != i) tracker_list_items[j].style.color = "black";
            }
            break;
        }
    }
}

function jumpToListItemById(li_id) {
    document.getElementById(li_id).scrollIntoView();
    location.href='#'+li_id;
    window.scrollTo(0, 0);
    retrack();
    return false;
}


/** Usado no header e na homepage quando a tela é redimensionada.
 * 
 * Garante que o elemento #header-main esteja visível quando a tela for redimensionada para width > width_breakpoint
 * Altera o valor da variável global main_list_padding_right para que bata com o padding_right do elemento #home-sec1-main-list.
 * 
 * Arquivos relevantes: pageHeader.php, front_page_html.php
 */
addEventListener("resize", () => {
    let header_main = document.getElementById("header-main");
    if(window.innerWidth > width_breakpoint) {
        if(header_main != null) header_main.style.display = "flex";
        
        let itens = document.getElementById("itens");
        if(itens != null) itens.style.display = "block";
    } else {
        if(header_main != null) header_main.style.display = "none";
    }

    if(main_list != null) main_list_padding_right = window.innerWidth - main_list.getBoundingClientRect().right;
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

    if (window.innerWidth <= width_breakpoint && !header_main.contains(e.target) && e.target != hamburger_btn) {
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
 * @param {string} [displayType='block'] 'block' por padrão. Tipo de display do elemento que vai ser mostrado/escondido (e.g. 'block', 'flex').
 */
function toggleById(targetId, displayType = 'block', breakpoint = width_breakpoint) {
    let e = document.getElementById(targetId);
    // console.log(targetId);
    if(e == null) return;
    e.style.display = window.innerWidth <= breakpoint && e.style.display == displayType ? "none" : displayType;
}


/** Funcionalidade similar à função toggleById; contrário a toggleById, preserva a contagem das subgalerias.
 * 
 * Arquivos relevantes: set_info_html.php
 * 
 * @param {string} targetId id do elemento que vai ser mostrado/escondido.
 */
function toggleVisibilityById(targetId) {
    let e = document.getElementById(targetId);
    // console.log(targetId);
    if(e == null) return;
    if(e.classList.contains("visibility-hidden")) {
        e.classList.remove("visibility-hidden");
    } else {
        e.classList.add("visibility-hidden");
    }
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


const home_popover_div = document.getElementById("home-select-div");
if(home_popover_div != null) {
    addEventListener('click', event => {
        if (!home_popover_div.contains(event.target)) {
            toggleById('home-select-popover', 'none', 9000);
        }
      });    
}
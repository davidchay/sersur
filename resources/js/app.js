import Alpine from 'alpinejs'

window.Alpine = Alpine;

document.addEventListener('alpine:init', () => {
      
      Alpine.data('header', () => {
            const primaryMenu = document.querySelector('#primary-menu');
            const links          = primaryMenu.querySelectorAll('a');
            const screeLg        = 960; //tamaño de lg valor de breakpoint de pantallas LG
            //hasChildren es el nodo li que tiene menu desplegable
            const hasChildren = primaryMenu.querySelectorAll('.menu-item-has-children');
            //submenu es el ul de children que tiene hasChildren
            const submenus = primaryMenu.querySelectorAll('.sub-menu');
            const svg = `<svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>`;  
            // //Optiene el valor de una propiedad del un elemento
             const getPropValue = (elemento, propiedad) => window.getComputedStyle( elemento , null).getPropertyValue(propiedad);
            
             // Esta funcion calcula si la pantalla es LG
            
             const isScreenLg = () => (window.innerWidth > screeLg) ? true : false;
             let isOpenMenu = false;
            
            //Esta funcion se ejecuta cuando ocurre un click o mouseenter al iconoMenu (icono/boton para bdesplegar menu desplegable)   
            const openMenu   = (e)=>{
                  e.preventDefault();
                  const ct = e.currentTarget; //btnIcoin (boton para extender el menu)
                  const sMenu = ct.nextElementSibling; // Submenu ul que se va desplegar
                  let bandera = false;
                  //despliega o esconde el menu
                  if(e.type==='mouseenter' && !!isScreenLg()){
                        sMenu.classList.remove('hidden');
                        bandera = true;
                  }else if(e.type==='click'){
                        sMenu.classList.toggle('hidden');
                        bandera = true;
                  }
                  //hace un corrido en todos los submenus para esconder los submenos que no se abrieon
                  // y deja abierto el submenu que si se abrio
                  if(bandera) {
                        for(const subm of submenus ){
                              if(subm.contains(ct)){
                                    sMenu.classList.add('lg:bg-white','lg:drop-shadow-2xl','lg:w-40');
                                    if(isScreenLg()){
                                          sMenu.style.marginLeft=`${ct.parentElement.offsetWidth - parseInt(getPropValue(ct.parentElement,'padding-left'))}px`;
                                    }
                                    continue;
                              }
                              if(sMenu !== subm ){
                                    subm.classList.add('hidden');
                              }
                        }
                  }
            };                  
     
            for(const submenu of submenus ){
                  submenu.classList.add('hidden','w-full', 'py-3','lg:absolute','lg:z-50','lg:bg-white','lg:drop-shadow-2xl','lg:w-40');
                  submenu.querySelectorAll('li').forEach((li)=>{
                        li.classList.add('pl-6','lg:pl-auto','lg:flex','lg:justify-between','lg:px-3');
                        li.classList.remove('px-6','lg:mr-5');
                        li.children[0].classList.add('py-1','inline-block','lg:normal-case','lg:hover:text-secondary')
                  });
            }

            //Dandole estilos al elemento "a" de los menus en menu  
            links.forEach((link)=>{
                  link.classList.add('hover:text-secondary');
            });
     
            for( const link of hasChildren){
                  let btnIcon = document.createElement("button");
                  btnIcon.innerHTML= svg;
                  btnIcon.classList.add('p-1','justify-self-end','rounded','bg-gray-200', 'lg:bg-transparent','lg:ml-3');
                  btnIcon.addEventListener('click', openMenu, true)
                 btnIcon.addEventListener('mouseenter', openMenu, true)
                  link.querySelector('a').after(btnIcon);
                  link.classList.add('grid','grid-cols-2','justify-items-start','lg:inline-block');
                  ///Aqui me quede hacver un flex tres elementos dos arriba y unno abajo
                  link.lastElementChild.classList.add('col-span-2')

            }
            

            // Elimina la etiqueta hidden de los submenu cuando dan click fuera de primary-menu
            document.addEventListener( 'click', function( event ) {
                  const isClickInsidePrimaryMenu = primaryMenu.contains( event.target );
                  if ( ! isClickInsidePrimaryMenu ) {
                        for(const submenu of submenus ){
                              submenu.classList.add('hidden');
                        }
                  }
            } );

            window.addEventListener("resize", () => {
                  submenus.forEach( (submenu)=> { 
                        submenu.classList.add('hidden');
                        submenu.removeAttribute('style');
                  });
                  
            });

            if(isScreenLg()) {
                  isOpenMenu = true;
            }

            return {
              menuOpen: isOpenMenu,
              searchOpen: false,
              dropDownUserOpen: false,    
    
              menu() {
                  this.menuOpen = !this.menuOpen;
                  this.searchOpen = false;
              },

              hiddenMenu () {
                    if(!isScreenLg()){
                        this.menuOpen = false;
                    }
              },

              searchBar (){
                  this.searchOpen = !this.searchOpen;
              },

              dropdownUser(){
                  this.dropDownUserOpen = !this.dropDownUserOpen;
              },

              resize(){
                  this.menuOpen = isScreenLg() ? true : false;
                  
                  this.dropDownUserOpen = false;
              }
          }
      });


      Alpine.data('getNavBarHeight', () => {
            const navBarElement = document.querySelector('#navBar');
            
            return {
                  navBar : '',
                  init( x = 1.5 ) {
                        height = navBarElement.offsetHeight * x;
                        if(height<90){
                              window.addEventListener("load", () => {
                                    height = navBarElement.offsetHeight * x;
                              });
                        }
                       
                       this.navBar =  height; 
                       
                      
                       
                  },
                  resize( x = 1.5){
                        this.navBar = navBarElement.offsetHeight * x;  
                       
                  }
            }
      });


      Alpine.data('dof',  () => {
            return {
                  url: 'https://sidofqa.segob.gob.mx/dof/sidof/indicadores/',
                  valor : {}
            };
            
      });


});

Alpine.start();

  
document.addEventListener('DOMContentLoaded', function() {
      addMarginTopSearchBar();
     
});
window.addEventListener("resize", () => {
    
      addMarginTopSearchBar();
      
});


function addMarginTopSearchBar(){
      const searchBar   = document.querySelector('#search-bar');
      if(searchBar) {
            const navBar = document.querySelector('#navBar-block');

            let navBarHeight = navBar.offsetHeight; 
      
            searchBar.style.marginTop    =`${navBarHeight}px`;      
          

      }
}




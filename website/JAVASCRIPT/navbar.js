//It makes active the navbar section that is clicked
function activeSection(selected){

    var navbar = document.getElementById("navbar");
    var sections = navbar.getElementsByClassName("section");

    for (var i=0; i < sections.length; i++){
        
        if (i == selected){
            sections[selected].classList.add("active");
            window.localStorage.setItem("active",JSON.stringify(sections[selected]));

            localStorage.setItem("section", selected);
        }
        else{
            sections[i].classList.remove("active");
        }
    };
}

//It makes visible the menu when the menuBtn is clicked
function visibleMenu(){

    var navbar = document.getElementById("navbar");
    var sections = navbar.getElementsByClassName("section");

    navbar.classList.toggle("active"); //it makes the navbar active or not 

    while(navbar.classList.contains("active")){

        for (var i=0; i < sections.length; i++){          

            sections[i].addEventListener("click", function(){
            navbar.classList.remove("active");
        });
        }

        break;
    } 
} 

//it unfocus the menu button every time pointer goes over it
function menuBtnUnfocus(){
    var menuBtn = document.getElementsByClassName("menuBtn")[0];

    menuBtn.blur();
}
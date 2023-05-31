
//It makes visible the setting box
function openSettings(){

    var settings = document.getElementById("settingsBox");

    settings.style.display = "initial";
}

//It makes invisible the setting box
function closeSettings(){
    
    var settings = document.getElementById("settingsBox");

    settings.style.display = "none";
}

//It changes the background color of the whole site with the selected color
function changeBcolor(){

    var inputEl = document.getElementById("backColor"); //element in order to have access in the selected color for background
    var backgrounds = document.getElementsByClassName("bcolors");
  
    inputEl.addEventListener("input", function(){

        for(i=0; i<backgrounds.length ; i++){

            backgrounds[i].style.backgroundColor = this.value;
        }

        localStorage.setItem("backColor", this.value);
    });
}

//It changes the font color of the whole site with the selected color
function changeFcolor(){

    var inputEl = document.getElementById("fontColor"); //element in order to have access in the selected color for font
    var elems = document.querySelectorAll("*");
    var line = document.getElementById("line");

    var setEl = document.getElementById("settings"); //It represents the settings section

    inputEl.addEventListener("input", function(){

        for(i=0; i<elems.length ; i++){

            if(setEl.contains(elems[i])){  //In order to not have changes in the setting section
                continue;
            }

            elems[i].style.color = this.value;
            elems[i].style.borderColor = this.value;
            
            if(line != null){
                line.style.backgroundColor = this.value;
            }           
        }

        localStorage.setItem("fontColor", this.value);
       
    });
}

//It changes the font size of the whole site with the selected size
function changeFsize(size){
    
    var elems = document.querySelectorAll("*");

    var setEl = document.getElementById("settings"); //It represents the settings section


    for(i=0; i<elems.length ; i++){

        if(setEl.contains(elems[i])){  //In order to not have changes in the setting section
            continue;
        }

        elems[i].style.fontSize = size + "px";
    }; 

    localStorage.setItem("fontSize", size + "px");
}

//It highlights all links of the page or undoes the highlighting 
function highlightLinks(){

    var a = document.getElementsByTagName("a");
    var button = document.getElementById("highlight");

    if(!button.classList.contains("active")){

        button.classList.add("active");
        button.style.backgroundColor = "#171A2B";
        button.style.color = "white";

        button.ariaPressed = "true";

        for (i=0; i<=a.length; i++){

            if(a[i] != null){

                a[i].style.color = "red";
                a[i].style.border = "3px solid red";
                a[i].style.textDecoration = "underline";
            }
        }

        localStorage.setItem("highlight", "active");
    }
    else {    
        
        button.classList.remove("active");
        button.style.backgroundColor = "white";
        button.style.color = "#171A2B";

        button.ariaPressed = "false";

        for (i=0; i<=a.length; i++){

            if(a[i] != null){

                a[i].style.color = "revert-layer";
                a[i].style.border = "revert-layer";
                a[i].style.textDecoration = "revert-layer";
            }
            
        }

        localStorage.setItem("highlight", "non-active");
    }
}

//It resets all the accessibility settings
function resetSettings(){

    var el = document.querySelectorAll("*");

    for (i=0; i<el.length; i++){
        
        el[i].setAttribute("all","revert-layer");

        el[i].style.color = "revert-layer";
        el[i].style.border = "revert-layer";
        el[i].style.textDecoration = "revert-layer";
        el[i].style.backgroundColor = "revert-layer";
        el[i].style.fontSize = "revert-layer";
    }

    if (document.getElementById("highlight").classList.contains("active")){
        highlightLinks();
    }

    localStorage.clear();
}

//It checks if the user had selected settings for the website and if yes it applies all settings
function selectedChoices(){

    var backgrounds = document.getElementsByClassName("bcolors"); //elements that have to change backgroundColor
    var elems = document.querySelectorAll("*");
    var line = document.getElementById("line"); //element that represents line has to change color
    var button = document.getElementById("highlight"); //element that highlights all the links

    var setEl = document.getElementById("settings"); //It represents the settings section

    var backColor = localStorage.getItem("backColor");
    var fontColor = localStorage.getItem("fontColor");
    var font = localStorage.getItem("fontSize");

    if(true){

        //it changes the background color
        for(i=0; i<backgrounds.length ; i++){

            backgrounds[i].style.backgroundColor = backColor;
        }

        //it changes the font color and size
        for(x=0; x<elems.length ; x++){

            if(setEl.contains(elems[x])){  //In order to not have changes in the setting section
                continue;
            }

            elems[x].style.fontSize = font; 
            elems[x].style.color = fontColor;
            elems[x].style.borderColor = fontColor;    

            if(line != null){
                line.style.backgroundColor = fontColor;
            }
            
        };  
        
        //it highlights all the links
        if(localStorage.getItem("highlight") == "active"){

            highlightLinks();
        }
    }
}
function DespliegaMenu(elem){
    
    if (elem.id=='SecPasta') {
        var seV = document.getElementById("MenuPasta").style.display;
        if (seV=='inline') {
            document.getElementById("MenuPasta").style.display = 'none';
        }else{
            document.getElementById("MenuPasta").style.display = 'inline';
        }
    }else{
        document.getElementById("MenuPasta").style.display = 'none';
    }


    if (elem.id=='SecParrillas') {
        var seV = document.getElementById("MenuParrilla").style.display;
        if (seV=='inline') {
            document.getElementById("MenuParrilla").style.display = 'none';
        }else{
            document.getElementById("MenuParrilla").style.display = 'inline';
        }
    }else{
        document.getElementById("MenuParrilla").style.display = 'none';
    }

    if (elem.id=='SecHamburguesas') {
       
        var seV = document.getElementById("MenuHamburguesas").style.display;
        if (seV=='inline') {
            document.getElementById("MenuHamburguesas").style.display = 'none';
        }else{
            document.getElementById("MenuHamburguesas").style.display = 'inline';
        }
    }else{
        document.getElementById("MenuHamburguesas").style.display = 'none';
    }
    if (elem.id=='SecMazorcadas') {
        //console.log("asdad");
        var seV = document.getElementById("MenuMazorcadas").style.display;
        if (seV=='inline') {
            document.getElementById("MenuMazorcadas").style.display = 'none';
        }else{
            document.getElementById("MenuMazorcadas").style.display = 'inline';
        }
    }else{
        document.getElementById("MenuMazorcadas").style.display = 'none';
    }

    if (elem.id=='SecEnsaladas') {
        //console.log("asdad");
        var seV = document.getElementById("MenuEnsaladas").style.display;
        if (seV=='inline') {
            document.getElementById("MenuEnsaladas").style.display = 'none';
        }else{
            document.getElementById("MenuEnsaladas").style.display = 'inline';
        }
    }else{
        document.getElementById("MenuEnsaladas").style.display = 'none';
    }

        if (elem.id=='SecPostres') {
        //console.log("asdad");
        var seV = document.getElementById("MenuPostres").style.display;
        if (seV=='inline') {
            document.getElementById("MenuPostres").style.display = 'none';
        }else{
            document.getElementById("MenuPostres").style.display = 'inline';
        }
    }else{
        document.getElementById("MenuPostres").style.display = 'none';
    }

     if (elem.id=='SecBebidas') {
        //console.log("asdad");
        var seV = document.getElementById("MenuBebidas").style.display;
        if (seV=='inline') {
            document.getElementById("MenuBebidas").style.display = 'none';
        }else{
            document.getElementById("MenuBebidas").style.display = 'inline';
        }
    }else{
        document.getElementById("MenuBebidas").style.display = 'none';
    }
    
    //$("#"+elem.id+"").append('<div>Hola mundo </div>');
}
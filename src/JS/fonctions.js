var compteur = 0;
var nbrPairesTrouvees = 0;
var coups = 0;
var idPremiereCarte;
var numeroPremiereCarte;

var temps = 0;
var seconde = 0; //initialise les secondes
var minute = 0; //initialise les minutes

function chargementPartie()
{
    alert("Prêt ?");
    chrono();
}

function chrono()
{
    temps++;
    seconde++;
    
    if (seconde > 59)
    {
        seconde = 0;
        minute++;
    }
    
    document.formPartie.temps.value = minute + " : " + seconde; // affichage du temps
    document.formPartie.chrono.value = temps; // affichage du temps
    compte = setTimeout('chrono()', 1000); //la fonction est relancée toutes les secondes
}

function selectCarte(idImage, cheminImage, numero)
{
    document.getElementById("carte"+numero).src = cheminImage;
    
    verifCartes(idImage, numero);
}

function verifCartes(idImage, numero)
{
    if (idPremiereCarte == null)
    {
        idPremiereCarte = idImage; // prend l'id de la première carte
        numeroPremiereCarte = numero; // prend le numéro de placement de la première carte
        document.getElementById('carte'+numeroPremiereCarte).style = "width: 100px; height: 180px; margin: 6px; pointer-events: none;";
    }
    else
    {
        if(idPremiereCarte == idImage) // si correspondent
        {
            document.getElementById('carte'+numero).onclick = null;
            document.getElementById('carte'+numeroPremiereCarte).onclick = null;
            idPremiereCarte = null;
            compteur = -1;
            nbrPairesTrouvees++; // compte le nombre de paires trouvées
        }
        else // sinon ne correspondent pas
        {
            document.getElementById('carte'+numero).style = "width: 100px; height: 180px; margin: 6px; pointer-events: none;";
            annuleCartes(numero, numeroPremiereCarte); // retourne les cartes
            idPremiereCarte = null;
        }
    }
    
    /*test si toutes les paires ont été trouvées */
    if(nbrPairesTrouvees == 9)
    {
        alert("VICTOIRE !!! Fin de partie");
        
        termine();
    }
}

/* fonction qui vérifie les cartes */
function annuleCartes(numero, numeroPremiereCarte)
{
    setTimeout(function()
    {
         document.getElementById('carte'+numeroPremiereCarte).src = 'src/Images/Dos.png'; // remet le dos de la première carte cliquée
         document.getElementById('carte'+numero).src = 'src/Images/Dos.png'; // remet le dos de al deuxième carte cliquée
    }, 1000); // après 1 seconde
    
    document.getElementById('carte'+numeroPremiereCarte).style = "width: 100px; height: 180px; margin: 6px;";
    document.getElementById('carte'+numero).style = "width: 100px; height: 180px; margin: 6px;";
}

/* compte le nombre de coups joués */
function compteCoups()
{
    compteur++;
    
    if(compteur == 2)
    {
        coups++;
        document.getElementById('nombreCoups').value = coups;
        compteur = 0;
    }
}

/* fonction de fin de partie */
function termine()
{
    document.getElementById('formPartie').submit(); // actionne le formulaire
    clearTimeout(compte);
}

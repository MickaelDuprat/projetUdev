$(document).ready(function(){
    
    /* variables */
    var $mdp = $('#mdp'),
        $confirmation = $('#confirmation'),
        $prenom = $('prenom'),
        $nom = $('nom'),
        $adresse = $('add1'),
        $mail = $('#mail'),
        $envoi = $('#envoi'),
        $reset = $('#reset'),
        $erreur = $('#erreur'),
        $champ = $('.champ');

    /* fonction verification du nombre de caractères pour chaque champs ( vert si bon, rouge si non correcte) */
    $champ.keyup(function(){
        if($(this).val().length < 5){ 
            $(this).css({ 
                borderColor : 'red',
            color : 'red'
            });
         }
         else{
             $(this).css({ 
             borderColor : 'green',
             color : 'green'
         });
         }
    });

    /* fonction verification si mdp identique */
    $confirmation.keyup(function(){
        if($(this).val() != $mdp.val()){ 
            $(this).css({ 
                borderColor : 'red',
            color : 'red'
            });
        }
        else{
        $(this).css({ 
            borderColor : 'green',
            color : 'green'
        });
        }
    });

    /* event click sur bouton d'envoi */
    $envoi.click(function(e){

        e.preventDefault(); 

        /* verification de chaque champs */
        verifier($nom);
        verifier($prenom);
        verifier($mdp);
        verifier($adresse);
        verifier($tel);
        verifier($confirmation);
        verifier($mail);

    });

    /* fonction du bouton reset */
    $reset.click(function(){
        $champ.css({ 
            borderColor : '#ccc',
            color : '#555'
        });
        $erreur.css('display', 'none'); 
    });

    /* verifie si les champs sont bien remplis, si ils ne le sont pas afficher message erreur */
    function verifier(champ){
        if(champ.val() == ""){ 
            $erreur.css('display', 'block'); 
            champ.css({ 
                borderColor : 'red',
                color : 'red'
            });
        }
    }

});
$(document).ready(function(){
    
    /* variables */
    var $civ = $('#civ'),
        $mdp = $('#mdp'),
        $confirmation = $('#confirmation'),
        $prenom = $('#prenom'),
        $nom = $('#nom'),
        $adresse = $('#add1'),
        $mail = $('#mail'),
        $tel = $('#tel'),
        $ville = $('#ville'),
        $villecp = $('#villecp'),
        $addfact = $('#addfact'),
        $codeCoupon = $('#codeCoupon'),
        $raisonSociale = $('#raisonSociale'),
        $siret = $('#siret'),
        $nomCSociete = $('#nomCSociete'),
        $ddn = $("#datepicker"),
        $envoi = $('#envoi'),
        $reset = $('#reset'),
        $erreur = $('#erreur'),
        $erreurmail = $('#erreurmail'),
        $erreurpwd = $('#erreurpwd'),
        $erreurtel = $('#erreurtel'),
        $erreurvillecp = $('#erreurvillecp'),
        $erreurddn = $('#erreurddn'),
        $champ = $('.champ'),
        $clientPro = $("input[name='typeClient']"),
        $proform = $('#proform'),
        $promo = $("input[name='choixPromo']"),
        $coupon = $('#coupon'),
        $typeClient = $('input[typeClient]'),
        $codePromo = $('input[choixPromo]');
   



 /* validation de la date de naissance par rapport au format */
  $ddn.on('change', function(){
    try {
    var dateParse = $.datepicker.parseDate("yy-mm-dd", $(this).val());
    }
     catch (e) {}
    if (dateParse) {
        $(this).css({ 
                    borderColor : 'green',
                    color : 'green'
                });
                $erreurddn.css('display', 'none');
    } else {
      $(this).css({ 
                borderColor : 'red',
                color : 'red'
            });
                $erreurddn.css('display', 'block');
    }
});

     /* verifier si la civilité est bien sélectionné */
    $civ.on('click', function(){
    if($(this).val() == ""){
            $(this).css({ 
                    borderColor : 'red',
                    color : 'red'
                    }); 
          } else {
          $(this).css({
                    borderColor : '#ccc',
                    color : '#555'
                });
            } 
});
    
    /* verification code postal regex */
    $villecp.keyup(function(){
        $villecp.filter(function(){
            var regex = /^(([0-8][0-9])|(9[0-5]))[0-9]{3}$/;
            if( !regex.test( $(this).val() ) ) {
                $(this).css({ 
                borderColor : 'red',
                color : 'red' 
            });
                $erreurvillecp.css('display', 'block');
            } else {
                $(this).css({ 
                    borderColor : 'green',
                    color : 'green'
            });            
                $erreurvillecp.css('display', 'none');
            }    
        });
    });

    /* verifier téléphone regex */
    $tel.keyup(function(){
        $tel.filter(function(){
            var regex = /^0[1-9]\d{8}$/;
            if( !regex.test( $(this).val() ) ) {
                $(this).css({ 
                borderColor : 'red',
                color : 'red' 
            });

                $erreurtel.css('display', 'block');

            } else {
                $(this).css({ 
                    borderColor : 'green',
                    color : 'green'
            });            
                $erreurtel.css('display', 'none');
            }    
        });
    }); 

    /* verification email regex */
    $mail.keyup(function(){
        $mail.filter(function(){
            var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if( !regex.test( $(this).val() ) ) {
                $(this).css({ 
                borderColor : 'red',
                color : 'red' 
            });
                $erreurmail.css('display', 'block'); 
                } else {
                    $(this).css({ 
                borderColor : 'green',
                color : 'green', 
            });
                $erreurmail.css('display', 'none');
            } 
        });
    });            

    /* fonction verification si mdp identique */
    $confirmation.keyup(function(){
        var regex = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
        if($(this).val() != $mdp.val() && (!regex.test( $(this).val() ) ) ){ 
            $(this).css({ 
                borderColor : 'red',
                color : 'red', 
            });
            $mdp.css({ 
            borderColor : 'red',
            color : 'red'
        });
            $erreurpwd.css('display', 'block');
        } else {
            $(this).css({ 
            borderColor : 'green',
            color : 'green'
        });
            $mdp.css({ 
            borderColor : 'green',
            color : 'green'
        });
            $erreurpwd.css('display', 'none');
        }
    });

    /* event click sur bouton d'envoi */
    $envoi.click(function(e){

        e.preventDefault(); 

        /* verification de chaque champs */
        verifier($nom);
        verifier($prenom);
        verifier($ddn);
        verifier($mdp);
        verifier($adresse);
        verifier($ville);
        verifier($villecp);
        verifier($addfact);
        verifier($tel);
        verifier($confirmation);
        verifier($mail);
        verifier($raisonSociale);
        verifier($siret);
        verifier($nomCSociete);
        verifier($codeCoupon);
        verifier($civ);
    });

    /* afficher  le  label&input codepromo */
    $promo.click(function() {
        if($(this).val() == "oui" && $(this).prop('checked') == true){
            $coupon.css({
                display : 'block'
            });
        } else {
            $coupon.css({
            display : 'none'
            })
        }
    });

    /* afficher le formulaire client pro si le bouton radio pro est coché */
    $clientPro.click(function() {
        if($(this).val() == "pro" && $(this).prop('checked') == true){
            $proform.css({
                display : 'block'
            });
        } else {
            $proform.css({
                display : 'none'
            })
        }
    });

/* function affichage Pro */
    function afficherPro($proform) {
            $proform.css({
                display : 'block'
            });
    }
    
    /* fonction du bouton reset */
    $reset.click(function(){
        $champ.css({ 
            borderColor : '#ccc',
            color : '#555'
        });
        $erreur.css('display', 'none'),
        $erreurmail.css('display', 'none'), 
        $erreurpwd.css('display', 'none'),
        $erreurtel.css('display', 'none'),
        $erreurcpville.css('display', 'none');
        $erreurddn.css('display', 'none'); 
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


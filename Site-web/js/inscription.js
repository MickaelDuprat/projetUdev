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
        $erreurlogin = $('#erreurlogin'),
        $champ = $('.champ'),
        $clientPro = $("input[name='typeClient']"),
        $proform = $('#proform'),
        $promo = $("input[name='choixPromo']"),
        $coupon = $('#coupon'),
        $typeClient = $('input[typeClient]'),
        $codeCoupon = $('#codeCoupon'),
        $codePromo = $('input[choixPromo]'),
        $login = $('#login');
   

        /* fonction isValide (si champs valide) */

        function isValide(champ) {
            champ.css({
                borderColor : '#ccc',
                color : '#555'
            });
            $erreur.css('display', 'none');
        }


        /* fonction isNotValide (si champs non valide) */
        function isNotValide(champ) {
            champ.css({
                borderColor : 'red',
                color : 'red'
            });
            $erreur.css('display', 'block');
        }

// login validation
        $login.keyup(function(){
            $login.filter(function(){
            if($(this).val().length < 5) {
                isNotValide($(this));
                 $erreurlogin.css('display', 'block');
            } else {
                isValide($(this));         
                $erreurlogin.css('display', 'none');
            }    
        });
        });
 /* validation de la date de naissance par rapport au format */
  $ddn.on('change', function(){
    try {
    var dateParse = $.datepicker.parseDate("yy-mm-dd", $(this).val());
    }
     catch (e) {}
    if (dateParse) {
        isValide($(this));
                $erreurddn.css('display', 'none');
    } else {
        isNotValide($(this));
                $erreurddn.css('display', 'block');
    }
});

     /* verifier si la civilité est bien sélectionné */
    $civ.on('click', function(){
    if($(this).prop(("checked") !== true) && ($('this:checked').val() == "")){
            isNotValide($(this)); 
          } else {
            isValide($(this));
            } 
});
    
    /* verification code postal regex */
    $villecp.keyup(function(){
        $villecp.filter(function(){
            var regex = /^(([0-8][0-9])|(9[0-5]))[0-9]{3}$/;
            if( !regex.test( $(this).val() ) ) {
                isNotValide($(this));
                 $erreurvillecp.css('display', 'block');
            } else {
                isValide($(this));         
                $erreurvillecp.css('display', 'none');
            }    
        });

    /* verifier téléphone regex */
    $tel.keyup(function(){
        $tel.filter(function(){
            var regex = /^0[1-9]\d{8}$/;
            if( !regex.test( $(this).val() ) ) {
                isNotValide($(this));
                $erreurtel.css('display', 'block');
            } else {
                isValide($(this));          
                $erreurtel.css('display', 'none');
            }    
        });
    }); 

    /* verification email regex */
    $mail.keyup(function(){
        $mail.filter(function(){
            var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            if( !regex.test( $(this).val() ) ) {
                isNotValide($(this));
                $erreurmail.css('display', 'block'); 
                } else {
                    isValide($(this));
                $erreurmail.css('display', 'none');
            } 
        });
    });            

    /* fonction verification si mdp identique */
    $confirmation.keyup(function(){
        //var regex = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
        if ($(this).val() != $mdp.val()){ 
            isNotValide($(this));
            $erreurpwd.css('display', 'block');
        } else {
            isValide($(this));
            }
            $erreurpwd.css('display', 'none');
        });
    });

    $mdp.keyup(function(){
       // var regex = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
        if($(this).val() != $confirmation.val()){
            $erreurpwd.css('display', 'block');
        } else {
            isValide($(this));
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
        verifier($login);
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
            $codeCoupon.text() == '';
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
            $raisonSociale.text() == '';
            $nomCSociete.text() == '';
            $siret.text() == '';

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
        $erreurvillecp.css('display', 'none');
        $erreurddn.css('display', 'none'); 
        $erreurlogin.css('diplay', 'none');
    });

    /* verifie si les champs sont bien remplis, si ils ne le sont pas afficher message erreur */
    function verifier(champ){
        if(champ.val() == ""){ 
            isNotValide(champ);
            }
        }

});







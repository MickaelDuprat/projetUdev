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

// // login validation
//         $login.keyup(function(){
//             $login.filter(function(){
//             if($(this).val().length < 5) {
//                 isNotValide($(this));
//                  $erreurlogin.css('display', 'block');
//             } else {
//                 isValide($(this));         
//                 $erreurlogin.css('display', 'none');
//             }    
//         });
//         });

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
  /*  $civ.on('change', function(){
    if($('#civ').attr("selected",false)){
            isNotValide($(this)); 
          } else {
            $('#civ').attr("selected",true);
            isValide($(this));
            } 
});
*/ 
    /* verification code postal regex */
    $villecp.on('change', function(){
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
    });
    /* verifier téléphone regex */
    $tel.on('change', function(){
        $tel.filter(function(){
            var regex = /^(0|\+330|0033|\+33[-. ]?0|\+33|\(\+33\)[-. ]?0)[1-9](([-][0-9]{2}){4}|([0-9]{2}){4}|([.][0-9]{2}){4}|([ ][0-9]{2}){4})$/;
           if (!regex.test($.trim($(this).val()))){ 
            //if( !regex.test( $(this).val() ) ) {
                isNotValide($(this));
                $erreurtel.css('display', 'block');
            } else {
                isValide($(this));          
                $erreurtel.css('display', 'none');
            }    
        });
    }); 

    /* verification email regex */
    $mail.on('change', function(){
        $mail.filter(function(){
            var regex = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
            //if( !regex.test( $(this).val() ) )
            if(!regex.test($.trim($(this).val()))) {
                isNotValide($(this));
                $erreurmail.css('display', 'block'); 
                } else {
                    isValide($(this));
                $erreurmail.css('display', 'none');
            } 
        });
    });            
    /* fonction verification si mdp identique */
    $confirmation.on('change', function(){
    $confirmation.keyup(function(){
        //var regex = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
        if ($confirmation.val() != $mdp.val()){ 
            isNotValide($(this));
            $erreurpwd.css('display', 'block');
        } else {
            isValide($(this));
            }
            $erreurpwd.css('display', 'none');
        });
    });

    $confirmation.on('change', function(){
    $mdp.keyup(function(){
       // var regex = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
        if($(this).val() != $confirmation.val()){
            $erreurpwd.css('display', 'block');
        } else {
            isValide($(this));
            $erreurpwd.css('display', 'none');
        }
    });
});   

     /* afficher  le  label&input codepromo 
    $promo.click(function() {
   $('input[name=choixPromo]:checked').val() || ''
        if($('input[name=choixPromo]:checked').val() == "oui"){
            $('#codeCoupon').removeAttr("disabled");
            $coupon.css({
                display : 'block'
            });
        } else {
            $('#codeCoupon').attr('disabled', 'disable');
            $coupon.css({
            display : 'none'
            });
        }
    });
    */

    /* afficher le formulaire client pro si le bouton radio pro est coché */
       $typeClient.click(function() {
        $typeCLient.on('change', function() {
        $('input[name=clientPro]:checked').val() || ''
        if( $('input[name=clientPro]:checked').val() == "pro"){
            $('raisonSociale').removeAttr("disabled");
            $('#nomCSociete').removeAttr("disabled");
            $('#siret').removeAttr("disabled");
            $proform.css({
                display : 'block'
            });
        } else {
            $('raisonSociale').attr('disabled', 'disabled');
            $('#nomCSociete').attr('disabled', 'disabled');
            $('#siret').attr('disabled', 'disabled');
            $proform.css({
                display : 'none'
            });
        }
    });
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
        
 $envoi.click(function(e){
        
        verifier($nom);
        verifier($prenom);
        verifier($ddn);
        verifier($adresse);
        verifier($ville);
        verifier($villecp);
        verifier($addfact);
        verifier($tel);
        verifier($mail);
       
    });

});
 








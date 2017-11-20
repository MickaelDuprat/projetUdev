<?php

// Classe controller des clients

class ClientController{

  /** 
    * Déclaration des variables
    * private $variables
    *
    **/

  // Constructeur qui initalise un objet manager instance de la classe ClientModel
  public function __construct(){
    $this->manager = new ClientModel();
  }

  /** 
    * Exemple
    * de CRUD (Afficher, Afficher tous, Créer, Modifier, Supprimer)
    *
    **/

    // Fonction de lecture d'un seul client
  public function getOneClient($IdClient){

      $selectedClient = $this->manager->read($IdClient);

      $tabSelectedClient= [
      'IdClient' => $selectedClient->getIdClient(),
      'NomClient' => $selectedClient->getNomClient(),
      'PrenomClient' => $selectedClient->getPrenomClient(),
      'DateNClient' => $selectedClient->getDateNClient(),
      'EmailClient' => $selectedClient->getEmailClient(),
      'TelClient' => $selectedClient->getTelClient(),
      'AdresseFacturation' => $selectedClient->getAdresseFacturation(),
      'Add1Client' => $selectedClient->getAdd1Client(),
      'Add2Client' => $selectedClient->getAdd2Client(),
      'RaisonSSociete' => $selectedClient->getRaisonSSociete(),
      'SiretSociete' => $selectedClient->getSiretSociete(),
      'getNomCSociete' => $selectedClient->getNomCSociete(),
      'getIdClientCiv' => $selectedClient->getIdClientCiv(),
      'getClientVilleCp' => $selectedClient->getClientVilleCp()
      ];

      $json = json_encode($tabSelectedClient);
      return ['client' => $json];

  }

  // Fonction de lecture de plusieurs clients
  public function getAllClient(){

      $listeClient = $this->manager->readAll();

      $tabAllClient = [];

      foreach ($listeClient as $key => $client) {

          $data = [
       'IdClient' => $client->getIdClient(),
      'NomClient' => $client->getNomClient(),
      'PrenomClient' => $client->getPrenomClient(),
      'DateNClient' => $client->getDateNClient(),
      'EmailClient' => $client->getEmailClient(),
      'TelClient' => $client->getTelClient(),
      'AdresseFacturation' => $client->getAdresseFacturation(),
      'Add1Client' => $client->getAdd1Client(),
      'Add2Client' => $client->getAdd2Client(),
      'RaisonSSociete' => $client->getRaisonSSociete(),
      'SiretSociete' => $client->getSiretSociete(),
      'getNomCSociete' => $client->getNomCSociete(),
      'getIdClientCiv' => $client->getIdClientCiv(),
      'getClientVilleCp' => $client->getClientVilleCp()
          ];

      $tabAllClient[] = $data;

      }

    if ($tabAllClient){
        $json = json_encode($tabAllClient);
        return ['client' => $json];
    }

  }

  // Fonction de création d'un client

  public function createClient(){

    $data = [
    	'IdClient' => $_POST["IdClient"],
      'NomClient' => $_POST["NomClient"],
      'PrenomClient'=> $_POST["PrenomClient"],
      'DateNClient' => $_POST["DateNClient"],
      'EmailClient' => $_POST["EmailClient"],
      'TelClient' => $_POST["TelClient"],
      'AdresseFacturation' => $_POST["AdresseFacturation"],
      'Add1Client' => $_POST["Add1Client"],
      'Add2Client' => $_POST["Add2Client"],
      'RaisonSSociete' => $_POST["RaisonSSociete"],
      'SiretSociete' => $_POST["SiretSociete"],
      'NomCSociete' => $_POST["NomCSociete"],
      'IdClientCiv' => => $_POST["IdClientCiv"],
      'ClientVilleCp' => $_POST["ClientVilleCp"]
    ];

    $object = new Client($data);
    $libelle = "client";

    return "Je sais pas encore quoi";

  }

  // Fonction de modification d'un client

  public function updateClient($IdClient){

    $data = [
      'IdAgence' => $IdClient,
      'NomClient' => $_POST["NomClient"],
      'PrenomClient'=> $_POST["PrenomClient"],
      'DateNClient' => $_POST["DateNClient"],
      'EmailClient' => $_POST["EmailClient"],
      'TelClient' => $_POST["TelClient"],
      'AdresseFacturation' => $_POST["AdresseFacturation"],
      'Add1Client' => $_POST["Add1Client"],
      'Add2Client' => $_POST["Add2Client"],
      'RaisonSSociete' => $_POST["RaisonSSociete"],
      'SiretSociete' => $_POST["SiretSociete"],
      'NomCSociete' => $_POST["NomCSociete"],
      'IdClientCiv' => => $_POST["IdClientCiv"],
      'ClientVilleCp' => $_POST["ClientVilleCp"]
    ];


    $object = new Client($data);
    $libelle = "client";

    return "Je sais pas encore quoi";

  }

  // Fonction de suppression d'un client

  public function deleteClient($IdClient){

    $result = $this->manager->delete($IdClient);
    $json = json_encode($result);
    return ['client' => $json];

  }

}
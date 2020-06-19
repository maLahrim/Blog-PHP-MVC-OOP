<?php
class Personnage
{
  private $_force;
  private $_experience;
  private $_degats;
        
  public function frapper(Personnage $persoAFrapper)
  {
    $persoAFrapper->_degats += $this->_force;
  }
        
  public function gagnerExperience()
  {
    // Ceci est un raccourci qui équivaut à écrire « $this->_experience = $this->_experience + 1 »
    // On aurait aussi pu écrire « $this->_experience += 1 »
    $this->_experience++;
  }
        
  // Ceci est la méthode degats() : elle se charge de renvoyer le contenu de l'attribut $_degats.
  public function degats()
  {
    return $this->_degats;
  }
        
  // Ceci est la méthode force() : elle se charge de renvoyer le contenu de l'attribut $_force.
  public function force()
  {
    return $this->_force;
  }
        
  // Ceci est la méthode experience() : elle se charge de renvoyer le contenu de l'attribut $_experience.
  public function experience()
  {
    return $this->_experience;
  }
}
$perso1 = new Personnage; // Un premier personnage
$perso2 = new Personnage; // Un second personnage

$perso1->frapper($perso2); // $perso1 frappe $perso2
$perso1->gagnerExperience(); // $perso1 gagne de l'expérience
/*
$perso2->frapper($perso1); // $perso2 frappe $perso1
$perso2->gagnerExperience(); // $perso2 gagne de l'expérience
*/

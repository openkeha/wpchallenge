# Wordpress Challenge

## Le dossier hcWidget

Le dossier hcWidget Il vous permet de comprendre le fonctionnement d'une sidebar et la programmation d'un Widget, l'inclusion de JS et de CSS.

## Les modèles de page

Le fichier template-test.php vous montre comment créer un mmodèle de page.
 Vous pouvez y ajouter des sidebars, le contenu inséré depuis l'éditeur du back-office et n'importe quel code PHP fonctionnel!

## Le fichier functions.php

 A la fin du fichier, on utilise un simple include_once pour ajouter d'autres fichiers.

## Anatomie d'un widget

 Pour créer un widget, on crée une classe qui étend la classe WP_Widget.

``` PHP
 class nom_de_mon_widget extends WP_Widget
 {
     public function __construct() {
         parent::__construct(
             'id_du_widget',
             'nom du widget'
         )
     }
 }
```

``` PHP
 //Signature du constructeur
 WP_Widget::__construct( string $id_base, string $name, array $widget_options = array(), array $control_options = array() )
 ```

La procédure form génère le formulaire de configuration du widget.

``` PHP
 /**
 * Affiche le formulaire de configuration du widget
 *
 * @param array $instance Les réglages courants du Widget
 * @return string default 'noform'
 */
 public function form(array $instance) {
     //On génère ici le formulaire
 }
 ```

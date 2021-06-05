# Wordpress Challenge

## Le dossier hcWidget

Le dossier hcWidget Il vous permet de comprendre le fonctionnement d'une sidebar et la programmation d'un Widget, l'inclusion de JS et de CSS.

## Les modèles de page

Le fichier template-test.php vous montre comment créer un modèle de page.
 Vous pouvez y ajouter des sidebars, le contenu inséré depuis l'éditeur du back-office et n'importe quel code PHP fonctionnel!

## Le fichier functions.php

 A la fin du fichier, on utilise un simple include_once pour ajouter d'autres fichiers.

## Anatomie d'un widget

Ceci est l'anatomie minimale d'un Widget. Pour plus d'informations, se rendre sur [la documentation officielle de WP](https://developer.wordpress.org/reference/classes/wp_widget/)

### Le constructeur

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

### Le formulaire de configuration du widget

La procédure form génère le formulaire de configuration du widget.

``` PHP
 /**
 * Affiche le formulaire de configuration de l'instance du widget
 *
 * @param array $instance Les réglages courants du Widget
 * @return string default 'noform'
 */
 public function form(array $instance) {
     //On génère ici le formulaire
 }
 ```

### L'enregistrement des données de configuration du widget

``` PHP
    /**
     * L'enregistrement de la configuration de l'instance du widget
     *
     * @param array $new_instance La nouvelle configuration de l'instance du widget
     * @param array|null $old_instance(optional) L'ancienne configuration de l'instance du widget
     * @return array La configuration à sauvegarder ou un bool false pour annuler la sauvegarde
     */
    public function update($new_instance, $old_instance)
    {
        //votre code ici
    }
```

### L'affichage du widget

``` PHP
/**
     * Affichage de l'instance du Widget
     *
     * @param array $args ces arguments incluent 'before_title', 'after_title', 'before_widget', et 'after_widget'
     * @param array $instance La configuration de l'instance du widget
     * @return void
     */
    public function widget($args, $instance)
    {
        echo 'mon widget';
    }
```

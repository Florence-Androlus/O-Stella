# Commandes git

- Effacer un fichier .cache en cas de conflit git :
  
    `rm wp-content/themes/ostella/assets/.cache/f1/2ed92e9cb7798522cd2d8f50f8b8f1.json` (réf du fichier à remplacer)

- Build avec Parcel depuis le dossier 'assets' :

    `parcel build main.js --public-url ./`

- Supprimer le dist sur l'origin (de github donc pour faire simple) :
  
    `git rm -r --cached chemin/du/dossier`

- Régénérer tous les 'thumbnails' de toutes les images dans les medias du site :

    `wp media regenerate --yes`

- Installer reset-css :
  
  `npm install reset-css`

- Installer fontawesome :
  
  `npm install --save@fontawesome/fontawesome-free`

- Accéder au site sur le serveur :
  `http://www.ostella.live/wp/wp-login`
  
    Admin
    `http://52.23.166.214/`
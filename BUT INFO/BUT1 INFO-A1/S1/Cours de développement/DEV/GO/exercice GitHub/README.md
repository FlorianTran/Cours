# Exercices introdev

Collection d'exercices pour le cours d'introduction au développement au département informatique de l'IUT de Nantes.

## Instructions pour récupérer les exercices

Vous pouvez récupérer tout le contenu de ce dépôt avec la commande suivante : git clone https://gitlab.univ-nantes.fr/jezequel-l/exercices-introdev.git

Les semaines suivantes vous pourrez le mettre à jour avec les nouveaux exercices simplement en vous plaçant dans le dossier et en utilisant la commande suivante : git pull

**Attention, si vous modifiez le contenu du dossier, la commande git pull va vous signaler des erreurs, vous verrez à quoi cela correspond un peu plus tard. Ne modifiez donc pas le contenu du dossier.**

## Instructions pour faire les exercices

Le dossier que vous aurez récupéré contient plusieurs dossiers (basiques, recherche, etc) qui eux-même contiennent des sous-dossiers (dans basiques il y a par exemple facteurspremiers, monnaie, etc). Chacun de ces sous-dossiers est un exercice.

Chaque exercice contient trois fichiers :
- go.mod, décrivant un module Go
- xxx_test.go, décrivant un jeu de tests
- xxx.go, l'exercice en lui même

Pour résoudre un exercice vous devez coder la fonction Go qui est décrite dans le fichier de l'exercice et vérifier qu'elle passe bien tous les tests.

**Ne faites pas cela dans le dossier récupéré par git clone, copiez l'exercice ailleurs, sinon ça vous causera des problèmes pour récupérer les nouveaux exercices durant les prochaines semaines.**

Vous pouvez faire les exercices dans l'ordre que vous voulez. Dans chaque dossier vous trouverez des exercices faciles et d'autres plus difficiles, ne restez pas bloqués sur un exercice : passez à un autre et revenez-y plus tard.

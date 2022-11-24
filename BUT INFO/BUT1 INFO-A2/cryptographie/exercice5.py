"""# Exercice 5 

## scénario

Je suis Alice
- je choisis un nombre premier p
- je cherche un générateur g de (Z/pZ)*
- je choisis un exposant a dans [2, p-2] qui sera ma clé privée
- je calcule A qui est égal à g^a
- je publie ma clé publique qui se compose de (p, g, A)

Je suis Bob
- j'ai à ma disposition p, g et A qui sont publics
- je choisis un exposant b dans [2, p-2] qui sera ma clé privée
- je calcule B qui est égal à g^b
- je publie ma clé publique qui se compose de (p, g, B)
- je souhaite chiffrer un message m à Alice
- je vais utiliser le calcul A^b qui dans les faits est égal à (g^b)^a 
    ou encore g^(b*a) ou encore (g^a)^b qu'Alice peut calculer aussi de son côté
- je chiffre le message avec la fonction m*A^b mod(p) ce qui me donne c,
    et j'envoie à Alice le coupe (c, B)

Je suis Alice

- je calcule l'[inverse modulaire](https://fr.wikipedia.org/wiki/Inverse_modulaire) de B^a (i.e. (g^b)^a) 
    qui correspond au coeff de Bezout u calculé à partir de l'algorithme d'Euclide étendue 
- je déchiffre le message chiffré c à l'aide de la fonction c*u mod(p)
"""


""" 
## Mise en oeuvre

Je suis Alice
- pour un semblant de réalité (mais pas trop), je choisis p dans [1000, 2000]. Pour ce faire, 
    je peux réutiliser mes méthodes précédemment développées. Par exemple je peux précalculer 
    les nombres premiers de 1 à 2000. Puis tirer au hazard un nombre de cette liste tant que 
    j'en obtiens pas un de plus de 1000... Probablement que les 25 premiers nombres de cette liste 
    peuvent être sautés.
TODO
""" 

""" 
Je suis Alice
- pour trouver g je peux calculer (Z/pZ)* puis pour chaque valeur de g compris entre 1 et p-1 tester 
    si g est générateur en construisant l'ensemble générée par g et en le comparant à (Z/pZ)*. 
    Je stoppe quand ils sont identiques.
TODO
""" 

""" 
Je suis Alice
- je choisis aléatoirement a dans [2, p-2]
TODO
""" 


""" 
Je suis Bob
- je prépare mon message pour pouvoir le chiffrer i.e. que je le transforme en valeur numérique 
et je le découpe en paquets suivant le modulo p ; je chiffrerai chaque paquet
TODO cf. code dans le sujet
"""
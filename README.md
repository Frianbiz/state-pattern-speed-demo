# State pattern
Coding dojo du 20/10 @frianbiz - Head First Design Patterns Book (Chapitre 10)

# L'unité centrale d'un distributeur de bonbons
### (Demande initiale du client)
Le ditributeur peut être dans 4 états :
 - sans pièce
 - avec une pièce
 - transaction validée (le client a tourné la poignée)
 - rupture de stock
 
Les actions :
- insérer une pièce (public)
- tourner la poignée (public)
- éjecter une pièce (le client annule la transaction) (public)
- délivrer le bonbon (interne)

### Run exemple
```php
echo "v1 (sans pattern) :<br/>";
$distributeur = new Distributeur(5);
$distributeur->insererPiece();
$distributeur->tournerPoignee();
```
Code: https://github.com/Frianbiz/state-pattern-speed-demo/blob/master/sans-pattern/Distributeur.php

### output
 - v1 (sans pattern) :
 - Vous avez inséré une pièce
 - Vous avez tourné...
 - Un bonbon va sortir
 
# La demande de changement
> Ok ça marche mais demande d'évolution du client: Le jeu concours! 10 % du temps, quand on tourne la poignée du distributeur, il reçoit deux bonbons au lieu d’un.
> Team: Avec la conception actuelle, c'est compliqué...

## Nouvelle conception (implémentation du pattern State)
### Run exemple
```php
echo "<br/>v2 (avec pattern):<br/>";
$distributeur = new DistributeurV2(5);
$distributeur->insererPiece();
$distributeur->tournerPoignee();
```
Code: https://github.com/Frianbiz/state-pattern-speed-demo/blob/master/avec-pattern/DistributeurV2.php

### output
 - v2 (avec pattern):
 - Vous avez inséré une pièce
 - Vous avez tourné...
 - un bonon va sortir

Challenge: Implémenter l'état: etatGagnant! (Simple avec cette nouvelle conception)
 





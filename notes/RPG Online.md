---
tags:
  - Projets
  - BaseDeDonnées
  - PHP
  - JavaScript
  - HTML
  - CSS
  - SQL
  - JeuxVidéo
aliases: 
Références:
  - "[[Plan de création GPT RPG Online]]"
  - "[[Requêtes SQL en PHP avec PDO]]"
  - "[[PDO]]"
  - "[[Injection SQL]]"
Date Creation: 27-01-2025 14:17
---
# Bases du jeu



~={red}**Ecran d'accueil**=~ avec bouton rejoindre et créer

**Créer** ou **rejoindre** une chambre avec un ID 

Si Créer :
	**attendre** le Second joueur

Si Rejoindre :
	activer le bouton : *lancer la partie*
	

Lancement de la partie :
- Ecran **Indiquant** le lancement de la **partie** 
- **Interface** de **sélection** de Rôles et d'objets
- **Attendre** que les 2 joueurs **valident** leurs compositions

- Ecran **Indiquant** le lancement de l'**affrontement**
- **Déterminer** quel joueur commence

- Tant que les **2 équipes** ont encore des personnages en vie :
	- Le premier joueur réalise les actions souhaitées 
		(Utiliser une compétence par personnage, utiliser un objet)
	- Le deuxième joueur réalise les actions souhaitées 
		(Utiliser une compétence par personnage, utiliser un objet)

- Quand une équipe n'a **plus** de **personnage** en vie :
	**Afficher** les écrans de victoire et défaite pour chaque joueurs

Retourner à l'~={red}**Ecran d'accueil**=~




contexte : 
le projet est de créer un jeux vidéo type jeu navigateur/flash, dans lequel on pourra soit rejoindre soit créer une chambre de maximum 2 joueurs pour qu'ils se battent en 1c1.
Le principe du jeu consiste en la sélection de 4 classes/personnages et de 5 objets consommables qui ont chacun des compétences et attributs différents. 
Puis le déroulement du combat se fera en tour par tour, les 2 joueurs pourront utiliser à chaque tour une des compétences de leurs personnages et un objet.
Enfin, le perdant est celui qui n'a plus de personnages en vie.

IDEE : personnage = nbr définit de place(s)

c quoi les stats des persos ?????

barre de vie
barre de mana
jauge 'joker' (commun a tt l'équipe, un par perso, )

stats :

**personnages**
vie
mana
défense physique
défense magique
blocage 
esquive 
chance de coup critique
buff

**compétences**
attaque physique 
attaque magique 
multiplicateur de coup critique
taux de réussite

combien de compétence pour un personnage ????
 4

### Types :

Feu 
Glace 
Vent 
Electrique

### Knight (Chevalier) :

vie : 10x
énergie : 10x

défense physique : 40%
défense magique : 10%
esquive : 5%
chance de coup critique : 5%


comp1 :  changer la prise des mains (prendre l'épée à une ou 2 mains)
	``dans l'autre main il y a une arbalète par exemple``

comp2 : coup d'épée


### Trap Master (Trappeur) :

vie : 7x
énergie : 10x

défense physique : 15%
défense magique : 15%
esquive : 15%
chance de coup critique : 10%

comp1 : envoie des pièges au bout de x tour, s'active et inflige des dégâts physique + dégâts magique de type random

comp2 : Tir d'arbalète infligeant des dégâts physique 


### Buffer (Soutien)

vie : 7x
magie : 13x

défense physique : 5%
défense magique : 25%
esquive : 15%
chance de coup critique : 15% (critique sur l'ensemble du sort)

comp1 : Shield qui augmente la défense physique et magique de 10% pendant 2 tours (avec un bonus de "vie" de 2x ) 

comp2 : Buff d'attaque physique + magique pendant 2 tours


### Magicien (Mage)

vie : 8x
magie : 13x

défense physique : 5%
défense magique : 30%
esquive : 15%
chance de coup critique : 15% (critique sur l'ensemble du sort)

comp1 : boule de feuuuuuuu de zoooooooooooooone

comp2: congélation martienne, cible singulière ez



### OBJETS :

- OREILLER C4 (ouverture explosive)
- 
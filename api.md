Tarte Tatin API
===============

Le point d'accès à l'API est [tarte-tatin.fr/api/](tarte-tatin.fr/api/)
Les données sont toujours retournées au format JSON.

# Fonctionnalités

## Récupérer les informations sur le point d'intérêt le mieux noté

Exemple :

	GET /place/

## Récupérer tous les points d'intérêts

Il existe une limite dure, définie par le serveur, sur le nombre de résultats retournés. On retourne alors la liste triée par distance euclidienne à la position de l'utilisateur.

Paramètres :

- `from` : lieu de départ (position actuelle de l'utilisateur), sous forme de chaîne `[-10.2,0.0048]`

Exemple :

	GET /place/all

## Récupérer les informations sur un point d'intérêt aléatoire

Exemple :

	GET /place/random

## Récupérer les informations sur un point d'intérêt à partir de son identifiant

Exemple :

	GET /place/<id>

## Récupérer une liste de points d'intérêts selon des critères

Critères disponibles :

- `from` : lieu de départ (position actuelle de l'utilisateur), sous forme de chaîne `[-10.2,0.0048]`
- `time` : temps libre disponible. Cela limitera les lieux retournés à la fois sur leur distance à `from` (temps de déplacement), mais également sur le temps nécessaire à visiter ce lieu (par exemple, un musée est long à visiter tandis qu'un parc peut s'apprécier quel que soit le temps disponible).
- `distance` : distance maximale du lieu à `from`, en kilomètres. Il peut également être spécifié sour la forme [min, max].
- `limit` : nombre maximal de lieux à recevoir

Seul le paramètre `from` est obligatoire.

Exemples :

	GET /place?from=[<lat>,<long>]&time=<secondes>&distance<kilometres>
	GET /place?from=[<lat>,<long>]&distance[<kilometres>,<kilometres>]

## Récupérer une list de points d'intérêts selon des critères en excluant certains points d'intérêts

Comme précédemment, avec le paramètre supplémentaire :

- `except` : liste des identitifiants des lieux à exclure

Exemple :

	GET /place/?from=[<lat>,<long>]&except=[1,3,5,7]

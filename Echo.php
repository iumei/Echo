<?php
function foo($data) {

    usort($data, function ($item1, $item2){
        return $item1[0] - $item2[0];
    });

    $sorted_arrays = [];

    foreach ($data as $value) {
        // Si le tableau de fusion est vide ou si l'intervalle actuel ne se chevauche pas avec le dernier,
        // on ajoute l'intervalle à la liste
        if (empty($sorted_arrays) || $sorted_arrays[count($sorted_arrays) - 1][1] < $value[0]) {
            $sorted_arrays[] = $value;
        }
        // Sinon, il y a chevauchement, alors on fusionne l'intervalle actuel avec le dernier intervalle de fusion
        else {
            $sorted_arrays[count($sorted_arrays) - 1][1] = max($sorted_arrays[count($sorted_arrays) - 1][1], $value[1]);
        }
    }

    return $sorted_arrays;
}

/* Question 1
Cette fonction trie les tableaux contenus dans data par le premier element du plus petit au plus grand.
Puis parcours chaque tableau et compare l'intervalle du tableau actuel au dernier tableau si l'intervalle actuel ne se 
chevauche pas avec le dernier on l'ajoute a la liste d'intervalles  si non on fusion le sintervalles avec la valeur la plus petite des deux
pour le premier element et la plus grandes des deux du deuxième élément */

print_r(foo([[3, 6], [3, 4], [15, 20], [16, 17], [1, 4], [6, 10], [3, 6]]));

/* Question 2
j'ai mis 2h30 pour comprendre ce que fait cette fonction et 1h a implémenter la fonction
*/

<?php 
$data = [['S','H','D','C'],['A','2','3','4','5','6','7','8','9','X','J','Q','K']];
function combinations($arrays, $i = 0) {
    if (!isset($arrays[$i])) {
        return array();
    }
    if ($i == count($arrays) - 1) {
        return $arrays[$i];
    }

    // get combinations from subsequent arrays
    $tmp = combinations($arrays, $i + 1);

    $result = array();

    // concat each array from tmp with each element from $arrays[$i]
    foreach ($arrays[$i] as $v) {
        foreach ($tmp as $t) {
            $result[] = is_array($t) ? 
                array_merge(array($v), $t) :
                array($v, $t);
        }
    }

    return $result;
}
function makecard($array){
	return implode("-",$array);
}
$decks = array_map(makecard,combinations($data));


shuffle($decks);
echo json_encode($decks);

?>
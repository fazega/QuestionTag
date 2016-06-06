<?php
	function separate($text) {
		$sep = ["", array()];
		$question = "";
		$word = "";
		$current = false;
		for($i = 0; $i < strlen($text); $i++) {
			if($text[$i] == '#') {
				$current = true;
			}
			if($current) {
				if($text[$i] != ' ') {
					$word += $text[$i];
				}
				else {
					$current = false;
					$sep[1][] = ($word);
					$word = "";
				}
			}
			else {
				$question += $text[$i];
			}
		}
		if($word != "")
			$sep[1][] = ($word);
		$sep[0] = $question;
		return $sep;
	}
	
	function commonElements($tab1, $tab2) {
		$e = 0;
		for($i = 0; $i < count($tab1); $i++) {
			for($j = $i; $j < count($tab2); $j++) {
				if($tab1[$i]==$tab2[j]) {
					$e += 1;
				}
			}	
		}
		return $e;
	}

	if(isset($_POST['search'])) {
		$search = $_POST['search'];
		
		if($search == "--matching") {
			
			
		}
		
		else {
			$tab = separate($search);
			$question = $tab[0];
			$domains = $tab[1];
			
			$toreturn = json_decode('{"pseudo":"", "question":""}', true);
			$minmaxcommon = 0;
			
			
			try{
				$bdd = new PDO('mysql:host=localhost;dbname=questiontag;charset=utf8', 'root', '');
			}
			catch (Exception $e){
				die('Erreur : ' . $e->getMessage());
			}
			$req = $bdd->query("SELECT * FROM live_questions");
			while($donnees = $req->fetch()) {
				$tempquestion = $donnees['question'];
				$tempsep = separate($question);
				$e = commonElements($domains, $tempsep[1]);
				if($e >= $minmaxcommon) {
					$toreturn['question'] = $question;
					$minmaxcommon = $e;
				}
			}
			$toreturn['pseudo'] = "fazega";
			echo json_encode($toreturn);
		}
	}
?>
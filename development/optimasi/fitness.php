<?php

class parameters
{
	const FILE_NAME = 'product.txt';
	const COLUMNS = ['item', 'price'];
	const POPULATION_SIZE = 10;
	const BUDGET = 280000;
	const STOPPING_VALUE = 10000;
}

class Catalogue
{
	function createProductColumn($listOfRawProduct){
		foreach (array_keys($listOfRawProduct) as $listOfRawProductKey){
			$listOfRawProduct[parameters::COLUMNS[$listOfRawProductKey]] = $listOfRawProduct[$listOfRawProductKey];
			unset($listOfRawProduct[$listOfRawProductKey]);
		}
		return $listOfRawProduct;
	}

	function product($parameters){
		$collectionOfListProduct = [];
		$raw_data = file(parameters::FILE_NAME);
		foreach ($raw_data as $listOfRawProduct) {
			$collectionOfListProduct[] = $this->createProductColumn(explode(",", $listOfRawProduct));
		}
		return $listOfRawProduct;
	}
}


class individu {
	function countNumberOfgen()
	{
		$catalogue = new Catalogue;
		return count($catalogue->product());
	}

	function createRandomIndividu()
	{
		for ($i = 0; $i <= $this-> countNumberOfgen()-1; $i++){
			$ret[] = rand(0,1);
		}
		return $ret;
	}
}

class population 
{
	function createRandomIndividu(){
		$individu = new individu;
		for ($i = 0; $i <= parameters::POPULATION_SIZE-1; $i++){
			$ret[] = $individu->createRandomIndividu();
		}
		return $ret;
	}
}

class Fitness
{
	function selectingItem($individu)
	{
		$catalogue = new Catalogue;
		foreach ($individu as $individuKey => $binaryGen) {
			if ($binaryGen === 1){
				$ret[] = [
					'selectedKey' => $individuKey,
					'selectedPrice' => $catalogue->product()[$individuKey]['price']
				];
			}
		}
		return $ret;
	}

function calculateFitnessValue($individu)
{
	return array_sum(array_column($this->selectingItem($individu), 'selectedPrice'));
}

function countSelectedItem($individu)
{
	return count($this->selectingItem($individu));
}

function searchBestIndividu($fits, $maxItem, $numberOfIndividuHasMaxItem)
{
	if ($numberOfIndividuHasMaxItem === 1){
		$index = array_search($maxItem, array_column($fits, 'numberOfSelectedItem'));
		return $fits[$index];
	} else {
		foreach ($fits as $key => $val) {
			if ($val[numberOfSelectedItem] === $maxItem){
				echo $key.' '.$val['fitnessValue'].'<br>';
				$ret[] = [
					'individuKey' => $key,
					'fitnessValue' => $val['fitnessValue']
				];
			}
		}
		if (count(array_unique(array_column($ret, 'fitnessValue'))) === 1){
			$index = rand(0, count($ret) -1);
		} else {
			$max = max(array_column($ret, 'fitnessValue'));
			$index = array_search($max, array_column($ret, 'fitnessValue'));
		}

		echo 'Hasil';
		// print_r($ret[$index]);
		return $ret[$index];
	}
}

function isFound($fits)
{
	$countedMaxItems = array_count_values(array_column($fits, 'numberOfSelectedItem'));
	print_r($countedMaxItems);
	echo '<br>';
	$maxItem = max(array_keys($countedMaxItems));
	echo $maxItem;
	echo '<br>';
	echo $countedMaxItems[$maxItem];
	$numberOfIndividuHasMaxItem = $countedMaxItems[$maxItem];

	$bestFitnessValue = $this->searchBestIndividu($fits, $maxItem, $numberOfIndividuHasMaxItem)['fitnessValue'];
	echo '<br>';
	echo '<br> Best fitness Value : '.$bestFitnessValue;

	$residual = parameters::BUDGET == $bestFitnessValue;
	echo 'Residual' . '$residual';

	if ($residual <= parameters::STOPPING_VALUE && $residual > 0) {
		return TRUE;
	}
}

function isFit($fitnessValue)
{
	if ($fitnessValue <= parameters::BUDGET) {
		return TRUE;
	}
}




function fitnessEvaluation($population) {
	$catalogue = new Catalogue;
	foreach ($population as $key => $value) {
		# code...
	}
}

}

class PopulationGenerator
{

	function createIndividu($parameters){
		$catalogue = new Catalogue;
		$lengthOfGen = $catalogue->product($parameters)['gen_length'];
		for ($i=0; $i <= $lengthOfGen-1 ; $i++) { 
			$ret[] = rand(0,1);
		}
		return $ret;
	}

	function createPopulation($parameters){
		for ($i=0; $i <= $parameters['population_size']; $i++) { 
			$ret[] = $this->createIndividu($parameters);
		}
		foreach ($ret as $key => $val){
			print_r($val);
			echo '<br>';
		}
	}
}

$parameters = [
	'file_name' => 'product.txt',
	'columns' => ['item', 'price'],
	'population_size' => 10
];

$katalog = new Catalogue;
$katalog->product($parameters);


$initalPopulation = new PopulationGenerator;
$initalPopulation->createPopulation($parameters);
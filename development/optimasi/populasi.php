<?php

class Catalogue
{
    function createProductColumn($column, $listData){
        foreach(array_keys($listData) as $listDataKey){
            $listData[$column[$listDataKey]] = $listData[$listDataKey];
            unset($listData[$listDataKey]);
        }
        return $listData;
    }

    function products($parameters) {
        $collection = [];
        $data = file($parameters['file_name']);

        // baca perbaris isi dari file
        foreach($data as $listData){
            $collection[] = $this->createProductColumn($parameters['column'], explode(",", $listData));
        }

        // // tampilkan di halaman web
        // foreach($collection as $listData) {
        //     print_r($listData);
        //     echo '<br>';
        // }

        return [
            'product' =>  $collection,
            'gen_length' => count($collection),
        ];
    }
}

class Population
{
    function createIndividu($parameters){
        $catalogue = new Catalogue;
        $lengthOfGen = $catalogue->products($parameters)['gen_length'];
        for($i = 0; $i <= $lengthOfGen-1; $i++){
            $ret[] = rand(0, 1);
        }
        return $ret;
    }

    function createPopulation($parameters){
        for($i = 0; $i <= $parameters['population_size']; $i++){
            $ret[] = $this->createIndividu($parameters);
        }
        foreach($ret as $key => $val){
            print_r($val);
            echo '<br>';
        }
    }
}

$parameters = [
    'file_name' => 'dataset.txt',
    'column' => ['item', 'price'],
    'population_size' => 10
];

$katalog = new Catalogue;
$katalog->products($parameters);

$initialPopulation = new Population;
$initialPopulation->createPopulation($parameters);

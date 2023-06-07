<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $park = isset($_GET['park']) ? $_GET['park'] : '';
    $voto = isset($_GET['voto']) ? $_GET['voto'] : '';


    if($park === 'true'){
        $filterhotels = array_filter($hotels, function ($hotel){
           return $hotel['parking'] === true;

        });
    }else if ($park === 'false'){
        $filterhotels = array_filter($hotels, function ($hotel){
            return $hotel['parking'] === false;
         });
    }else{
        $filterhotels = $hotels;
    };

    
    // if($voto > 3){
    //     $filterhotels = array_filter($hotels, function ($hotel){
    //         return $hotel['vote'] > 3;
    // });
    // }else if($voto < 3){
    //     $filterhotels = array_filter($hotels, function ($hotel){
    //         return $hotel['vote'] < 3;
    // });
    // }else{
    //     $filterhotels = $hotels;
    // }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous" defer></script>
    <title>Document</title>
</head>
<body>

<div class="container py-3">
    <form action="" method="get" class="d-flex">
    <select class="form-select" aria-label="Default select example" id="select" name="park">
        <option selected>Disponibilità parcheggio...</option>
        <option value="true">Con parcheggio</option>
        <option value="false">Senza parcheggio</option>
    </select>
    <select class="form-select" aria-label="Default select example" id="select" name="voto">
        <option selected>Seleziona voto...</option>
        <option value="1">1 Stella</option>
        <option value="2">2 Stelle</option>
        <option value="3">3 Stelle</option>
        <option value="4">4 Stelle</option>
        <option value="5">5 Stelle</option>
    </select>
    <button type="submit">Cerca</button>
    </form>
</div>






<div class="container py-5 my-5">
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome Hotel:</th>
      <th scope="col">Descrizione:</th>
      <th scope="col">Parcheggio:</th>
      <th scope="col">Voto:</th>
      <th scope="col">Distanza dal centro:</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <?php
                foreach($filterhotels as $key => $hotel){ ?>
            <th scope="row"><?php echo $hotel['name'] ?></th>
            <td><?php echo $hotel['description'] ?></td>
            <td><?php if($hotels[$key]['parking'] == true){?>
                            SI <?php 
                            } else { ?>
                            NO <?php  
                            }
                            ?></td>
            <td><?php echo $hotel['vote'] ?></td>
            <td><?php echo $hotel['distance_to_center'] . ' ' . 'Km' ?></td>
    </tr>
        <?php 
        }?>
  </tbody>
</table>
</div> 
</body>
</html>



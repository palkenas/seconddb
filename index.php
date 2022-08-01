 <?php
    include "./Models/Fruit.php";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "second_test";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // if ($conn->connect_error) {
    //     die("Connection failed: " . $conn->connect_error);
    // } else {
    //     echo "Connected successfully";
    // }
    // echo "<br>";
    //====issaugojimas====
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        Fruit::save($conn);
    }


    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM fruits";
    $result = $conn->query($sql);
    // print_r($result);
    // echo "<br>";


    $fruits = [];
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $fruits[] = new Fruit($row["id"], $row["fruit"], $row["color"], $row["taste"], $row["price"], $row["weight"]);
    }
    // print_r($fruits);
    echo "<br>";
    $conn->close();
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="./CSS/reset.css">
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
     <!-- JavaScript Bundle with Popper -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="./CSS/main.css">
     <title>Document</title>
 </head>

 <body>

     <?php
        // foreach ($fruits as $fruit) {
            // echo $fruit->fruit . " " . $fruit->color . " " . $fruit->taste . " " . $fruit->price . " " . $fruit->weight . "<br>";
        // }
        // echo "<br>";
        ?>
     <div id="container" class="container">
         <div id="inputs">
             <form class="form-inline" action="" method="post">
                 <div id="input" class="input">
                     <p>Fruit</p>
                     <input class="form-control" id="input1" type="text" name="fruit" placeholder="Fruit">
                 </div>
                 <div id=inputdiv1 class="input">
                     <p>Color</p>
                     <input class="form-control" id="input2" type="text" name="color" placeholder="Color">
                 </div>
                 <div class="input">
                     <p>Taste</p>
                     <input class="form-control" id="input3" type="text" name="taste" placeholder="Taste">
                 </div>
                 <div class="input">
                     <p>Price</p>
                     <input class="form-control" id="input4" type="text" name="price" placeholder="Price">
                 </div>
                 <div class="input">
                     <p>Weight</p>
                     <input class="form-control" id="input5" type="text" name="weight" placeholder="Weight">
                 </div>
                 <button class="btn btn-success" type="submit">Save</button>
         </div>
         </form>
         <div class="container">
             <table class="table">
                 <thead>
                     <tr>
                         <th scope="col">#</th>
                         <th scope="col">Fruit</th>
                         <th scope="col">Color</th>
                         <th scope="col">Taste</th>
                         <th scope="col">Price</th>
                         <th scope="col">Weight</th>
                     </tr>
                 </thead>
                 <tbody>
                     <?php
                        foreach ($fruits as $fruit) { // php foreach paleidžiame ir uždarome php tagą. žemiau esantis html įvyks tiek kartų kiek kartų ciklas prasisuks
                        ?>
                         <tr>
                             <th scope="row"><?php echo $fruit->id; ?></th>
                             <td><?php echo $fruit->fruit; ?></td>
                             <td><?php echo $fruit->color; ?> </td>
                             <td><?php echo $fruit->taste; ?> </td>
                             <td><?php echo $fruit->price; ?> </td>
                             <td><?php echo $fruit->weight; ?> </td>
                         </tr>
                     <?php } ?>
                 </tbody>
             </table>
         </div>
 </body>

 </html>
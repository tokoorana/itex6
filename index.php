<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regina's document №5</title>
    
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>

    <script>
    const ajax = new XMLHttpRequest();

    function get1(){
        let date = document.getElementById("date").value;
        ajax.open("GET", "rent_by_date.php?date="+date);
        ajax.onreadystatechange = update1;
        ajax.send();
    }
    function update1(){
        if(ajax.readyState === 4){
            if(ajax.status === 200){
                let t = ajax.responseXML.getElementsByTagName('Cost')[0].textContent;
                document.getElementById("res1").innerHTML = t;
            }
        }
    }


    function get2(){
        let vendor = document.getElementById("vendor").value;
        ajax.open("GET", "auto_by_vendors.php?vendor="+vendor);
        ajax.onreadystatechange = update2;
        ajax.send();
    }
    function update2(){
        if(ajax.readyState === 4){
            if(ajax.status === 200){
                document.getElementById("res2").innerHTML=ajax.responseText;
            }
        }
        console.dir(ajax);
    }


    function get3(){

            var ajax = new XMLHttpRequest();
            let table_f3 = document.getElementById("table_f3");
            // Сonsole.log(table_f3);
            table_f3.innerHTML = '';
            ajax.onload = () => {
            
            let response = ajax.responseText;
            if(response==null){
                    return;
            }

    let free_cars = JSON.parse(response);

    let table = document.createElement('table');

    let tr = document.createElement('tr');

    let th = document.createElement('th');
    th.innerText = 'free_cars';
    tr.appendChild(th);
    table.appendChild(tr);

    free_cars.forEach(car=>{

        tr = document.createElement('tr');

        let td = document.createElement('td');
        td.innerText = car.Name;
        tr.appendChild(td);

        table.appendChild(tr);
    });

    table_f3.appendChild(table);
    

}
    ajax.open('GET', 'free_auto_by_dates.php?selected_date=' + 
    document.getElementById("date_f3"));
    ajax.send();
}

    </script>
</head>
<body style = "background-color: rgba(235, 197, 225, 0.788);">


<?php include 'connection.php'; ?>


    <! -- Форма полученный доход с проката по состоянию на выбранную дату -->

    <h1 style = "color: rgb(30, 25, 102);">Получение информации</h1>
    <?php include 'selected/cost.php'; ?>
    <h2><i>1. Полученный доход с проката по состоянию на выбранную дату:</h2></i>
        <input type="date" name="selected_date_rent" id = "date">
        <p><input value="Выбрать" type="button" onclick = "get1()" ></p>

    <table border = "1">
    <thead>
        <tr><th>cost_of_rent_by_date</th></tr>
    </thead>

    <tbody id = "res1">
    </tbody>
    </table>

    <! -- Форма автомобили выбранного производителя -->
        <?php include 'selected/vendors_name.php'; ?>
        <h2><i>2. Автомобили по выбранному производителю:</i></h2>
        <select name="vendor" id="vendor">
            <?php
                foreach ($outputVendors as $vendor) {
                    echo "<option value=\"$vendor\">$vendor</option>";
                }
            ?>
        </select>
        <p><input value="Выбрать" type="button" onclick = "get2()" ></p>


    <table border = "1">
    <thead>
        <tr><th>auto_by_vendors</th></tr>
    </thead>

    <tbody id = "res2">
    </tbody>
    </table>

   
    <h2><i>3. Свободные автомобили на выбранную дату:</h2></i>
        <input type="date" name="selected_date" id = "date_f3">
        <p><input value="Выбрать" type="button" onclick = "get3()" ></p>
  
  <div id = "table_f3"></div>

</body>
</html>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="../teacher/style/webpage.css">

    <script>
        async function getDataFromAPI() {

            let response = await fetch('../json/student/student.php')

            let rawData = await response.text()
            let objectData = JSON.parse(rawData)
            let result = document.getElementById('result')
            console.log(objectData)


            for (let i = 0; i < objectData.student.length; i++) {
                let TR = document.createElement('tr')
                TR.innerHTML = "<td>" + objectData.student[i].studentcode + "</td>" + "<td>" + objectData.student[i].firstname + "</td>" + "<td>" + objectData.student[i].Surname + "</td>" + "<td>" + objectData.student[i].tel + "</td>" + "<td>" + objectData.student[i].province + "</td>" + "<td>" + objectData.student[i].postal + "</td>"
                document.getElementById('tb').appendChild(TR)
            }
        }
        getDataFromAPI()
    </script>
</head>

<body>
    <div class="container">
        <div class="tutorial">
            <h2>Welcome teacher</h2>

            <ul>
                <li><a href="../teacher/webpage.php">Home</a></li>
                <li><a href="../teacher/course.php">Teaching subjects</a> </li>
                <li><a href="../JSON/api.php">Student list</a> </li>
                <li><a href="../teacher/webpage.php?logout='1'">Log-out</a></li>
            </ul>
            <div class="slider" style="padding-left: 0px;padding-right:0px">
                <h3>Student List</h3><br>

                <table id="tb">
                    <tr>
                        <th><b>ID</b></th>
                        <th><b>Name</b></th>
                        <th><b>Surname</b></th>
                        <th><b>Phone numer</b></th>
                        <th><b>Province</b></th>
                        <th><b>Postcode</b></th>
                    </tr>
                </table>
                <center>
                    <a href="../teacher/webpage.php"><button style="padding:10px 20px;margin-top:15px">BACK</button>  
            </div>

        </div>
</body>

</html>
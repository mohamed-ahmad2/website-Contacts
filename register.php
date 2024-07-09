<?php
require_once "php/connect.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="icon/index/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="icon/index/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/index/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/index/favicon-16x16.png">
    <link rel="manifest" href="icon/index/site.webmanifest">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">

    <title>contacts</title>
    <style>

    </style>
</head>

<body>
    <div class="contair regCon">
        <form action="php/reg.php" method="post">
            <div class="register">
                <h1>User Register</h1>
                <input type="text" name="username" placeholder="enter the username">
                <span class="error"></span>

                <input type="email" name="email" placeholder="enter the email">
                <span class="error"></span>

                <input type="password" name="pass" placeholder="enter the password">
                <span class="error"></span>
                <span class="notFind">
                    <?php if (isset($_SESSION['Error'])) {
                        echo $_SESSION['Error'];
                        unset($_SESSION['Error']);
                    } else {
                        echo "";
                    }; ?>
                </span>

                <div class="birthday" id="birth">
                    <label for="birth">Birthday:</label>
                    <br>
                    <select name="month" id="month" title="Month">
                        <option value="0" selected disabled>Month</option>
                        <option value="01">Jan</option>
                        <option value="02">Feb</option>
                        <option value="03">Mar</option>
                        <option value="04">Apr</option>
                        <option value="05">May</option>
                        <option value="06">Jun</option>
                        <option value="07">Jul</option>
                        <option value="08">Aug</option>
                        <option value="09">Sep</option>
                        <option value="10">Oct</option>
                        <option value="11">Nov</option>
                        <option value="12">Dec</option>
                    </select>
                    <select name="day" id="day" title="Day">
                        <option value="0" selected disabled>Day</option>
                        <option value="01">1</option>
                        <option value="02">2</option>
                        <option value="03">3</option>
                        <option value="04">4</option>
                        <option value="05">5</option>
                        <option value="06">6</option>
                        <option value="07">7</option>
                        <option value="08">8</option>
                        <option value="09">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
                    <select name="year" id="year" title="Year">
                        <option value="0" selected disabled>Year</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                        <option value="2020">2020</option>
                        <option value="2019">2019</option>
                        <option value="2018">2018</option>
                        <option value="2017">2017</option>
                        <option value="2016">2016</option>
                        <option value="2015">2015</option>
                        <option value="2014">2014</option>
                        <option value="2013">2013</option>
                        <option value="2012">2012</option>
                        <option value="2011">2011</option>
                        <option value="2010">2010</option>
                        <option value="2009">2009</option>
                        <option value="2008">2008</option>
                        <option value="2007">2007</option>
                        <option value="2006">2006</option>
                        <option value="2005">2005</option>
                        <option value="2004">2004</option>
                        <option value="2003">2003</option>
                        <option value="2002">2002</option>
                        <option value="2001">2001</option>
                        <option value="2000">2000</option>
                        <option value="1999">1999</option>
                        <option value="1998">1998</option>
                        <option value="1997">1997</option>
                        <option value="1996">1996</option>
                        <option value="1995">1995</option>
                        <option value="1994">1994</option>
                        <option value="1993">1993</option>
                        <option value="1992">1992</option>
                        <option value="1991">1991</option>
                        <option value="1990">1990</option>
                        <option value="1989">1989</option>
                        <option value="1988">1988</option>
                        <option value="1987">1987</option>
                        <option value="1986">1986</option>
                        <option value="1985">1985</option>
                        <option value="1984">1984</option>
                        <option value="1983">1983</option>
                        <option value="1982">1982</option>
                        <option value="1981">1981</option>
                        <option value="1980">1980</option>
                    </select>
                </div>
                <span class="error"></span>

                <select name="gender" id="gender" class="gender" title="choose your gender">
                    <option value="not" selected disabled>choose gender</option>
                    <option value="m">Man</option>
                    <option value="f">Female</option>
                </select>
                <span class="error"></span>

                <button type="submit" name="btn">Register</button>
                <p>or</p>
                <a href="index.php" rel="noopener noreferrer">Login</a>
            </div>
        </form>
    </div>
    <script src="js/reg.js"></script>
</body>

</html>
<?php
$conn = null;

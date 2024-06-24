<?php 
   session_start();
   include('../../../databaseinfo/security/secure.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Experiment: Aim, Theory, and Procedure</title>
    <style>
        body, h1, h2, p {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #971426; 
            width: 100%;
            padding: 20px;
            color: #ffffff;
        }


        header a{
            text-decoration: none;
            font-weight: bold;
            color: #ffffff;
        }

        main {
            width: 80%;
            margin: 5px auto;
            margin-bottom: 15px;
        }

        section {
            margin-top: 30px;
        }

        h2 {
            border-bottom: 1px solid #333;
            padding-bottom: 5px;
        }

        p {
            margin-top: 10px;
        }

        table{
        width: 80%;
        border-collapse: collapse;
        display: flex-start;
        border: 1px solid black;
    
    }
    
    th, td{
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
    }
    
    #con{
        padding: 8px;
        text-align: center;
        border: 1px solid #ffffff;
    }
    
    th {
        background-color: #333;
        color: #fff;
        align-items: center;
    }

    tr:nth-child(even){
        background-color: #f2f2f2;
    }

    .a{
        margin-bottom: 5px;
    }

    </style>
</head>
<body>
    <header>
        <a href="../../main/VLab.php" class="back-button">Back</a>
        <h1>Prerequisites for DLCOA Lab</h1> 
        <a style="-ms-user-select: none;user-select: none;color: #971426;" class="white" >Back</a>
    </header>

    <main>
        <section id="aim">
            <h2>Aim</h2>
            <p>The aim of this experiment is to revise basic concepts required before handling DLCOA Experiments like Booth's Algorithm, Restoring Division Algorithm and Non-Restoring Division Algorithm</p>
        </section>

        <section id="theory">
            <h2>Theory</h2>
            <p><b>Decimal to Binary Conversion:</b> To convert a decimal number to binary, you divide the decimal number by 2 and record the remainder. Continue dividing the quotient by 2 until you get a quotient of zero. The binary equivalent is the sequence of remainders read in reverse order.</p>
            <p><b>Binary to Decimal Conversion:</b> To convert a binary number to decimal, you multiply each binary digit by 2 raised to the power of its position from right to left, starting with 0. Then, sum all the results to get the decimal equivalent.</p>
            <p><b>Right Arithmetic Shift:</b> It is a shifting operation that moves the bits of a binary number to the right, and the vacant position on the left is filled with the sign bit (the leftmost bit). In an arithmetic right shift, the sign bit is duplicated to preserve the sign of the number.</p>
            <p><b>Left Arithmetic Shift:</b> It is a shifting operation that shifts the bits of a binary number to the left. In a left arithmetic shift, the vacant position on the right is left blank (can be assigned either 0 or 1 afterwards), and the leftmost bit (most significant bit) is shifted out.</p>
        </section>
        <section id="example">
            <h2>Examples</h2>
            <p><b>Decimal to Binary Conversion Example:</b> Convert the decimal number 13 to binary.</p>
            <p>Step 1: 13 ÷ 2 = 6 remainder 1</p>
            <p>Step 2: 6 ÷ 2 = 3 remainder 0</p>
            <p>Step 3: 3 ÷ 2 = 1 remainder 1</p>
            <p>Step 4: 1 ÷ 2 = 0 remainder 1</p>
            <p>The binary equivalent of 13 is 1101.</p>
            <br>
            <p><b>Binary to Decimal Conversion Example:</b> Convert the binary number 1101 to decimal.</p>
            <p>1 * 2^3 + 1 * 2^2 + 0 * 2^1 + 1 * 2^0 = 8 + 4 + 0 + 1 = 13</p>
            <p>The decimal equivalent of 1101 is 13.</p>
            <br>
            <p class="a"><b>Right Arithmetic Shift Example:</b></p>
            <table id="algoTable">
            <thead>
                <tr>
                    <th>A</th>
                    <th>B</th>
                    <th style="border-right: 1px solid black">Action</th>
                </tr>
            </thead>
            <tbody id="confirm">
            <tr>
                <td>0101</td>
                <td>0011</td>
                <td>Before Right Arithmetic Shift on A and B</td>
            </tr>
            <tr>
                <td>0010</td>
                <td>1001</td>
                <td>After Right Arithmetic Shift on A and B</td></tr>
            </tbody></table><br>
            <p class="a"><b>Left Arithmetic Shift Example:</b></p>
            <table id="algoTable">
            <thead>
                <tr>
                    <th>A</th>
                    <th>B</th>
                    <th style="border-right: 1px solid black">Action</th>
                </tr>
            </thead>
            <tbody id="confirm">
            <tr>
                <td>0101</td>
                <td>0011</td>
                <td>Before Left Arithmetic Shift on A and B</td>
            </tr>
            <tr>
                <td>1010</td>
                <td>011_</td>
                <td>After Left Arithmetic Shift on A and B</td></tr>
            </tbody></table>
        </section><br>
    </main>
</body>
</html>
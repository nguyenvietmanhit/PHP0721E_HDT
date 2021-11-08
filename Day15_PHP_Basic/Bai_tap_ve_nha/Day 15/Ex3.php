<?php
$variable1 = '123abc';
$variable2 = null;
$variable3 = '';
$variable4 = 'abc123';
$variable5 = 'null';
?>
<table>
    <tr>
        <td>Khai báo biến</td>
        <td>Ép sang int</td>
        <td>Ép sang Float</td>
        <td>Ép sang String</td>
        <td>Ép sang Boolean</td>
    </tr>
    <tr>
        <td>$variable1 = '123abc';</td>
        <td>123</td>
        <td>123</td>
        <td>123abc</td>
        <td>true</td>
    </tr>
    <tr>
        <td>$variable2 = null;</td>
        <td>0</td>
        <td>0/td>
        <td>""</td>
        <td>false</td>
    </tr>
    <tr>
        <td>$variable1 = '';</td>
        <td>0</td>
        <td>0</td>
        <td>0</td>
        <td>false</td>
    </tr>
    <tr>
        <td>$variable1 = 'abc123';</td>
        <td>0</td>
        <td>0</td>
        <td>abc123</td>
        <td>true</td>
    </tr>
    <tr>
        <td>$variable1 = 'null';</td>
        <td>0</td>
        <td>0</td>
        <td>'null'</td>
        <td>true</td>
    </tr>
</table>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
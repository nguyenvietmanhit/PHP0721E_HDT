<table>
    <tr>
        <td>STT</td>
        <td>Khai báo</td>
    </tr>
    <tr>
        <td>1</td>
        <td>
            <?php $variable1 = 1.23; ?>
            <p>$variable1 = <?php echo $variable1 ?>;</p>
        </td>
    </tr>
    <tr>
        <td>2</td>
        <td>
            <?php $variable2 = 28; ?>
            <p>$variable2 = <?php echo $variable2 ?>;</p>
        </td>
    </tr>
    <tr>
        <td>3</td>
        <td>
            <?php $variable3 = null; ?>
            <p>$variable3 = null;</p>
        </td>
    </tr>
    <tr>
        <td>4</td>
        <td>
            <?php $variable4 = [123,false,null,1.23,FALSE,[],TRUE]; ?>
            <p>$variable4 = [123,false,null,1.23,FALSE,[],TRUE];</p>
        </td>
    </tr>
    <tr>
        <td>5</td>
        <td>
            <?php $variable5 = -1.23; ?>
            <p>$variable5 = <?php echo $variable5 ?>;</p>
        </td>
    </tr>
    <tr>
        <td>6</td>
        <td>
            <?php $variable6 = false; ?>
            <p>$variable6 = false;</p>
        </td>
    </tr>
    <tr>
        <td>7</td>
        <td>
            <?php $variable7 = 'php'; ?>
            <p>$variable7 = <?php echo $variable7 ?>;</p>
        </td>
    </tr>
</table>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
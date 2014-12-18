<table>
    <tr>
        <?php
        foreach ($headers as $header):
            echo '<td style="font-weight: bold; text-align: center;width:150px">' . $header . '</td>';
        endforeach;
        ?>
    </tr>

    <?php
    if (!empty($data)) {
        foreach ($data as $value) {
            echo '<tr>';
            if (!empty($value)) {
                foreach ($value as $cvalue) {
                    echo '<td style="width:150px">' . $cvalue . '</td>';
                }
                echo '</tr>';
            }
        }
    }
    ?>
</table>



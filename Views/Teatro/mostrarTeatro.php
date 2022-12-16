<h2> Listado de asientos:</h2>
<table>
    <thead>
        <tr>
            <th>Codigo</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach($butacas as $butaca):?>
            <tr>
                <td><?=$butaca->getCodigo()?></td>
                <td><?=$butaca->getEstado()?></td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
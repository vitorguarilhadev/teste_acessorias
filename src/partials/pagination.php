<?php
function renderPagination($paginaAtual, $totalPaginas) {
    $paginas = [];

    if ($paginaAtual == 1) {
        $inicio = 1;
        $fim = min(5, $totalPaginas);
    } elseif ($paginaAtual == $totalPaginas) {
        $inicio = max(1, $totalPaginas - 4);
        $fim = $totalPaginas;
    } else {
        $inicio = max(1, $paginaAtual - 2);
        $fim = min($totalPaginas, $paginaAtual + 2);

        if ($paginaAtual <= 4) {
            $inicio = 1;
            $fim = min(6, $totalPaginas);
        }

        if ($paginaAtual >= $totalPaginas - 3) {
            $inicio = max(1, $totalPaginas - 5);
            $fim = $totalPaginas;
        }
    }

    for ($i = $inicio; $i <= $fim; $i++) {
        $paginas[] = $i;
    }

    if ($inicio > 2) {
        array_unshift($paginas, '...');
        array_unshift($paginas, 1);
    }

    if ($fim < $totalPaginas - 1) {
        array_push($paginas, '...');
        array_push($paginas, $totalPaginas);
    }

    echo '<nav aria-label="Page navigation example"><ul class="pagination">';

    foreach ($paginas as $pagina) {
        if ($pagina == '...') {
            echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
        } elseif ($pagina == $paginaAtual) {
            echo '<li class="page-item active"><span class="page-link">' . $pagina . '</span></li>';
        } else {
            echo '<li class="page-item"><a class="page-link" href="?page=' . $pagina . '">' . $pagina . '</a></li>';
        }
    }

    echo '</ul></nav>';
}
?>

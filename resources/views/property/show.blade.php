@extends('property.master')

@section('content')
<div class="container my-3">

    <h1>Página Single</h1>

        <?php

            if (!empty($property)) {
                foreach ($property as $prop) {
                    ?>
                        <h2>Título do Imóvel: <?= $prop->title; ?></h2>
                        <h2>Descrição: <?= $prop->description; ?></h2>
                        <h2>Valor de Locação: R$ <?= number_format($prop->rental_price, 2, ',', '.') ?></h2>
                        <h2>Valor de Venda: R$ <?= number_format($prop->sale_price, 2, ',', '.') ?></h2>
                    <?php
                }
            }
        ?>
</div>
@endsection
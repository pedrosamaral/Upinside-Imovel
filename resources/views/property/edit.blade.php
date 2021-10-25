@extends('property.master')

@section('content')

<div class="container my-3">

    <h1>Formulário de Edição :: Imoveis</h1>

    <?php
        $property = $property[0];
    ?>

    <form action="<?= url('imoveis/update', ['id' => $property->id]); ?>" method="post">

        <?= csrf_field(); ?>
        <?= method_field('PUT'); ?>
        <div class="form-group">
            <label for="title">Título do imóvel</label>
            <input type="text" name="title" id="title" value="<?= $property->title ;?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Descrição do imóvel</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?= $property->description ;?></textarea>
        </div>
        <div class="form-group">
            <label for="rental_price">Valor de Locação</label>
            <input type="text" name="rental_price" id="rental_price" value="<?= $property->rental_price ;?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="sale_price">Valor de Compra</label>
            <input type="text" name="sale_price" id="sale_price" value="<?= $property->sale_price ;?>" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Atualizar Imóvel</button>

    </form>
</div>

@endsection
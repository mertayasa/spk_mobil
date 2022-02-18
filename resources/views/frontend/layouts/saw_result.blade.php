<div class="row">
    @foreach ($item as $ite)
    <div class="col-12 col-md-4">
        @include('frontend.layouts.card_car', ['item' => $ite, 'index' => $ite->id])
    </div>
    @endforeach
</div>
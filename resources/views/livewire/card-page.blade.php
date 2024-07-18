<div class="mt-2">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1><b>{{ $card['name'] }}</b></h1>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-4">
            <img src="{{ $card['image_full'] }}" class="img-fluid" alt="{{ $card['name'] }}">
        </div>
        <div class="col-md-8">
            <div class="card rounded-0 bg-body-secondary">
                <div class="card-body">
                    @if (!empty($leadingText))
                        <p class="card-text">{!! nl2br($leadingText) !!}</p>
                    @endif

                    @if ($cardEffectFound && $isPendulum)
                        <p class="card-text text-danger">[Pendulum Effect]</p>
                        <p class="card-text">{!! nl2br($improvedPendulumEffects) !!}</p>
                        <p class="card-text text-info">[Monster Effect]</p>
                        <p class="card-text">{!! nl2br($improvedMainEffects) !!}</p>
                    @elseif ($cardEffectFound || $isPendulum)
                        <p class="card-text">{!! nl2br($improvedMainEffects) !!}</p>
                    @else
                        <p class="card-text">{!! nl2br(e($card['desc'])) !!}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

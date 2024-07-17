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
                    <div class="row">
                        <div class="col">
                            Level/Rank: {{ $card['level'] }}
                        </div>
                    </div>
                    <p class="card-text">{{ $card['desc'] }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

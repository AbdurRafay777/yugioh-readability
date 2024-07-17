<div class="mt-3">
    <div class="row">
        <div class="col-md-12">
            <form wire:submit="searchCards" class="d-flex">
                <input wire:model="search" class="form-control me-2 w-100 rounded-0" type="search"
                    placeholder="Search Yu-Gi-Oh! Cards" aria-label="Search">
                <button class="btn btn-success rounded-0" type="submit">Search</button>
            </form>
        </div>
        <div class="col-md-12 mt-2">
            <div class="list-group rounded-0">
                @foreach ($results as $card)
                    <a href="{{ route('card-page', $card['id']) }}"
                        class="list-group-item list-group-item-action">{{ $card['name'] }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>

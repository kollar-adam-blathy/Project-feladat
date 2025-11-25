@extends('layout')

@section('title', 'Autók')

@section('content')
<div style="margin-bottom: 3rem;">
    <h1 style="margin-bottom: 1.5rem; color: var(--primary-blue);">Elérhető autóink</h1>
    
    <div class="card" style="margin-bottom: 2rem;">
        <div class="form-group" style="margin-bottom: 1.5rem;">
            <label>Keresés</label>
            <input type="text" id="search-input" placeholder="Keress márkára, modellre...">
        </div>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1rem;">
            <div class="form-group" style="margin-bottom: 0;">
                <label>Márka</label>
                <select id="filter-brand">
                    <option value="">Összes</option>
                    @php
                        $brands = $cars->pluck('brand')->unique()->sort();
                    @endphp
                    @foreach($brands as $brand)
                        <option value="{{ $brand }}">{{ $brand }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label>Típus</label>
                <select id="filter-category">
                    <option value="">Összes</option>
                    <option value="Személyautó">Személyautó</option>
                    <option value="SUV">SUV</option>
                    <option value="Luxus">Luxus</option>
                    <option value="Elektromos">Elektromos</option>
                    <option value="Kombi">Kombi</option>
                    <option value="Sedan">Sedan</option>
                </select>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label>Váltó</label>
                <select id="filter-transmission">
                    <option value="">Összes</option>
                    <option value="Manuális">Manuális</option>
                    <option value="Automata">Automata</option>
                </select>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label>Üzemanyag</label>
                <select id="filter-fuel">
                    <option value="">Összes</option>
                    <option value="Benzin">Benzin</option>
                    <option value="Dízel">Dízel</option>
                    <option value="Elektromos">Elektromos</option>
                    <option value="Hibrid">Hibrid</option>
                </select>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label>Férőhelyek</label>
                <select id="filter-seats">
                    <option value="">Összes</option>
                    <option value="2">2</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="7">7</option>
                    <option value="9">9</option>
                </select>
            </div>
            <div class="form-group" style="margin-bottom: 0;">
                <label>Ár</label>
                <select id="filter-price">
                    <option value="">Összes</option>
                    <option value="0-15000">0 - 15,000 Ft</option>
                    <option value="15000-25000">15,000 - 25,000 Ft</option>
                    <option value="25000+">25,000+ Ft</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="grid" id="cars-container">
    @foreach($cars as $car)
    <div class="car-card" data-brand="{{ $car->brand }}" data-model="{{ $car->model }}" data-category="{{ $car->category ?? 'Személyautó' }}" data-transmission="{{ $car->transmission ?? 'Automata' }}" data-fuel="{{ $car->fuel_type ?? 'Benzin' }}" data-seats="{{ $car->seats ?? '5' }}" data-price="{{ $car->daily_price }}" style="padding: 0; overflow: hidden; border: 1px solid rgba(59, 130, 246, 0.3); border-radius: 12px; background: rgba(30, 38, 57, 0.4); transition: all 0.3s ease;">
        <div style="height: 220px; background: linear-gradient(135deg, rgba(0, 102, 255, 0.3), rgba(30, 64, 175, 0.3)); position: relative;">
            @if($car->image)
                <img src="{{ $car->image }}" alt="{{ $car->brand }} {{ $car->model }}" style="width: 100%; height: 100%; object-fit: cover;">
            @endif
            <div style="position: absolute; top: 1rem; left: 1rem;">
                @if($car->available)
                    <span class="badge badge-success">Elérhető</span>
                @else
                    <span class="badge badge-warning">Foglalt</span>
                @endif
            </div>
            <div style="position: absolute; top: 1rem; right: 1rem;">
                <span class="badge" style="background: rgba(30, 64, 175, 0.6); backdrop-filter: blur(8px); color: white; border: 1px solid rgba(59, 130, 246, 0.3);">{{ $car->year }}</span>
            </div>
        </div>
        <div style="padding: 1.5rem;">
            <h3 style="margin-bottom: 0.75rem; color: var(--text-primary);">{{ $car->brand }} {{ $car->model }}</h3>
            <div style="display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 1rem;">
                <span style="font-size: 0.85rem; padding: 0.25rem 0.75rem; background: rgba(0, 102, 255, 0.15); border: 1px solid rgba(59, 130, 246, 0.3); border-radius: 20px; color: var(--primary-blue);">{{ $car->transmission ?? 'Automata' }}</span>
                <span style="font-size: 0.85rem; padding: 0.25rem 0.75rem; background: rgba(0, 102, 255, 0.15); border: 1px solid rgba(59, 130, 246, 0.3); border-radius: 20px; color: var(--primary-blue);">{{ $car->fuel_type ?? 'Benzin' }}</span>
                <span style="font-size: 0.85rem; padding: 0.25rem 0.75rem; background: rgba(0, 102, 255, 0.15); border: 1px solid rgba(59, 130, 246, 0.3); border-radius: 20px; color: var(--primary-blue);">{{ $car->seats ?? '5' }} férőhely</span>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; padding-top: 1rem; border-top: 1px solid rgba(59, 130, 246, 0.2);">
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.85rem;">Napi díj</p>
                    <p style="font-size: 1.75rem; font-weight: 700; color: var(--primary-blue);">{{ number_format($car->daily_price, 0, ',', ' ') }} Ft</p>
                </div>
            </div>
            <a href="/cars/{{ $car->id }}" class="btn" style="width: 100%; text-align: center; text-decoration: none; display: block;">
                @if($car->available)
                    Bérlés
                @else
                    Részletek
                @endif
            </a>
        </div>
    </div>
    @endforeach
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const brandFilter = document.getElementById('filter-brand');
    const categoryFilter = document.getElementById('filter-category');
    const transmissionFilter = document.getElementById('filter-transmission');
    const fuelFilter = document.getElementById('filter-fuel');
    const seatsFilter = document.getElementById('filter-seats');
    const priceFilter = document.getElementById('filter-price');
    const carCards = document.querySelectorAll('.car-card');

    function filterCars() {
        const search = searchInput.value.toLowerCase();
        const brand = brandFilter.value;
        const category = categoryFilter.value;
        const transmission = transmissionFilter.value;
        const fuel = fuelFilter.value;
        const seats = seatsFilter.value;
        const price = priceFilter.value;

        carCards.forEach(card => {
            let show = true;

            if (search) {
                const cardBrand = card.dataset.brand.toLowerCase();
                const cardModel = card.dataset.model.toLowerCase();
                if (!cardBrand.includes(search) && !cardModel.includes(search)) {
                    show = false;
                }
            }

            if (brand && card.dataset.brand !== brand) {
                show = false;
            }

            if (category && card.dataset.category !== category) {
                show = false;
            }

            if (transmission && card.dataset.transmission !== transmission) {
                show = false;
            }

            if (fuel && card.dataset.fuel !== fuel) {
                show = false;
            }

            if (seats && card.dataset.seats !== seats) {
                show = false;
            }

            if (price) {
                const carPrice = parseInt(card.dataset.price);
                if (price === '0-15000' && carPrice >= 15000) {
                    show = false;
                } else if (price === '15000-25000' && (carPrice < 15000 || carPrice >= 25000)) {
                    show = false;
                } else if (price === '25000+' && carPrice < 25000) {
                    show = false;
                }
            }

            card.style.display = show ? 'block' : 'none';
        });
    }

    searchInput.addEventListener('input', filterCars);
    brandFilter.addEventListener('change', filterCars);
    categoryFilter.addEventListener('change', filterCars);
    transmissionFilter.addEventListener('change', filterCars);
    fuelFilter.addEventListener('change', filterCars);
    seatsFilter.addEventListener('change', filterCars);
    priceFilter.addEventListener('change', filterCars);
});
</script>
@endsection

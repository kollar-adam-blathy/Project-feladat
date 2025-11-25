@extends('layout')

@section('title', 'Autó részletek')

@section('content')
<div style="margin-bottom: 2rem;">
    <a href="/cars" style="color: var(--primary-blue); text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; transition: all 0.3s ease;">
        ← Vissza az autókhoz
    </a>
</div>

<div class="grid" style="grid-template-columns: 1.5fr 1fr; gap: 2rem;">
    <div>
        <div class="card" style="padding: 0; overflow: hidden; margin-bottom: 2rem; border: 1px solid rgba(59, 130, 246, 0.3);">
            <div style="height: 400px; background: linear-gradient(135deg, rgba(0, 102, 255, 0.3), rgba(30, 64, 175, 0.3));">
                @if($car->image)
                    <img src="{{ $car->image }}" alt="{{ $car->brand }} {{ $car->model }}" style="width: 100%; height: 100%; object-fit: cover;">
                @endif
            </div>
        </div>

        <div class="card">
            <h2 style="margin-bottom: 1.5rem; color: var(--primary-blue);">Specifikációk</h2>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.25rem;">Márka</p>
                    <p style="font-weight: 600; font-size: 1.1rem;">{{ $car->brand }}</p>
                </div>
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.25rem;">Modell</p>
                    <p style="font-weight: 600; font-size: 1.1rem;">{{ $car->model }}</p>
                </div>
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.25rem;">Évjárat</p>
                    <p style="font-weight: 600; font-size: 1.1rem;">{{ $car->year }}</p>
                </div>
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.25rem;">Rendszám</p>
                    <p style="font-weight: 600; font-size: 1.1rem;">{{ $car->license_plate }}</p>
                </div>
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.25rem;">Váltó</p>
                    <p style="font-weight: 600; font-size: 1.1rem;">{{ $car->transmission ?? 'Automata' }}</p>
                </div>
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.25rem;">Üzemanyag</p>
                    <p style="font-weight: 600; font-size: 1.1rem;">{{ $car->fuel_type ?? 'Benzin' }}</p>
                </div>
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.25rem;">Férőhelyek</p>
                    <p style="font-weight: 600; font-size: 1.1rem;">{{ $car->seats ?? '5' }}</p>
                </div>
                <div>
                    <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.25rem;">Szín</p>
                    <p style="font-weight: 600; font-size: 1.1rem;">{{ $car->color ?? 'Fekete' }}</p>
                </div>
            </div>
        </div>

        <div class="card" style="margin-top: 2rem;">
            <h2 style="margin-bottom: 1rem;">Leírás</h2>
            <p style="color: var(--text-secondary); line-height: 1.8;">
                {{ $car->description ?? 'Prémium kategóriás autó, tökéletes állapotban. Klímaberendezés, navigáció, minden kényelmi funkcióval felszerelve.' }}
            </p>
        </div>

        <div class="card" style="margin-top: 2rem;">
            <h2 style="margin-bottom: 1rem;">Felszereltség</h2>
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 0.75rem;">
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <span style="color: var(--primary-blue); font-size: 1.2rem;">✓</span>
                    <span>Klímaautomatika</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <span style="color: var(--primary-blue); font-size: 1.2rem;">✓</span>
                    <span>Bőr ülések</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <span style="color: var(--primary-blue); font-size: 1.2rem;">✓</span>
                    <span>Navigáció</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <span style="color: var(--primary-blue); font-size: 1.2rem;">✓</span>
                    <span>Tolatókamera</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <span style="color: var(--primary-blue); font-size: 1.2rem;">✓</span>
                    <span>Bluetooth</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <span style="color: var(--primary-blue); font-size: 1.2rem;">✓</span>
                    <span>USB csatlakozás</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <span style="color: var(--primary-blue); font-size: 1.2rem;">✓</span>
                    <span>Tempomat</span>
                </div>
                <div style="display: flex; align-items: center; gap: 0.5rem;">
                    <span style="color: var(--primary-blue); font-size: 1.2rem;">✓</span>
                    <span>Multifunkciós kormány</span>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="card" style="position: sticky; top: 100px;">
            <div style="margin-bottom: 2rem;">
                <h1 style="margin-bottom: 0.5rem;">{{ $car->brand }} {{ $car->model }}</h1>
                @if($car->available)
                    <span class="badge badge-success">Elérhető</span>
                @else
                    <span class="badge badge-warning">Foglalt</span>
                @endif
            </div>

            <div style="padding: 1.5rem; background: rgba(0, 102, 255, 0.15); border: 1px solid rgba(59, 130, 246, 0.4); border-radius: 12px; margin-bottom: 2rem;">
                <p style="color: var(--text-secondary); font-size: 0.9rem; margin-bottom: 0.5rem;">Napi bérleti díj</p>
                <p style="font-size: 2.5rem; font-weight: 700; color: var(--primary-blue); margin-bottom: 0;">{{ number_format($car->daily_price, 0, ',', ' ') }} Ft</p>
            </div>

            @if($car->available)
            <form action="/rentals" method="POST" id="rental-form">
                @csrf
                <input type="hidden" name="car_id" value="{{ $car->id }}">
                
                <div class="form-group">
                    <label>Bérlés kezdete</label>
                    <input type="date" name="start_date" id="start_date" required min="{{ date('Y-m-d') }}">
                </div>

                <div class="form-group">
                    <label>Bérlés vége</label>
                    <input type="date" name="end_date" id="end_date" required min="{{ date('Y-m-d') }}">
                </div>

                <div style="padding: 1.5rem; background: rgba(0, 102, 255, 0.1); border: 1px solid rgba(59, 130, 246, 0.3); border-radius: 12px; margin-bottom: 1.5rem;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.75rem;">
                        <span style="color: var(--text-secondary);">Bérleti díj</span>
                        <span style="font-weight: 600;">{{ number_format($car->daily_price, 0, ',', ' ') }} Ft/nap</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.75rem;">
                        <span style="color: var(--text-secondary);">Napok száma</span>
                        <span style="font-weight: 600;" id="days-count">0 nap</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 0.75rem;">
                        <span style="color: var(--text-secondary);">Biztosítás</span>
                        <span style="font-weight: 600;">Ingyenes</span>
                    </div>
                    <div style="height: 1px; background: rgba(59, 130, 246, 0.3); margin: 1rem 0;"></div>
                    <div style="display: flex; justify-content: space-between;">
                        <span style="font-weight: 700; font-size: 1.1rem;">Végösszeg</span>
                        <span style="font-weight: 700; font-size: 1.25rem; color: var(--primary-blue);" id="total-price">0 Ft</span>
                    </div>
                </div>

                <button type="submit" class="btn" style="width: 100%; padding: 1rem; font-size: 1.1rem;">Foglalás</button>

                <div style="margin-top: 1.5rem; padding: 1rem; background: rgba(0, 102, 255, 0.1); border: 1px solid rgba(59, 130, 246, 0.3); border-radius: 12px; text-align: center;">
                    <p style="color: var(--text-secondary); font-size: 0.9rem;">
                        <span style="color: var(--primary-blue);">✓</span> Ingyenes lemondás 24 órával a bérlés előtt
                    </p>
                </div>
            </form>
            @else
            <div style="padding: 1.5rem; background: rgba(0, 102, 255, 0.1); border: 1px solid rgba(59, 130, 246, 0.3); border-radius: 12px; text-align: center;">
                <p style="color: var(--text-secondary);">Ez az autó jelenleg nem elérhető</p>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const startDate = document.getElementById('start_date');
    const endDate = document.getElementById('end_date');
    const daysCount = document.getElementById('days-count');
    const totalPrice = document.getElementById('total-price');
    const dailyPrice = {{ $car->daily_price }};

    function calculateTotal() {
        const start = new Date(startDate.value);
        const end = new Date(endDate.value);

        if (startDate.value && endDate.value && start < end) {
            const diffTime = Math.abs(end - start);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            
            daysCount.textContent = diffDays + ' nap';
            const total = diffDays * dailyPrice;
            totalPrice.textContent = total.toLocaleString('hu-HU') + ' Ft';
        } else {
            daysCount.textContent = '0 nap';
            totalPrice.textContent = '0 Ft';
        }
    }

    startDate.addEventListener('change', function() {
        endDate.min = startDate.value;
        calculateTotal();
    });

    endDate.addEventListener('change', calculateTotal);

    document.getElementById('rental-form').addEventListener('submit', function(e) {
        const start = new Date(startDate.value);
        const end = new Date(endDate.value);

        if (start >= end) {
            e.preventDefault();
            alert('A bérlés végének későbbi dátumnak kell lennie, mint a kezdet!');
            return false;
        }
    });
});
</script>
@endsection

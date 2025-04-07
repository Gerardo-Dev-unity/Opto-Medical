<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agendar cita</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="w-full max-w-2xl bg-white shadow-lg rounded-xl p-8">
            <h1 class="text-3xl font-bold text-center mb-6 text-blue-600">Agenda tu cita</h1>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('agendar.guardar') }}" onsubmit="return validarFormulario()">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <input type="text" name="nombre" placeholder="Nombre completo" value="{{ old('nombre') }}" class="input" required>
                    <input type="email" name="email" placeholder="Correo electrónico" value="{{ old('email') }}" class="input" required>
                    <input type="text" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}" class="input" required>
                    <input type="date" id="fecha" name="fecha" value="{{ old('fecha') }}" class="input" required>
                </div>

                <input type="hidden" name="hora" id="hora">

                <div id="horarios-container" class="mb-4 flex flex-wrap gap-2">
                    <p class="text-gray-500">Selecciona una fecha para ver los horarios disponibles.</p>
                </div>

                <textarea name="motivo" placeholder="Motivo de la cita (opcional)" class="input h-24 resize-none">{{ old('motivo') }}</textarea>

                <button type="submit" class="mt-6 w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded font-semibold transition">
                    Agendar cita
                </button>
            </form>
        </div>
    </div>

    <style>
        .input {
            @apply w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500;
        }
    </style>

    <script>
        const fechaInput = document.getElementById('fecha');
        const horariosContainer = document.getElementById('horarios-container');
        const horaHiddenInput = document.getElementById('hora');

        fechaInput.addEventListener('change', function () {
            const fecha = this.value;
            horariosContainer.innerHTML = '<p class="text-sm text-gray-400">Cargando horarios...</p>';
            horaHiddenInput.value = '';

            fetch(`/horarios-disponibles?fecha=${fecha}`)
                .then(response => response.json())
                .then(data => {
                    horariosContainer.innerHTML = '';

                    if (data.motivo) {
                        horariosContainer.innerHTML = `
                            <p class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                                ${data.motivo}
                            </p>`;
                        return;
                    }

                    if (data.disponibles.length === 0) {
                        horariosContainer.innerHTML = `
                            <p class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded">
                                No hay horarios disponibles para esta fecha.
                            </p>`;
                        return;
                    }

                    data.disponibles.forEach(hora => {
                        const btn = document.createElement('button');
                        btn.type = 'button';
                        btn.className = 'horario-btn px-4 py-2 m-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition';
                        btn.textContent = hora;

                        btn.addEventListener('click', () => {
                            document.querySelectorAll('.horario-btn').forEach(b => {
                                b.classList.remove('bg-green-600');
                                b.classList.add('bg-blue-500');
                            });

                            btn.classList.remove('bg-blue-500');
                            btn.classList.add('bg-green-600');
                            horaHiddenInput.value = hora;
                        });

                        horariosContainer.appendChild(btn);
                    });
                })
                .catch(() => {
                    horariosContainer.innerHTML = '<p class="text-red-600">Error al obtener los horarios.</p>';
                });
        });

        function validarFormulario() {
            const horaSeleccionada = document.getElementById('hora').value;
            if (!horaSeleccionada) {
                alert('Por favor selecciona un horario antes de agendar tu cita.');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>

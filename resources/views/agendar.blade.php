<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agendar cita</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        .horario-btn {
            padding: 10px 15px;
            margin: 5px;
            border: 1px solid #ccc;
            background-color: #f0f0f0;
            cursor: pointer;
            display: inline-block;
            border-radius: 5px;
        }
        .horario-btn.selected {
            background-color: #00b894;
            color: white;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Agendar una cita</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('agendar.guardar') }}" onsubmit="return validarFormulario();">
        @csrf

        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="{{ old('nombre') }}"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br><br>

        <label>Teléfono:</label><br>
        <input type="text" name="telefono" value="{{ old('telefono') }}"><br><br>

        <label>Fecha:</label><br>
        <input type="date" name="fecha" id="fecha" value="{{ old('fecha') }}"><br><br>

        <label>Horario:</label><br>
        <div id="horarios-container">
            <p>Selecciona una fecha para ver los horarios disponibles.</p>
        </div>
        <input type="hidden" name="hora" id="hora"><br><br>

        <label>Motivo (opcional):</label><br>
        <textarea name="motivo">{{ old('motivo') }}</textarea><br><br>

        <button type="submit">Agendar cita</button>
    </form>

    <script>
        const fechaInput = document.getElementById('fecha');
        const horariosContainer = document.getElementById('horarios-container');
        const horaHiddenInput = document.getElementById('hora');

        fechaInput.addEventListener('change', function () {
            const fecha = this.value;
            horariosContainer.innerHTML = '<p>Cargando horarios...</p>';
            horaHiddenInput.value = '';

            fetch(`/horarios-disponibles?fecha=${fecha}`)
                .then(response => response.json())
                .then(data => {
    horariosContainer.innerHTML = '';

    // 👇 Mostrar mensaje si el día está completamente bloqueado
    if (data.bloqueado) {
        horariosContainer.innerHTML = `
            <p style="color: red; font-weight: bold; padding: 10px; border: 1px solid red; border-radius: 5px; background-color: #ffe6e6;">
                ${data.motivo}
            </p>`;
        return;
    }

    // 👇 Mostrar mensaje si no hay horarios disponibles (aunque no esté bloqueado)
    if (data.disponibles.length === 0) {
        horariosContainer.innerHTML = `
            <p style="color: red; font-weight: bold; padding: 10px; border: 1px solid red; border-radius: 5px; background-color: #ffe6e6;">
                No hay horarios disponibles para esta fecha. Por favor selecciona otro día.
            </p>`;
        return;
    }

    // 👇 Mostrar horarios disponibles como botones
    data.disponibles.forEach(hora => {
        const btn = document.createElement('div');
        btn.className = 'horario-btn';
        btn.textContent = hora;
        btn.addEventListener('click', () => {
            document.querySelectorAll('.horario-btn').forEach(b => b.classList.remove('selected'));
            btn.classList.add('selected');
            horaHiddenInput.value = hora;
        });
        horariosContainer.appendChild(btn);
    });
})

                    if (data.disponibles.length === 0) {
    horariosContainer.innerHTML = `
        <p style="color: red; font-weight: bold; padding: 10px; border: 1px solid red; border-radius: 5px; background-color: #ffe6e6;">
            No hay horarios disponibles para esta fecha. Por favor selecciona otro día.
        </p>`;
    return;
                    }

                    data.disponibles.forEach(hora => {
                        const btn = document.createElement('div');
                        btn.className = 'horario-btn';
                        btn.textContent = hora;
                        btn.addEventListener('click', () => {
                            document.querySelectorAll('.horario-btn').forEach(b => b.classList.remove('selected'));
                            btn.classList.add('selected');
                            horaHiddenInput.value = hora;
                        });
                        horariosContainer.appendChild(btn);
                    });
                })
                .catch(() => {
                    horariosContainer.innerHTML = '<p>Error al obtener los horarios.</p>';
                });
        

        function validarFormulario() {
        const horaSeleccionada = document.getElementById('hora').value;
        if (!horaSeleccionada) {
            alert('Por favor selecciona un horario antes de agendar tu cita.');
            return false; // Detiene el envío
        }
        return true;
    }
    
    </script>
</body>
</html>

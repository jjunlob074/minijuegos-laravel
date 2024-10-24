/// Obtener el elemento de audio por su ID
const audio1 = document.getElementById('audio');

/// Función para mostrar un círculo en la posición del mouse
function mostrarCirculo(event) {
    // Obtener el elemento del círculo por su ID
    const circulo = document.getElementById('circulo');
    // Mostrar el círculo
    circulo.style.display = 'block';

    // Calcular las coordenadas x e y del mouse
    const x = event.clientX - 310;
    const y = event.clientY;

    // Establecer la posición del círculo en las coordenadas calculadas
    circulo.style.left = x + 'px';
    circulo.style.top = y + 'px';

    // Ocultar el círculo después de 500 milisegundos (ajustar según sea necesario)
    setTimeout(() => {
        circulo.style.display = 'none';
    }, 500);
}

/// Objeto de juego que contiene la lógica del juego
const game = {
    buttonOrder: [], // Almacenará la secuencia de botones generada por el juego
    playerOrder: [], // Almacenará la secuencia de botones ingresada por el jugador
    level: 1, // Nivel actual
    position: 0, // Posición actual en la secuencia del jugador
    buttons: document.querySelectorAll(".button"), // Lista de botones del juego
    startButton: document.getElementById("start-button"), // Botón de inicio del juego

    /// Método de inicialización del juego
    init() {
        // Agregar un evento de clic al botón de inicio para comenzar el juego
        this.startButton.addEventListener("click", () => this.startGame());
        // Agregar un evento de clic a cada botón para verificar la entrada del jugador
        this.buttons.forEach((button) =>
            button.addEventListener("click", (event) =>
                this.checkButton(event.target.id)
            )
        );
    },

    /// Método para iniciar el juego
    startGame() {
        // Deshabilitar el botón de inicio
        this.startButton.disabled = true;
        // Cambiar el color de fondo del botón de inicio a verde
        this.startButton.style.backgroundColor = 'green';
        // Iniciar la primera ronda del juego
        this.playRound();
    },

    /// Método para iniciar una nueva ronda del juego
    playRound() {
        // Reiniciar la secuencia del jugador
        this.playerOrder.length = 0;
        // Mostrar la secuencia de botones generada por el juego
        this.showOrder();
    },

    /// Método para mostrar la secuencia de botones generada por el juego
    showOrder() {
        // Seleccionar un botón aleatorio
        const randomButton = this.buttons[Math.floor(Math.random() * this.buttons.length)];
        // Agregar el ID del botón a la secuencia del juego
        this.buttonOrder.push(randomButton.id);
        // Imprimir en la consola la secuencia de botones del nivel actual y el botón iluminado
        console.log(`SECUENCIAS DE BOTONES DEL NIVEL ${this.level}: ${this.buttonOrder} / SE ILUMINÓ: `)
        // Inicializar un índice para recorrer la secuencia de botones
        let i = 0;
        // Establecer un intervalo para iluminar cada botón en la secuencia
        const intervalId = setInterval(() => {
            if (i < this.buttonOrder.length) {
                const button = this.buttonOrder[i];
                // Iluminar el botón actual
                this.highlightButton(button);
                i++;
            } else {
                // Detener el intervalo después de iluminar todos los botones
                clearInterval(intervalId);
            }
        }, 1200); // Intervalo de 1200 milisegundos entre iluminaciones
    },

    /// Método para resaltar un botón
    highlightButton(buttonId) {
        // Obtener el elemento del botón por su ID
        const button = document.getElementById(buttonId);
        // Imprimir en la consola el ID del botón
        console.log(button.id);
        // Desactivar pointer-events para evitar hover mientras se ejecuta la función
        if (button) {
            const originalPointerEvents = button.style.pointerEvents;
            button.style.pointerEvents = 'none';

            // Realizar la animación de resaltado
            button.style.border = "5px solid white";
            button.style.outline = "3 px solid black";
            audio1.play(); // Reproducir el sonido asociado al botón
            setTimeout(() => {
                // Restaurar pointer-events después de la animación
                button.style.border = "3px solid transparent";
                button.style.pointerEvents = originalPointerEvents;
            }, 600); // Restaurar después de 600 milisegundos (ajustar según sea necesario)
        }
    },

    /// Método para verificar el botón clicado por el jugador
    checkButton(clickedButtonId) {
        // Verificar si el botón clicado es el correcto
        if (this.isButtonCorrect(clickedButtonId)) {
            // Incrementar la posición en la secuencia del jugador
            this.position++;
            // Verificar si se completó el nivel
            if (this.isLevelCompleted()) {
                // Pasar al siguiente nivel
                this.nextLevel();
            }
        } else {
            // Imprimir en la consola información sobre el nivel alcanzado y el fin del juego
            console.log("HAS LLEGADO AL NIVEL " + this.level);
            console.log(`HAS CONSEGUIDO COMPLETAR ${this.level - 1} NIVELES`);
            console.log("GAME OVER :(");
            // Cambiar el color de fondo del botón de inicio a rojo
            this.startButton.style.backgroundColor = 'red';
            // Finalizar el juego
            this.endGame();
        }
    },

    /// Método para verificar si el botón clicado por el jugador es el correcto
    isButtonCorrect(clickedButtonId) {
        // Obtener el botón correcto en la secuencia del juego
        const checkButton = this.buttonOrder[this.position];
        // Expresión regular para validar los ID de los botones (rojo, azul, verde, amarillo)
        const buttonRegex = /^(red|blue|green|yellow)$/i;
        // Imprimir en la consola el botón correcto y el botón clicado
        console.log("EL BOTÓN CORRECTO: " + checkButton);
        console.log("EL BOTÓN QUE PULSÓ: " + clickedButtonId);
        console.log("---------------------------------------");
        // Verificar si el ID del botón clicado coincide con el botón correcto
        if (buttonRegex.test(clickedButtonId)) {
            return clickedButtonId === checkButton;
        }
    },

    /// Método para verificar si se completó el nivel
    isLevelCompleted() {
        return this.position === this.buttonOrder.length;
    },

    /// Método para pasar al siguiente nivel
    nextLevel() {
        // Actualizar el contador de niveles en el documento HTML
        document.getElementById('counter').textContent = this.level;
        // Incrementar el nivel y reiniciar la posición en la secuencia del jugador
        this.level++;
        this.position = 0;
        // Iniciar una nueva ronda
        this.playRound();
    },

    /// Método para finalizar el juego
    endGame() {
        // Guardar los puntos solo si se ha alcanzado algún nivel
        if (this.level !== 1) {
           this.savepoints();
        }
        // Reiniciar las secuencias y el nivel del juego
        this.buttonOrder.length = 0;
        this.playerOrder.length = 0;
        this.level = 1;
        this.position = 0;
        // Habilitar el botón de inicio
        this.startButton.disabled = false;
    },

    /// Método para guardar los puntos del jugador
    savepoints() {
        // Calcular el puntaje obtenido por el jugador
        const puntaje = this.level - 1;
        // Crear una nueva instancia de XMLHttpRequest
        const xhr = new XMLHttpRequest();
        // Obtener el token CSRF del documento HTML
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        // Obtener la URL actual del navegador
        const urlActual = window.location.href;
        // Reemplazar "SimonDice" por "guardar-puntaje" en la URL actual
        const targetURL = urlActual.replace('SimonDice', 'guardar-puntaje');
        // Imprimir en la consola la URL de destino para guardar el puntaje
        console.log(targetURL);
        // Configurar la solicitud HTTP POST
        xhr.open("POST", targetURL);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("X-CSRF-TOKEN", csrfToken);
        // Enviar los datos del puntaje como JSON en el cuerpo de la solicitud
        xhr.send(JSON.stringify({ puntaje: puntaje }));
        // Mostrar una alerta con el puntaje obtenido
        alert(`¡Juego terminado! Has conseguido completar: ${this.level - 1} niveles`);
    },
};

// Inicializar el juego al cargar la página
game.init();

import * as THREE from "https://cdn.skypack.dev/three@0.136.0/build/three.module.js";

    // Configuración básica
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer();
        renderer.setSize(600, 600);
        document.addEventListener('DOMContentLoaded', function() {
            const solarContainer = document.getElementById('solar');
            if (solarContainer) {
                solarContainer.appendChild(renderer.domElement);
            } else {
                console.error('The container with id "solar" was not found.');
            }
        });
        
         // Añade el fondo estrellado
        const starTexture = new THREE.TextureLoader().load('https://images.unsplash.com/photo-1598046147932-c78b6d9c0905?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8ZXN0cmVsbGElMjBuZWdyYXxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80'); // Cambia 'estrellas.jpeg' por la ruta correcta de tu imagen
        const starMaterial = new THREE.MeshBasicMaterial({ map: starTexture, side: THREE.BackSide });
        const starField = new THREE.Mesh(new THREE.SphereGeometry(100, 64, 64), starMaterial);
        scene.add(starField);
         // Variables para controlar la interacción del usuario
        let isDragging = false;
        let previousMousePosition = {
            x: 0,
            y: 0
        };
        
        function resizeRenderer() {
    const newWidth = window.innerWidth;
    const newHeight = window.innerHeight;
    camera.aspect = newWidth / newHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(newWidth, newHeight);
}
        // Función para manejar el movimiento del mouse
        function onDocumentMouseDown(event) {
            event.preventDefault();
            isDragging = true;
            previousMousePosition = {
                x: event.clientX,
                y: event.clientY
            };
        }

        function onDocumentMouseMove(event) {
            if (isDragging) {
                const deltaMove = {
                    x: event.clientX - previousMousePosition.x,
                    y: event.clientY - previousMousePosition.y
                };

                const theta = (deltaMove.x * 0.005);
                const phi = (deltaMove.y * 0.005);

                camera.position.x += 10 * Math.sin(theta);
                camera.position.y += 10 * Math.sin(phi);
                camera.lookAt(0, 0, 0);

                previousMousePosition = {
                    x: event.clientX,
                    y: event.clientY
                };
            }
        }

        function onDocumentMouseUp(event) {
            isDragging = false;
        }
        
        window.addEventListener('resize', resizeRenderer);
        resizeRenderer(); // Llama a la función al cargar la página

        // Agregar eventos de mouse
        document.addEventListener('mousedown', onDocumentMouseDown, false);
        document.addEventListener('mousemove', onDocumentMouseMove, false);
        document.addEventListener('mouseup', onDocumentMouseUp, false);
        // Sol
        const sunGeometry = new THREE.SphereGeometry(3, 48, 48);
        const sunMaterial = new THREE.MeshPhongMaterial({ emissive: 0xffd700, emissiveIntensity: 10 });
        const sun = new THREE.Mesh(sunGeometry, sunMaterial);
        scene.add(sun);
        
        const sunLight = new THREE.PointLight(0xffffff, 2);
        sunLight.position.copy(sun.position); // La posición de la luz sigue al sol
        scene.add(sunLight);
	    const ambientLight = new THREE.AmbientLight(0x404040); // Color de luz ambiental
        scene.add(ambientLight);
        

        // Tamaños y distancias de los planetas (escala y colores modificados)
        const planetData = [
            { name: 'Mercurio', size: 0.3, distance: 5, speed: 0.02, color: 0xa58e61 }, // Color marrón claro
            { name: 'Venus', size: 0.6, distance: 8, speed: 0.015, color: 0xe5c995 }, // Color amarillo claro
            { name: 'Tierra', size: 0.6, distance: 10, speed: 0.01, color: 0x0075ff }, // Color azul
            { name: 'Marte', size: 0.45, distance: 12, speed: 0.007, color: 0xa53c00 }, // Color rojo
            { name: 'Jupiter', size: 1.2, distance: 17, speed: 0.005, color: 0xb38c65 }, // Color marrón claro
            { name: 'Saturno', size: 1.05, distance: 22, speed: 0.004, color: 0xffc160 }, // Color amarillo claro
            { name: 'Urano', size: 0.75, distance: 27, speed: 0.003, color: 0x77aaff }, // Color azul claro
            { name: 'Neptuno', size: 0.75, distance: 32, speed: 0.002, color: 0x001fff }, // Color azul oscuro
            { name: 'Plutón', size: 0.24, distance: 37, speed: 0.0015, color: 0xc0c0c0 } // Color gris
        ];

        // Crear planetas y órbitas
        const planets = {};
        for (const data of planetData) {
            const { name, size, distance, speed, color } = data;
            // Crear órbita como una curva elíptica
            const orbitCurve = new THREE.EllipseCurve(
                0, 0,               // x, y del centro
                distance, distance, // radioX, radioY (distancia, ya que queremos una órbita circular)
                0, 2 * Math.PI,      // Ángulo de inicio y fin
                false,               // Sentido de las manecillas del reloj
                0                   // Rotación de la elipse
            );

            const orbitPoints = orbitCurve.getPoints(128); // Obtener puntos de la curva
            const orbitGeometry = new THREE.BufferGeometry().setFromPoints(orbitPoints);
            const orbitMaterial = new THREE.LineBasicMaterial({ color: 0xffffff });
            const orbit = new THREE.Line(orbitGeometry, orbitMaterial);
             orbit.rotation.x = -Math.PI / 2; // Para que la línea esté en el plano XY
            scene.add(orbit);

            // Crear planeta
            const geometry = new THREE.SphereGeometry(size, 32, 32);
            const material = new THREE.MeshPhongMaterial({ color: color });
            const planet = new THREE.Mesh(geometry, material);
            scene.add(planet);
            planets[name] = { planet, distance, angle: Math.random() * Math.PI * 2, speed };
        }

        // Cámara
        camera.position.set(0, 55, 30);
        camera.lookAt(0, 0, 0);

        // Animación
        const animate = () => {
            requestAnimationFrame(animate);

            // Rotación y órbita de los planetas
            for (const planetName in planets) {
                if (planets.hasOwnProperty(planetName)) {
                    const { planet, distance, angle, speed } = planets[planetName];
                    planet.position.x = distance * Math.cos(angle);
                    planet.position.z = distance * Math.sin(angle);
                    planets[planetName].angle += speed;
                }
            }
            
             // Actualizar la posición de la luz del sol
    	    sunLight.position.copy(sun.position);

            renderer.render(scene, camera);
        };

        animate();

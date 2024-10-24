
import * as THREE from "https://cdn.skypack.dev/three@0.136.0/build/three.module.js";
import { GLTFLoader } from "https://cdn.skypack.dev/three@0.136.0/examples/jsm/loaders/GLTFLoader.js";
import { OrbitControls } from "https://cdn.skypack.dev/three@0.136.0/examples/jsm/controls/OrbitControls.js";

// Inicializa Three.js
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
const renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);
document.getElementById('canvas-container').appendChild(renderer.domElement);

// Configura la posición de la cámara
camera.position.set(0, 10, 10); // Ajusta las coordenadas según tus necesidades

// Crea un loader de glTF
const loader = new GLTFLoader();

// Declara la variable model fuera del callback para que sea accesible en todo el ámbito.
let model;

// Carga el modelo glTF
loader.load(
  // Ruta del recurso
  gltfModelUrl,
  // Función llamada cuando se carga el recurso
  function (gltf) {
    // Agrega el modelo a la escena
    model = gltf.scene; // Asigna el modelo a la variable model
    scene.add(model);

    // Configura la posición y escala del modelo
    model.position.set(-8, -1, 1); // Cambia las coordenadas según tus necesidades
    model.scale.set(1.5, 1.5, 1.5); // Cambia la escala según tus necesidades
    
  },
  // Función llamada durante la carga
  function (xhr) {
    console.log((xhr.loaded / xhr.total * 100) + '% loaded');
  },
  // Función llamada en caso de errores
  function (error) {
    console.log('An error happened', error);
  }
);

// Crea una luz direccional
const directionalLight = new THREE.DirectionalLight(0xffffff, 1);

// Configura la posición de la luz
directionalLight.position.set(5, 5, 5); // Puedes ajustar la posición según tus necesidades

// Agrega la luz a la escena
scene.add(directionalLight);

// Inicializa los controles de la cámara
const controls = new OrbitControls(camera, renderer.domElement);
controls.enableDamping = true; // Agrega amortiguación para movimientos suaves
controls.dampingFactor = 0.05; // Ajusta la cantidad de amortiguación según tus preferencias

// Renderiza la escena
const animate = () => {
  requestAnimationFrame(animate);

  // Actualiza los controles de la cámara
  controls.update();

  // Rota el modelo 3D (si lo deseas)
  if (model) {
    model.rotation.y += 0.01;
  }

  renderer.render(scene, camera);
};

animate();


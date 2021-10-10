import * as THREE from 'https://cdn.skypack.dev/three@0.129.0';
import { GLTFLoader } from 'https://cdn.skypack.dev/three@0.129.0/examples/jsm/loaders/GLTFLoader.js';

// // Variables
let container, camera, renderer, scene, house

function init() {
    container = document.querySelector('.scene')

    // Create scene
    scene = new THREE.Scene()
    const fov = 35
    const aspect = container.clientWidth / container.clientHeight
    const near = 0.1
    const far = 500

    // Camera Setup
    camera = new THREE.PerspectiveCamera(fov, aspect, near, far)
    camera.position.set(0,2,10)

    const ambient = new THREE.AmbientLight(0x404040,2)
    // scene.add(ambient)

    const light = new THREE.DirectionalLight(0xffffff,2)
    light.position.set(0,50,1000)
    scene.add(light)

    // Renderer
    renderer = new THREE.WebGLRenderer({antialias:true,alpha:true})
    renderer.setSize(container.clientWidth, container.clientHeight)
    renderer.setPixelRatio(window.devicePixelRatio)

    container.appendChild(renderer.domElement)

    // Load Model
    const loader = new GLTFLoader();
    loader.load('./elephant/scene.gltf',function(gltf){
        scene.add(gltf.scene)
        console.log(gltf)
        house = gltf.scene.children[0]
        animate()
    })
}

function animate(){
    requestAnimationFrame(animate)
    house.rotation.z += 0.005
    renderer.render(scene,camera)

}

init()

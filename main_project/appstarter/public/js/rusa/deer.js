import * as THREE from 'https://cdn.skypack.dev/three@0.129.0';
import { GLTFLoader } from 'https://cdn.skypack.dev/three@0.129.0/examples/jsm/loaders/GLTFLoader.js';
import { OrbitControls } from 'https://cdn.jsdelivr.net/npm/three@0.121.1/examples/jsm/controls/OrbitControls.js';
var scripts = document.getElementsByTagName("script"),
    src = scripts[scripts.length-1].src;

    console.log(src)

// // Variables
let container, camera, renderer, scene, house

function init() {
    container = document.querySelector('.scene')

    // Create scene
    scene = new THREE.Scene()
    const fov = 35
    const aspect = container.clientWidth / container.clientHeight
    const near = 0.1
    const far = 100000 //changed

    // Camera Setup
    camera = new THREE.PerspectiveCamera(fov, aspect, near, far)
    camera.position.set(0,5,20)

    const ambient = new THREE.AmbientLight(0x404040,2)
    scene.add(ambient)

    const light = new THREE.DirectionalLight(0xffffff,10)
    light.position.set(10,10,20)
    scene.add(light)

    // Renderer
    renderer = new THREE.WebGLRenderer({antialias:true,alpha:true})
    renderer.setSize(container.clientWidth, container.clientHeight)
    renderer.setPixelRatio(window.devicePixelRatio)

    container.appendChild(renderer.domElement)

    // controls
    const controls = new OrbitControls( camera, renderer.domElement );

    // Load Model
    const loader = new GLTFLoader();
    loader.load('../js/rusa/scene.gltf',function(gltf){
        scene.add(gltf.scene)
        console.log(gltf)
        house = gltf.scene.children[0]
        animate()
    })
}

function animate(){
    requestAnimationFrame(animate)
    house.rotation.z = 7
    house.position.y = -5
    renderer.render(scene,camera)

}

init()

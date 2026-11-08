<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: inicio_sesion.html");
    exit;
}
$link = mysqli_connect('localhost', 'root', '', 'newton_go');
$usuario = $_SESSION['usuario'];
$result = mysqli_query($link, "SELECT ruta FROM imagenes WHERE usuario='$usuario' ORDER BY id DESC LIMIT 1");
$row = mysqli_fetch_assoc($result);
$ruta = $row ? $row['ruta'] : "https://via.placeholder.com/80";

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Newton-Go | Dashboard</title>
<style>
body{
font-family: Arial, sans-serif;
margin:0;
background:#0f172a;
color:#e5e7eb;
display: flex;
flex-direction: column;
height: 100vh;
}
header{
background:#020617;
padding:15px;
text-align:center;
font-size:24px;
font-weight:bold;
color:#38bdf8;
border-bottom: 1px solid #1e293b;
}
.container{
display:flex;
flex:1;
overflow: hidden;
}
.menu{
width:200px;
background:#020617;
padding:10px;
display: flex;
flex-direction: column;
gap: 5px;
}
.menu h3{
color:#38bdf8;
margin-top: 0;
font-size: 1.1em;
}
.menu button{
display:block;
width:100%;
padding:10px;
border:none;
background:#1e293b;
color:white;
border-radius:8px;
cursor:pointer;
text-align: left;
}
.menu button:hover{
background:#38bdf8;
color:black;
}
.content{
flex:1;
padding:20px;
overflow-y:auto;
display: flex;
justify-content: center;
}
.card{
background:#1e293b;
padding:20px;
border-radius:12px;
width: 100%;
max-width:600px;
height: fit-content;
}
.quiz button{
margin-top:10px;
padding:10px;
width:100%;
border:none;
border-radius:8px;
background:#334155;
color:white;
cursor:pointer;
font-weight: bold;
}
.quiz button:hover:not(:disabled){
background:#38bdf8;
color:black;
}
.perfil{
width:240px;
background:#020617;
padding:10px;
border-left:1px solid #1e293b;
display: flex;
flex-direction: column;
gap: 10px;
}
.perfil-info {
text-align: center;
background: #1e293b;
padding: 15px;
border-radius: 10px;
}
.perfil-info button{
    margin-top:10px;
padding:10px;
width:100%;
border:none;
border-radius:8px;

cursor:pointer;background:#38bdf8;
color:black;
}

.perfil-info button:hover{
background: #020617;
color:#ffffff;
}

.perfil-info input{
border:none;
border-radius:8px;
color:white;
}

.perfil img{
width:80px;
height:80px;
border-radius:50%;
background: #334155;
margin-bottom: 10px;
object-fit: cover;
border: 2px solid #38bdf8;
}
.progreso-container {
background: #1e293b;
padding: 15px;
border-radius: 10px;
flex: 1;
overflow-y: auto;
}
.barraContenedor{
background:#334155;
border-radius:4px;
height:6px;
margin:4px 0 8px 0;
}
.barra{
height:100%;
width:0%;
background:#22c55e;
border-radius:4px;
transition: width 0.5s ease;
}
.modulo-progreso {
font-size: 0.85em;
margin-bottom: 10px;
}
input[type="file"] {
font-size: 0.7em;
width: 100%;
margin-top: 10px;
}
.card a{
color: #38bdf8;      
text-decoration: underline;
cursor: pointer;  
font-style: italic;
}

.card a:hover {
color: #ffffff;         
}
</style>
</head>
<body>

<header>Newton-Go ⚛️</header>

<div class="container">
    <div class="menu">
        <h3>Módulos</h3>
        <button onclick="mostrar('intro')">Introducción</button>
        <button onclick="mostrar('cinematica')">Cinemática</button>
        <button onclick="mostrar('dinamica')">Dinámica</button>
        <button onclick="mostrar('energia')">Energía</button>
        <button onclick="mostrar('ondas')">Ondas</button>
        <button onclick="mostrar('electricidad')">Electricidad</button>
        <button onclick="mostrar('termo')">Termodinámica</button>
        <button onclick="mostrar('optica')">Óptica</button>
    </div>

    <div class="content">
        <div id="intro" class="card">
            <h2>Física Clásica</h2>
            <p>La física clásica es la rama de la física que estudia los fenómenos del mundo que podemos observar a simple vista, como el movimiento de los objetos, las fuerzas, la energía, el calor, la luz y la electricidad. Se utiliza para explicar situaciones cotidianas, como el movimiento de una pelota, el funcionamiento de un automóvil o la caída de los objetos. Aunque hoy existen teorías más avanzadas, la física clásica sigue siendo fundamental porque permite entender la mayoría de los procesos del mundo real.</p>
        </div>

        <div id="cinematica" class="card" style="display:none">
            <h2>Cinemática</h2>
            <p><b>¿Que es?</b> Estudia el movimiento de los cuerpos sin analizar sus causas.</p>
            <p><b>¿Que estudia?</b> Velocidad, desplazamiento y tiempo.</p>
            <p><b>Formula principal:</b> V = distancia / tiempo</p>
            <p><b>Ejemplo:</b> Si recorres 100 m en 10 s, tu velocidad es 10 m/s.</p>
            <div class="quiz">
                <p>Calcula: 50 m en 5 s</p>
                <button onclick="responder(this,true,'cinematica')">10 m/s</button>
                <button onclick="responder(this,false,'cinematica')">5 m/s</button>
                <div class="result"></div>
            </div>
            <br><br>
            <p>Quieres repasar lo que entendiste de cinemática? <i><a href="cuestionario cinematica.html">Intenta este formulario</a></i></p>
        </div>
            
        

        <div id="dinamica" class="card" style="display:none">
            <h2>Dinámica</h2>
            <p><b>¿Que es?</b> Rama que estudia las fuerzas y sus efectos en el movimiento.</p>
            <p><b>¿Que estudia?</b> Relacion entre fuerza, masa y aceleracion.</p>
            <p><b>Formula:</b> F = m × a</p>
            <p><b>Ejemplo:</b> Un objeto de 2 kg con aceleracion de 3 m/s² tiene una fuerza de 6 N.</p>
            <div class="quiz">
                <p>m=4 kg, a=2 m/s²</p>
                <button onclick="responder(this,true,'dinamica')">8 N</button>
                <button onclick="responder(this,false,'dinamica')">4 N</button>
                <div class="result"></div>
            </div>
            <br><br>
            <p>Quieres repasar lo que entendiste de dinámica? <i><a href="cuestionarioDinamica.html">Intenta este formulario</a></i></p>
        </div>

        <div id="energia" class="card" style="display:none">
            <h2>Energía</h2>
            <p><b>¿Que es?</b> Capacidad de realizar trabajo.</p>
            <p><b>¿Que estudia?</b> Transformaciones y tipos de energia.</p>
            <p><b>Formula:</b> Ec = 1/2 × m × v²</p>
            <p><b>Ejemplo:</b> Un objeto de 2 kg a 3 m/s tiene energia cinetica de 9 J.</p>
            <div class="quiz">
                <p>¿Qué energía tiene un objeto en movimiento?</p>
                <button onclick="responder(this,true,'energia')">Energía cinética</button>
                <button onclick="responder(this,false,'energia')">Energía nuclear</button>
                <div class="result"></div>
            </div>
                <br><br>
                <p>Quieres repasar lo que entendiste de energía? <i><a href="cuestionarioEnergia.html">Intenta este formulario</a></i></p>
        </div>

        <div id="ondas" class="card" style="display:none">
            <h2>Ondas</h2>
            <p><b>¿Que es?</b> Perturbaciones que viajan en un medio o el vacio.</p>
            <p><b>¿Que estudia?</b> Frecuencia, longitud de onda y velocidad.</p>
            <p><b>Formula:</b> v = f × λ</p>
            <p><b>Ejemplo:</b> Una onda con frecuencia 2 Hz y longitud 3 m tiene velocidad de 6 m/s.</p>
            <div class="quiz">
                <p>¿Qué transportan las ondas?</p>
                <button onclick="responder(this,true,'ondas')">Energía</button>
                <button onclick="responder(this,false,'ondas')">Materia</button>
                <div class="result"></div>
            </div>
            <br><br>
            <p>Quieres repasar lo que entendiste de ondas? <i><a href="cuestionarioOndas.html">Intenta este formulario</a></i></p>
        </div>

        <div id="electricidad" class="card" style="display:none">
            <h2>Electricidad</h2>
            <p><b>¿Que es?</b> Estudio de las cargas electricas.</p>
            <p><b>¿Que estudia?</b> Voltaje, corriente y resistencia.</p>
            <p><b>Formula:</b> V = I × R</p>
            <p><b>Ejemplo:</b> Si R=2Ω e I=3A, entonces V=6V.</p>
            <div class="quiz">
                <p>Si V=10V y R=5Ω, I=?</p>
                <button onclick="responder(this,true,'electricidad')">2 A</button>
                <button onclick="responder(this,false,'electricidad')">5 A</button>
                <div class="result"></div>
            </div>
            <br><br>
            <p>Quieres repasar lo que entendiste de electricidad? <i><a href="cuestionarioElectricidad.html">Intenta este formulario</a></i></p>
        </div>

        <div id="termo" class="card" style="display:none">
            <h2>Termodinámica</h2>
            <p><b>¿Que es?</b> Estudia el calor y la energia termica.</p>
            <p><b>¿Que estudia?</b> Transferencia de calor y temperatura.</p>
            <p><b>Ejemplo:</b> El calor fluye de un objeto caliente a uno frio.</p>
            <div class="quiz">
                <p>¿Qué se transfiere entre cuerpos?</p>
                <button onclick="responder(this,true,'termo')">Calor</button>
                <button onclick="responder(this,false,'termo')">Masa</button>
                <div class="result"></div>
            </div>
            <br><br>
            <p>Quieres repasar lo que entendiste de termodinámica? <i><a href="cuestionarioTermodinamica.html">Intenta este formulario</a></i></p>
        </div>

        <div id="optica" class="card" style="display:none">
            <h2>Óptica</h2>
            <p><b>¿Que es?</b> Estudia la luz y su comportamiento.</p>
            <p><b>¿Que estudia?</b> Reflexion, refraccion y lentes.</p>
            <p><b>Ejemplo:</b> Un espejo refleja la luz formando una imagen.</p>
            <div class="quiz">
                <p>¿Qué ocurre en un espejo?</p>
                <button onclick="responder(this,true,'optica')">Reflexión</button>
                <button onclick="responder(this,false,'optica')">Fusión</button>
                <div class="result"></div>
            </div>
            <br><br>
            <p>Quieres repasar lo que entendiste de óptica? <i><a href="cuestionarioOptica.html">Intenta este formulario</a></i></p>
        </div>
    </div>

    <div class="perfil">
        <div class="perfil-info">
            <h3>Perfil</h3>
            <img src="<?php echo $ruta; ?>">
            <form action="img.php" method="post" enctype="multipart/form-data" class="form-foto">
            <input type="file" name="imagen" id="input-foto" required>
            <button type="submit" >Guardar foto</button>
            </form>
            <?php if(isset($_SESSION['usuario'])): ?>
    <p>Bienvenid@, <?php echo $_SESSION['usuario']; ?></p>
    <button onclick="window.location.href='inicio_sesion.html'">Cerrar sesión</button>
<?php else: ?>
    <button onclick="window.location.href='inicio_sesion.html'">Iniciar sesión</button>
<?php endif; ?>
        </div>
        <div class="progreso-container">
            <h3>Tu Progreso</h3>
            <div class="modulo-progreso">Cinemática: <span id="t_cinematica">0%</span><div class="barraContenedor"><div id="p_cinematica" class="barra"></div></div></div>
            <div class="modulo-progreso">Dinámica: <span id="t_dinamica">0%</span><div class="barraContenedor"><div id="p_dinamica" class="barra"></div></div></div>
            <div class="modulo-progreso">Energía: <span id="t_energia">0%</span><div class="barraContenedor"><div id="p_energia" class="barra"></div></div></div>
            <div class="modulo-progreso">Ondas: <span id="t_ondas">0%</span><div class="barraContenedor"><div id="p_ondas" class="barra"></div></div></div>
            <div class="modulo-progreso">Electricidad: <span id="t_electricidad">0%</span><div class="barraContenedor"><div id="p_electricidad" class="barra"></div></div></div>
            <div class="modulo-progreso">Termo: <span id="t_termo">0%</span><div class="barraContenedor"><div id="p_termo" class="barra"></div></div></div>
            <div class="modulo-progreso">Óptica: <span id="t_optica">0%</span><div class="barraContenedor"><div id="p_optica" class="barra"></div></div></div>
            <button onclick="borrarTodo()" style="background:#ef4444; width:100%; border:none; color:white; padding:5px; border-radius:5px; cursor:pointer; margin-top:10px;">Reiniciar Todo</button>
        </div>
    </div>
</div>

<script>
let progreso = {cinematica:0, dinamica:0, energia:0, ondas:0, electricidad:0, termo:0, optica:0};

window.onload = () => {

    const progresoGuardado = localStorage.getItem("user_progreso");
    if (progresoGuardado) {
        progreso = JSON.parse(progresoGuardado);
        actualizarBarras();
    }
};

function mostrar(seccion){
    document.querySelectorAll(".card").forEach(c=>c.style.display="none");
    const target = document.getElementById(seccion);
    if(target) target.style.display="block";
}

function responder(btn, correcto, modulo){
    let botones = btn.parentElement.querySelectorAll("button");
    botones.forEach(b=>b.disabled=true);
    if(correcto){
        btn.style.background="#22c55e";
    } else {
        btn.style.background="#ef4444";
    }
}

function actualizarBarras(){
    for(let m in progreso){
        let barra = document.getElementById('p_'+m);
        let texto = document.getElementById('t_'+m);
        if(barra) {
            barra.style.width = progreso[m] + '%';
            barra.style.background = progreso[m] === 100 ? "#22c55e" : "#38bdf8";
        }
        if(texto) texto.innerText = progreso[m] + '%';
    }
}

function borrarTodo() {
    if(confirm("¿Estás seguro de que quieres borrar todo el progreso de los cuestionarios?")) {
        progreso = {cinematica:0, dinamica:0, energia:0, ondas:0, electricidad:0, termo:0, optica:0};
        localStorage.setItem("user_progreso", JSON.stringify(progreso));
        actualizarBarras();
    }
}

</script>
</body>
</html>
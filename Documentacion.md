En MisPresupuestosController.php tenemos la consulta:
$consulta = Auth::user()->presupuestos()->with('presupuestoProducto')->get();

Que:
Dentro del modelo User.php creamos una funcion llamada presupuestos:
public function presupuestos()
    {   
        return $this->hasMany(Presupuestos::class, 'usuario_id', 'id');
    }
Esta función llama a la tabla Presupuestos donde nos retorna el presupuesto según el usuario logueado,
solicita el id según el "usuario_id" que está en la tabla presupuestos.
En esta respuesta se encuentra un array con todos los presupuestos del usuario logueado.
Luego de llamar a la función presupuestos (que está dentro del modelo User.php), la solicitamos con with de la función "presupuestoProducto".
Esta función "presupuestoProducto" se encuentra dentro del modelo Presupuestos.php
public function presupuestoProducto(){
        return $this->hasMany(PresupuestosProductos::class, 'presupuesto_id', 'id')->with('producto');
    }
La función presupuestoProducto solicita a la tabla PresupuestosProductos los presupuestos según los id que viene
de la tabla de presupuestos. Y con with solicitamos la función producto.
Esta función producto se encuentra dentro del modelo PresupuestosProductos.php
public function producto() {
        return $this->hasMany(Producto::class, 'id', 'producto_id');
    }
La función producto solicita a la tabla Producto el item, según id = producto_id.

Entonces con Auth::user()->presupuestos()->with('presupuestoProducto')->get();
Vamos desde Auth a la funcion user(), que pide usar la funcion presupuestos() con (with) la 
función presupuestoProducto. Y la función presupuestoProducto retorna con (with) la función producto.


Solucion pantalla negra al cerrar modal:
En la sección o modal padre donde se llama al modal, colocarle en sus propiedades:
-> v-if = MostrarModal
Este MostrarModal tiene que estar en el data con el valor falso, así:
data(){
    return {
        MostrarModal: false
        }
    }
Al llamar al modal, con el evento click se tiene que cambiar el valor del MostrarModal a true.
Además, también, tiene que tener la propiedad para que lea el cambio, es decir que tiene que tener
el valor del modal igualado al valor del data. Así:
-> :MotrarModal = MostrarModal
Con esto, desde el modal o modal hijo, vamos a ejecutar un @close que emita el cerrado. Así:
-> @close="$emit('close')"
Dentro del parentecis va el método que vamos a usar, es decir, close.
Y desde el modal padre o sección donde llamamos al modal hijo, vamos a agregarle la propiedad @close con
el nombre de la función. Por lo que el modal quedaría:
-> <MiModalHijo 
    v-if = MostrarModal
    :MostrarModal = MostrarModal
    @close = "funcionSarlanga"
    \>
Y esta funcionSarlanga, en la parte de Methods, le vamos a asignar que cambie el valor del modal. Así:
-> Methods: {
    funcionSarlanga(){
        this.MostrarModal = false;
    }
}
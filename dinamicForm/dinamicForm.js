var DinamicForm = function()
{
    var vm = this;
    vm.container = (typeof container != undefined) ? container : null;
    vm.agregarElemento = agregarElemento;
    
    function agregarElemento(elemento)
    {
        vm.container.appendChild(elemento.crearElemento());
    }
}

var Elemento = function()
{
    var vm = this;
    vm.elemento = null;
    vm.tipo = null;
    vm.nombre = null;
    vm.id = null;
    vm.valor = null;
    vm.crearElemento = crearElemento;
    
    function crearElemento()
    {
        var elementox = null;
        
        switch (vm.elemento) {
            case 'input':
                elementox = document.createElement(vm.elemento);
                elementox.type = vm.tipo;
                elementox.name = vm.nombre;
                elementox.id = vm.id;
                elementox.value = vm.valor;
                elementox.disabled = true;
                break;
                
            case 'label':
                elementox = document.createElement(vm.elemento);
                elementox.htmlFor = vm.nombre;
                elementox.textContent = vm.valor;
        }
        
        return elementox;
    }
}

formID.onsubmit = function()
{
    var df = new DinamicForm();
    
    $.ajax({
        url: 'index.php',
        type: 'POST',
        data: {action: "agregar", data: nombre.value},
    })
    .done(function(data) {
        data = JSON.parse(data);
        
        var input = new Elemento();
        input.elemento = "input";
        input.tipo = "text";
        input.nombre = "nombre";
        input.id = data.id;
        input.valor = data.nombre;
        
        df.agregarElemento(input);
    });
    
    return false;
}
document.addEventListener('DOMContentLoaded', () => {
    cargarProductos();
});


const cargarProductos = () => {
    fetch('productos.php')  
        .then(response => response.json())
        .then(data => {
            if (data.productos) {
                mostrarProductos(data.productos); 
            }
        })
        .catch(error => console.error('Error:', error));
};


const mostrarProductos = (productos) => {
    const productList = document.getElementById('productList');
    productList.innerHTML = ''; 

    productos.forEach((producto, index) => {
        const li = document.createElement('li');
        li.className = 'list-group-item d-flex justify-content-between align-items-center';
        li.innerHTML = `
            ${producto.nombre} - $${producto.precio.toFixed(2)}
            <div>
                <button class="btn btn-primary btn-sm me-2" onclick="editarProducto(${index}, '${producto.nombre}', ${producto.precio})">Editar</button>
                <button class="btn btn-danger btn-sm" onclick="eliminarProducto(${index})">Eliminar</button>
            </div>
        `;
        productList.appendChild(li);
    });
};

document.getElementById('productForm').addEventListener('submit', (e) => {
    e.preventDefault();

    const index = document.getElementById('index').value;
    const nombre = document.getElementById('nombre').value;
    const precio = document.getElementById('precio').value;

    const formData = new URLSearchParams();
    formData.append('nombre', nombre);
    formData.append('precio', precio);

    if (index !== '') {
        formData.append('index', index); 
    }

    fetch('productos.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            mostrarProductos(data.productos); 
            alert('Producto agregado exitosamente'); 
            document.getElementById('productForm').reset(); 
            document.getElementById('index').value = ''; 
        }
    })
    .catch(error => console.error('Error:', error));
});

const editarProducto = (index, nombre, precio) => {
    document.getElementById('index').value = index;  
    document.getElementById('nombre').value = nombre;
    document.getElementById('precio').value = precio;
};


const eliminarProducto = (index) => {
    if (confirm('¿Estás seguro de que deseas eliminar este producto?')) {
        fetch('productos.php', {
            method: 'DELETE',
            body: new URLSearchParams({ index: index })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                mostrarProductos(data.productos); 
            }
        })
        .catch(error => console.error('Error:', error));
    }
};

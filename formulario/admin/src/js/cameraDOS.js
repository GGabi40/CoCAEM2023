document.addEventListener('DOMContentLoaded', function() {
    let scanner = new Instascan.Scanner({ 
        video: document.getElementById('previsualizacion')
    });

    Instascan.Camera.getCameras().then(function (cameras) {
        if(cameras.length > 0) {
            scanner.start(cameras[0]);
        } else {
            console.error('Cameras no encontradas.');
            alert('No encontrada cámaras');
        }
    }).catch(function (e) {
        console.error(e);
    })

    scanner.addListener('scan', function(respuesta) {
        console.log(respuesta);

        fetch("actualizar_acreditacion.php", {
            method: "POST",
            body: JSON.stringify({ qrData: respuesta}),
            headers: {
                "Content-Type": "application/json"
            }
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert(`¡Acreditación exitosa de ${result.apellidos}!`);
            } else {
                alert(`Hay un error con ${result.message}`);
            }
        })
        .catch(error => {
            console.error("Error al Verificar el Código QR: ", error);
        });
    });

})
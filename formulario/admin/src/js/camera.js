document.addEventListener("DOMContentLoaded", () => {
    navigator.mediaDevices.enumerateDevices()
      .then(devices => {
        const videoDevices = devices.filter(device => device.kind === 'videoinput');
        
        // Aquí selecciona la cámara deseada, ya sea frontal o trasera.
        let selectedDeviceId = videoDevices[0].deviceId; // Esto es solo un ejemplo, debes elegir la cámara correcta.
    
        navigator.mediaDevices.getUserMedia({ video: { deviceId: { exact: selectedDeviceId } } })
          .then(stream => {
            
            // Configura Quagga con el stream de la cámara.
            Quagga.init({
              inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector("#camera"), 
              },
              decoder: {
                readers: [
                  "code_128_reader",
                  "ean_reader",
                  "code_39_reader",
                  "qrcode_reader",
                ],
              },
            });
            
            Quagga.onDetected(function (result) {
              const code = result.codeResult.code; // obtiene el contenido del código QR
    
              // función para marcar la acreditación
              function marcarAcreditado(id, apellidos) {
                // Encuentra la fila correspondiente en la tabla
                const rows = document.querySelectorAll(".table-inscriptos tbody tr");
                for (const row of rows) {
                  const rowId = row.querySelector("td[data-id]").getAttribute("data-id");
                  const rowApellidos = row.querySelector("td[data-apellidos]").getAttribute("data-apellidos");
                  if (rowId === id && rowApellidos === apellidos) {
                    const acreditoCell = row.querySelector(".acredito");
                    acreditoCell.textContent = "Ok";
                  }
                }
    
                // Envía una solicitud al servidor para actualizar la base de datos
                fetch("actualizar_acreditacion.php", {
                  method: "POST",
                  body: JSON.stringify({ id, apellidos }),
                  headers: {
                    "Content-Type": "application/json",
                  },
                })
                  .then(response => response.json())
                  .then(data => {
                    if (data.success) {
                      // La actualización en la base de datos fue exitosa
                      alert("La acreditación se actualizó con éxito en la base de datos para " + apellidos);
                    } else {
                      alert("Error al actualizar la acreditación en la base de datos para " + apellidos);
                    }
                  })
                  .catch(error => {
                    console.error("Error en la solicitud de actualización: ", error);
                  });
              }
            });
            
            // Iniciar el lector de códigos QR
            Quagga.start();
          })
          .catch(error => {
            console.error('Error al acceder a la cámara: ', error);
          });
      })
      .catch(error => {
        console.error('Error al enumerar dispositivos: ', error);
      });

})

export default function modal() {
    const direComites = {
        Cientifico: [{
            nome: "Comité Científico",
            responsable: "Comité encargado de la planificación y organización de la presentación de diversos Trabajos Científicos, de la invitación de expertos en el campo y la promoción del intercambio de conocimientos y discusión científica entre los participantes. Su objetivo es contribuir al avance de la investigación en el ámbito del evento.",
        },
        ],
        Academico: [ {
            nome: "Comité Académico",
            responsable: "Comité encargado de  planificar el programa académico del evento: coordinar las charlas, talleres prácticos, mesas redondas y otras actividades especialmente diseñadas para estudiantes de las carreras de la Salud. Su principal objetivo es contribuir al avance y difusión del conocimiento en la comunidad académica.",
        },
        ],
        PyD: [{
            nome: "Comité de Prensa y Difusión",
            responsable: "Comité encargado de promover y difundir información relevante sobre eventos, actividades y noticias. Además, debe hacer gestión de redes sociales, la creación de contenido y el diseño de estrategias de comunicación para maximizar la visibilidad del evento.",
        },
        ],
        PyC: [{
            nome: "Comité de Protocolo y Ceremonial",
            responsable: "Comité encargado de coordinar la organización de invitados, discursos y honores, así como supervisar la logística y asegurar el cumplimiento de las ceremonias planificadas.",
        },
        ],
        Logistica: [{
            nome: "Comité de Logística y Planeamiento",
            responsable: "Comité encargado de coordinar y gestionar todos los aspectos logísticos de un evento, garantizando su correcto desarrollo y funcionamiento. Esto implica planificar y organizar la infraestructura necesaria, como el espacio físico, los equipos técnicos y los suministros. Además, en conjunto con el Comité Académico, realizan el cronograma de dicho evento.",
        },
        ],
        RRPP: [{
            nome: "Comité Relaciones Públicas",
            responsable: "Comité encargado de mantener una buena comunicación con diversos públicos, como los medios de comunicación, los patrocinadores, los colaboradores y la comunidad en general. Su función es asegurar una comunicación efectiva y positiva, fortaleciendo la imagen y el impacto de la organización o evento.",
        },
        ]
    }

    const btnCerrarModal = document.querySelector('#cerrarModal');
    const modal = document.querySelector('#modal');
    const tituloComite = document.querySelector('#titulo-comite');
    const contenidoModal = document.querySelector('#contenido-modal');

    const comites = document.querySelectorAll('.comite');

    comites.forEach((comite) => {
        comite.addEventListener('click', (ev) => {
            const comiteSeleccionado = ev.target.closest('.comite').dataset.comite;
            const comiteData = direComites[comiteSeleccionado][0];
            
            tituloComite.textContent = comiteData.nome;
            contenidoModal.innerHTML = `
            <p class="modal-text">${comiteData.responsable}</p>
            `
            modal.showModal();
        })
    })

    btnCerrarModal.addEventListener('click', () => {
        modal.close();
    })

    const body = document.querySelector('body');
    body.addEventListener('click', (event) => {
        if (event.target === modal) {
          modal.close();
        }
    });
}